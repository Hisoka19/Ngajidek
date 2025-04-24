<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
public function handle($request, Closure $next, $role)
{
    if (!auth()->check()) {
        \Log::info('User not authenticated');
        abort(403);
    }

    if (!auth()->user()->hasAnyRole(explode('|', $role))) {
        \Log::info('User does not have required role', [
            'user_id' => auth()->id(),
            'roles' => auth()->user()->getRoleNames(),
            'required_role' => $role,
        ]);
        abort(403);
    }

    return $next($request);
}
}
