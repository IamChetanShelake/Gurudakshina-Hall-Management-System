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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirect to login if not authenticated
        }

        // if (Auth::user()->role !== $role) {
        //     return redirect('/');  // Deny access if role does not match
        // }
        if (!in_array(Auth::user()->role, $roles)) {
            return redirect('/')->with('error', 'Unauthorized access!'); // Deny access if role does not match
        }


        return $next($request);
    }
}
