<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form register
    public function showRegister()
    {
        return view('home.auth.register');
    }

    // Proses register customer
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\password::defaults()],
            'no_tlp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'role' => 'customer', 
        ]);

        Auth::login($user);
        return redirect()->route('booking.create');
    }

    // Menampilkan form login
    public function showLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role === 'customer') {
                return redirect()->route('bookings');
            }
        }
    }


    // Proses login customer
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // cek role customer
            if (Auth::user()->role === 'customer') {
                return redirect()->route('bookings');
            } else {
                Auth::logout(); // logout jika bukan customer
                return back()->withErrors(['email' => 'Anda bukan customer']);
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }



    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
