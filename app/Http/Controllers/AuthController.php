<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Coba untuk login dengan kredensial yang diberikan
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika login berhasil, redirect ke halaman dashboard
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors(['email' => 'Kredensial yang diberikan salah.']);
    }

    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman dashboard
        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil, Anda sudah login.');
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}
