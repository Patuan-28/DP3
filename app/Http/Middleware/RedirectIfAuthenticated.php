<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::ADMIN);
            } elseif ($guard == "staff" && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::STAFF);
            } elseif ($guard == "siswa" && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::SISWA);
            } elseif (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
