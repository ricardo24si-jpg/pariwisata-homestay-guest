<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('user')) {
            // Kalau belum login, redirect ke halaman login
            return redirect('/login')->with('error', 'Silahkan login terlebih dahulu!');
        }

        // Kalau sudah login, lanjutkan request
        return $next($request);
    }
}
