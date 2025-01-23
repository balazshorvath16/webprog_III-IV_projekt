<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Irányítsd át a felhasználót a kívánt helyre, ha már hitelesítve van.
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
