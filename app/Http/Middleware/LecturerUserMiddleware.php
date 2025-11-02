<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LecturerUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('web')->user()->type === 'lecturer') {
            return $next($request);
        }

        return redirect()->route('index')->with([
            'status' => 'error',
            'message' => 'Halaman ini hanya dapat diakses oleh dosen.'
        ]);
    }
}
