<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // kalau belum login
        }

        if (Auth::user()->role !== $role) {
            // kalau role tidak sesuai
            abort(403, 'Unauthorized');
        }

        // if (Auth::check()) {
        //     dd(Auth::user()->role);
        // }


        return $next($request);
    }
}
