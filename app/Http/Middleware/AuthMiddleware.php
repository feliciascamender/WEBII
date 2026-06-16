<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login (ada session user_id)
        if (!session()->has('user_id')) {
            // Belum login → simpan pesan flash lalu redirect ke login
            return redirect()->route('login')
                ->with('warning', 'Login terlebih dahulu!');
        }

        return $next($request);
    }
}