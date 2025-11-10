<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    // Menampilkan halaman profil pengguna
    public function index()
    {
        // Contoh data dummy (nanti bisa diganti Auth::user())
        $user = (object)[
            'name' => 'Azael Bara',
            'email' => 'azael@gmail.com',
            'university' => 'Institut Teknologi Bandung',
            'bio' => 'Passionate about environmental sustainability and reducing carbon footprint.',
            'points' => 1250,
            'badges' => 5,
            'co2_saved' => '45 kg',
            'joined' => 'January 15, 2024',
        ];

        return view('editprofilepengguna', compact('user'));
    }

    // Meng-handle form update profil
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'university' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
        ]);

        // Jika sudah pakai auth user, bisa gini:
        // $user = Auth::user();
        // $user->update($request->only(['name', 'email', 'university', 'bio']));

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
