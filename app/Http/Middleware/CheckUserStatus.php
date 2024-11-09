<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckUserStatus
{
    public function handle($request, Closure $next)
    {
        // Check if user is authenticated
        if (Auth::check()) {
            // Check if user is active
            if (!Auth::user()->isActive()) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['inactive' => 'Your account is not active. Please contact support.']);
            }
        }

        return $next($request);
    }
}
