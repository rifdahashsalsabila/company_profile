<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminAuthController extends Controller
{
    function index()
    {
        $data = [
            'content' => 'home/auth/login'
        ];
        return view('home.layout.wrapper', $data);
    }
    public function dologin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                // kalau admin → ke dashboard admin
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role === 'customer') {
                // kalau customer → ke halaman customer
                return redirect()->route('booking.create');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Role tidak dikenali.']);
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }
    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
