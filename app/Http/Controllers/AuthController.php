<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:penggunas,username',
            'email' => 'required|string|email|max:255|unique:penggunas,email',
            'university' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan user baru ke database
        Pengguna::create([
            'username' => $request->username,
            'email' => $request->email,
            'universitas' => $request->university,
            'password' => $request->password, // tidak diubah jadi hash sesuai logikamu
            'role' => 'User',
            'status' => 'Active',
            'join_date' => now(),
        ]);

        // Redirect ke login
        return redirect()
            ->route('login')
            ->with('success', 'Registration successful! Please login.');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->username_email;

        // Cari pengguna berdasarkan username atau email
        $user = Pengguna::where('username', $input)
            ->orWhere('email', $input)
            ->first();

        // Debug manual (sementara)
        if (!$user) {
            dd('User tidak ditemukan', $input);
        }

        // Cek kecocokan password (tanpa hash, sesuai logic awal)
        if ($user->password !== $request->password) {
            dd('Password tidak cocok', [
                'input_password' => $request->password,
                'db_password' => $user->password,
            ]);
        }

        // Login user ke sistem
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect sesuai role
        switch ($user->role) {
            case 'Admin':
                return redirect()
                    ->route('dashboardadmin')
                    ->with('success', 'Welcome Admin!');
            case 'Kontributor':
                return redirect()
                    ->route('kontributor.index')
                    ->with('success', 'Welcome Kontributor!');
            default:
                return redirect()
                    ->route('homee')
                    ->with('success', 'Login successful!');
        }
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Logout berhasil!');
    }

    /**
     * Show login form.
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Show register form.
     */
    public function showRegister()
    {
        return view('register');
    }
}
