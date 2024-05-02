<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.index', [
            "title" => "Login",
            "active" => "login"
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // Mendapatkan pengguna berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Jika pengguna ditemukan dan rolenya adalah 'pasien', maka tidak diizinkan untuk login
        if ($user && $user->role === 'pasien') {
            return back()->with('loginError', 'Login failed!');
        }

        // Melakukan otentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');
    }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
