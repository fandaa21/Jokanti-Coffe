<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showSignIn()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard'); // Ganti sesuai rute dashboard Anda
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showSignUp()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/signin')->with('success', 'Akun berhasil dibuat!');
    }
}
