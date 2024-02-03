<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class AuthLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('login') && session()->get('login')) {
            return redirect('user');
        }

        return $next($request);
    }
}
