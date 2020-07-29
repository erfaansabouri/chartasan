<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect(route('admin'));
        }
        if ($guard == "advisor" && Auth::guard($guard)->check()) {
            return redirect(route('advisor'));
        }
        if ($guard == "student" && Auth::guard($guard)->check()) {
            return redirect(route('student'));
        }
        return $next($request);
    }
}