<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginPelangganController extends Controller
{
    public function loginpelanggan()
    {
        return view('loginpelanggan');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('customers')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }


        return back()->withErrors([
            'loginpelanggan' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
{
    Auth::guard('customers')->logout(); // Logout dari guard customer
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}

}
