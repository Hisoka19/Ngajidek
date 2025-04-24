<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // Pastikan rute pengalihan sesuai untuk setiap role
                if ($user->hasRole('admin')) {
                    return redirect('/admin');
                } elseif ($user->hasRole('pengajar')) {
                    return redirect('/pengajar/dashboard');
                } elseif ($user->hasRole('siswa')) {
                    return redirect('/siswa/dashboard');
                }
            }
        }

        return $next($request);
    }
}
