<?php

namespace App\Http\Controllers;

use App\Models\Emission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;

class EmissionController extends Controller
{
    // Faktor emisi (kg CO2 per unit)
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

    public function calculate(Request $request)
{
    // Ambil data user login
    $pengguna = Auth::user();

    // Validasi input form
    $data = $request->validate([
        'vehicle_type'    => ['required','in:motorcycle,car'],
        'distance'        => ['required','numeric','min:0'],
        'electric_source' => ['required','in:grid,solar'],
        'electric_usage'  => ['required','numeric','min:0'],
        'beef'            => ['required','numeric','min:0'],
        'chicken'         => ['required','numeric','min:0'],
        'organic_waste'   => ['required','numeric','min:0'],
        'inorganic_waste' => ['required','numeric','min:0'],
    ]);

    // Hitung emisi
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

    // Kirim ke view
    return view('emisi.emission_result', [
        'username'   => $pengguna?->username ?? 'Guest',
        'universitas' => $pengguna?->universitas ?? 'Unknown University',
        'input'      => $data,
        'breakdown'  => $breakdown,
        'percent'    => $this->percentages($breakdown),
    ]);
}


    public function store(Request $request)
    {
        // Ambil data pengguna yang sedang login
        $pengguna = Auth::user();

        if (!$pengguna) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Simpan data ke database
        $emission = new Emission();
        $emission->name = $pengguna->username;
        $emission->universitas = $pengguna->universitas;
        $emission->vehicle_type = $request->vehicle_type;
        $emission->electric_source = $request->electric_source;
        $emission->transport_emission = $request->transport_emission;
        $emission->electric_emission = $request->electric_emission;
        $emission->food_emission = $request->food_emission;
        $emission->rubbish_emission = $request->rubbish_emission;
        $emission->total_emission = $request->total_emission;
        $emission->save();

        // Redirect ke halaman 'saved'
        return redirect()->route('emissions.saved', ['emission' => $emission->id]);
    }

    public function saved($emission)
    {
        $emission = Emission::find($emission);

        if (!$emission) {
            return back()->with('error', 'Data emisi tidak ditemukan');
        }

        return view('emisi.emission_card', ['emission' => $emission]);
    }

    public function card($id = null)
    {
        $pengguna = Auth::check() ? Auth::user() : Pengguna::first();

        if (!$pengguna) {
            return view('emisi.no_pengguna');
        }

        $emission = $id
            ? Emission::find($id)
            : Emission::where('name', $pengguna->username)->latest()->first();

        $universitas = $pengguna->universitas ?? 'Unknown University';

        return view('emisi.emission_card', [
            'user' => $pengguna,
            'universitas' => $universitas,
            'emission' => $emission,
        ]);
    }

    private function percentages(array $b): array
    {
        $t = max(0.000001, $b['total']);
        return [
            'transport' => round(($b['transport'] / $t) * 100, 0),
            'electric'  => round(($b['electric'] / $t) * 100, 0),
            'food'      => round(($b['food'] / $t) * 100, 0),
            'rubbish'   => round(($b['rubbish'] / $t) * 100, 0),
        ];
    }
}
