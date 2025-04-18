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

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended($this->redirectPath());
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

        return redirect('/login');
    }
}
