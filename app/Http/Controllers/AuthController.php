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
            'password' => Hash::make($request->password),
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

    $credentials = filter_var($request->username_email, FILTER_VALIDATE_EMAIL)
            ? ['email' => $request->username_email, 'password' => $request->password]
            : ['username' => $request->username_email, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homee')->with('success', 'Login successful!');
        }

        return redirect()->back()
            ->withErrors(['username_email' => 'Invalid username/email or password'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
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