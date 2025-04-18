<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotPengajar
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('pengajar')->check()) {
            return redirect('/login');
        }
        return $next($request);
    }
}
