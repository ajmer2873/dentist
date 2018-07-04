<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class Authenticate
{


     public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    // public function handle($request, Closure $next)
    // {
    //     if ($this->auth->check())
    //     {
    //         return new RedirectResponse('/home');
    //     }
    //     return $next($request);
    // }

   

    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/login');
        }

        return $next($request);
    }


}
