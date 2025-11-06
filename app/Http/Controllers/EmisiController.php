<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emisi;

class EmisiController extends Controller
{
    public function hitung(Request $request)
{
    $total = $request->transportasi + $request->listrik + $request->makanan + $request->sampah;

    $emisi = Emisi::create([
        'nama_pengguna' => $request->nama_pengguna,
        'transportasi' => $request->transportasi,
        'listrik' => $request->listrik,
        'makanan' => $request->makanan,
        'sampah' => $request->sampah,
        'total_emisi' => $total,
    ]);

    // Simpan ID ke session biar bisa ditarik nanti di halaman hasil
    session(['emisi_id' => $emisi->id]);

    // Redirect ke halaman notifikasi
    return redirect('/emisi-saved');
}

public function saved()
{
    return view('emisi.saved');
}

public function hasil()
{
    $emisi = \App\Models\Emisi::find(session('emisi_id'));
    return view('emisi.hasil', compact('emisi'));
}

}
