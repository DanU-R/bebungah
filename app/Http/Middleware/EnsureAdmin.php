<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     * Middleware ini memastikan hanya user dengan role 'admin' yang dapat mengakses.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            Log::channel('security')->warning('Unauthorized admin access attempt', [
                'user_id'    => auth()->id() ?? 'guest',
                'user_email' => auth()->user()?->email ?? 'guest',
                'ip'         => $request->ip(),
                'url'        => $request->fullUrl(),
            ]);

            abort(403, 'Akses ditolak. Halaman ini hanya untuk Admin.');
        }

        return $next($request);
    }
}
