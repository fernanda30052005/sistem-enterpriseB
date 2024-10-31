<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     * Method ini akan mengembalikan path redirect ketika user belum terautentikasi
     * 
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo(Request $request): ?string
    {
        // Jika request mengharapkan JSON response, return null
        // Jika tidak, redirect ke halaman login
        if ($request->expectsJson()) {
            return null;
        }
        
        // Simpan intended URL sebelum redirect ke login
        if (!$request->is('api/*')) {
            session()->put('url.intended', url()->current());
        }
        
        // Redirect ke halaman login
        return route('dashboard');
    }
}
