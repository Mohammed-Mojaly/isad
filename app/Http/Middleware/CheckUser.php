<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
{

    public function handle($request, Closure $next)
    {
        if (auth()->user()->hasRole('Admin')) {
            return redirect()->to('admin/dashboard');
        }
        return $next($request);

    }
}
