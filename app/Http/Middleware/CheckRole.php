<?php

namespace App\Http\Middleware;
use Alert;
use Closure;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {

        if (auth()->check() && auth()->user()->hasRole($role)) {
            return $next($request);
        }

       
       return redirect('/');
    }
}