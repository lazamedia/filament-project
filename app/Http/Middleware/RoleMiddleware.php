<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        // Memeriksa apakah pengguna memiliki salah satu dari role yang diperbolehkan
        if (!$user->hasAnyRole($roles)) {
            return redirect('/'); // Atau arahkan ke halaman tidak diizinkan
        }

        return $next($request);
    }
}
