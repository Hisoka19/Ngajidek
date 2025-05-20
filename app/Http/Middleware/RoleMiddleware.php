<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Pastikan user sudah login dan memiliki role yang sesuai dari Spatie
        if (!auth()->check() || !auth()->user()->hasRole($role)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
