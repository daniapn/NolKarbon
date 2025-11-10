<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Pengguna;

class AuthController extends Controller
{
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

        Pengguna::create([
            'username' => $request->username,
            'email' => $request->email,
            'universitas' => $request->university,
            'password' =>$request->password,
            'role' => 'User',
            'status' => 'Active',
            'join_date' => now(),
        ]);

        // Setelah register, arahkan ke halaman login
        return redirect()
            ->route('login')
            ->with('success', 'Registration successful! Please login.');
    }

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

    $user = \App\Models\Pengguna::where('username', $input)
        ->orWhere('email', $input)
        ->first();

    // 🔍 Debug sementara
    if (!$user) {
        dd('User tidak ditemukan', $input);
    }

    if ($user->password !== $request->password) {
        dd('Password tidak cocok', [
            'input_password' => $request->password,
            'db_password' => $user->password,
        ]);
    }

    Auth::login($user);
    $request->session()->regenerate();
   switch ($user->role) {
        case 'Admin':
            return redirect()->route('dashboardadmin')->with('success', 'Welcome Admin!');
        case 'Kontributor':
            return redirect()->route('kontributor.index')->with('success', 'Welcome Kontributor!');
        default:
            return redirect()->route('home')->with('success', 'Login successful!');
}
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logout berhasil!');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }
}