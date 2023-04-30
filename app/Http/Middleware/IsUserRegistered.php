<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUserRegistered
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // jika user sudah memiliki role admin-pusat atau admin-himpunan maka jangan memasuki halaman ini
        if (Auth::user()->hasRole('admin-pusat') || Auth::user()->hasRole('admin-himpunan')) {
            return abort(403, 'You have already registered⚡');
        }

        return $next($request);
    }
}
