<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Function to handle user login
    public function login(Request $request)
    {
        // Validating request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempting to authenticate user
        if (Auth::attempt($credentials)) {
            // Authentication successful, redirect to dashboard
            return redirect()->route('dashboard');
        } else {
            // Authentication failed, redirect back with error message
            return redirect()->back()->withErrors(['login' => 'Invalid credentials.']);
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Function untuk menangani proses registrasi
    public function register(Request $request)
    {
        // Validasi data yang diterima dari form registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Membuat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Function to handle user logout
    public function logout()
    {
        // Logging out user
        Auth::logout();

        // Redirecting to login page
        return redirect()->route('login');
    }
}
