<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::user()->isAdmin) {
            return redirect()->intended('/');
        }

        return $next($request);
    }
}
