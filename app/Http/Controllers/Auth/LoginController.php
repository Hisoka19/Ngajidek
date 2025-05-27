<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Coba login sebagai user
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();
            if ($user->hasRole('admin')) {
                return redirect('/admin/dashboard');
            } elseif ($user->hasRole('siswa')) {
                return redirect('/siswa/dashboard');
            } elseif ($user->hasRole('pengajar')) {
                return redirect('/pengajar/dashboard');
            }

            return redirect('/user/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    protected function redirectPath()
    {
        if (auth()->user()->role == 'admin') {
            return '/admin/dashboard';
        } elseif (auth()->user()->role == 'pengajar') {
            return '/pengajar/dashboard';
        } else {
            return '/user/dashboard';
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
