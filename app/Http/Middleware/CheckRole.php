<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{

    public function handle($request, Closure $next)
    {
        if(auth()->user()->hasRole('Admin')) {
            return $next($request);
        }

    }
}
