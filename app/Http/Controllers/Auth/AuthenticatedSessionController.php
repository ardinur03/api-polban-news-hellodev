<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        // jika user yang login adalah admin maka akan diarahkan ke halaman admin
        if (Auth::user()->hasRole('admin-pusat') | Auth::user()->hasRole('admin-himpunan')) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        } else if (Auth::user()->hasRole('mahasiswa')) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Toast::title('INVALID!')->danger('Please log in using the Polban News mobile application!')->backdrop();
            return redirect('/');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
