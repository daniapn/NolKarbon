<?php

namespace App\Http\Controllers;

use App\Models\Emission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pengguna; 


class EmissionController extends Controller
{
    // faktor emisi (kg CO2 per unit)
    private array $factors = [
        'motorcycle' => 0.08,   // per km
        'car'        => 0.21,   // per km
        'grid'       => 0.85,   // per kWh
        'solar'      => 0.0,    // per kWh
        'beef'       => 27.0,   // per kg
        'chicken'    => 6.9,    // per kg
        'organic'    => 1.5,    // per kg
        'inorganic'  => 2.0,    // per kg
    ];

    public function showForm()
    {
        return view('emisi.emission_form');
    }

    // hitung & tampilkan hasil (belum simpan)
    public function calculate(Request $request)
    {
        $data = $request->validate([
            'name'            => ['nullable','string','max:100'],
            'vehicle_type'    => ['required','in:motorcycle,car'],
            'distance'        => ['required','numeric','min:0'],
            'electric_source' => ['required','in:grid,solar'],
            'electric_usage'  => ['required','numeric','min:0'],
            'beef'            => ['required','numeric','min:0'],
            'chicken'         => ['required','numeric','min:0'],
            'organic_waste'   => ['required','numeric','min:0'],
            'inorganic_waste' => ['required','numeric','min:0'],
        ]);

        $transport  = $this->factors[$data['vehicle_type']] * $data['distance'];
        $electric   = $this->factors[$data['electric_source']] * $data['electric_usage'];
        $food       = $this->factors['beef'] * $data['beef'] + $this->factors['chicken'] * $data['chicken'];
        $rubbish    = $this->factors['organic'] * $data['organic_waste'] + $this->factors['inorganic'] * $data['inorganic_waste'];
        $total      = $transport + $electric + $food + $rubbish;

        $breakdown = [
            'transport' => $transport,
            'electric'  => $electric,
            'food'      => $food,
            'rubbish'   => $rubbish,
            'total'     => $total,
        ];

        return view('emisi.emission_result', [
            'name'      => strtoupper($data['name'] ?? 'USER'),
            'input'     => $data,
            'breakdown' => $breakdown,
            'percent'   => $this->percentages($breakdown),
        ]);
    }

    // simpan & tampilkan halaman "Data saved"
    public function store(Request $request)
    {
        $payload = $request->validate([
            'name'            => ['nullable','string','max:100'],
            'vehicle_type'    => ['required','in:motorcycle,car'],
            'distance'        => ['required','numeric','min:0'],
            'electric_source' => ['required','in:grid,solar'],
            'electric_usage'  => ['required','numeric','min:0'],
            'beef'            => ['required','numeric','min:0'],
            'chicken'         => ['required','numeric','min:0'],
            'organic_waste'   => ['required','numeric','min:0'],
            'inorganic_waste' => ['required','numeric','min:0'],
            'transport_emission' => ['required','numeric','min:0'],
            'electric_emission'  => ['required','numeric','min:0'],
            'food_emission'      => ['required','numeric','min:0'],
            'rubbish_emission'   => ['required','numeric','min:0'],
            'total_emission'     => ['required','numeric','min:0'],
        ]);
    
        $emission = Emission::create($payload);
    
        // Langsung redirect ke kartu emisi setelah data disimpan
        return redirect()->route('emissions.card', ['emission' => $emission->id]);
    }


    public function saved(Emission $emission)
    {
        return view('emisi.emission_saved', ['emission' => $emission]);
    }

    public function card($id)
    {
        // Ambil data pengguna pertama (sementara, kalau belum login system)
        $pengguna = Pengguna::first();
    
        // Kalau belum ada data pengguna sama sekali
        if (!$pengguna) {
            return back()->with('error', 'Data pengguna tidak ditemukan');
        }
    
        // Ambil data emisi sesuai ID
        $emission = Emission::find($id);
    
        // Ambil universitas
        $university = $pengguna->universitas ?? 'Unknown University';
    
        return view('emisi.emission_card', [
            'user' => $pengguna,
            'university' => $university,
            'emission' => $emission
        ]);
    }

    private function percentages(array $b): array
    {
        $t = max(0.000001, $b['total']);
        return [
            'transport' => round(($b['transport']/$t)*100, 0),
            'electric'  => round(($b['electric']/$t)*100, 0),
            'food'      => round(($b['food']/$t)*100, 0),
            'rubbish'   => round(($b['rubbish']/$t)*100, 0),
        ];
    }

    public function showCard()
    {
        // Ambil data pengguna pertama (sementara)
        $pengguna = Pengguna::first();
    
        if (!$pengguna) {
            return back()->with('error', 'Data pengguna tidak ditemukan');
        }
    
        // Ambil data emission berdasarkan nama pengguna
        $emission = Emission::where('name', $pengguna->username)->latest()->first();
    
        $university = $pengguna->universitas ?? 'Unknown University';
    
        if ($emission) {
            // Ada data → tampilkan kartu
            return view('emisi.emission_card', [
                'user' => $pengguna,
                'university' => $university,
                'emission' => $emission,
            ]);
        } else {
            // Tidak ada data → tampilkan “Data not available”
            return view('emisi.emission_card', [
                'user' => $pengguna,
                'university' => $university,
                'emission' => null,
            ]);
        }
    }

}
