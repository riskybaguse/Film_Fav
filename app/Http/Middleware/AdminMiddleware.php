<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // cek apakah pengguna adalah admin
        if ($request->user() && $request->user()->is_admin) {
            // jika admin, lanjutkan ke request berikutnya
            return $next($request);
        }

        // jika bukan admin, redirect ke halaman home atau tampilkan pesan error
        abort(403, 'ANDA TIDAK PUNYA AKSES KE HALAMAN INI.');
    }
}
