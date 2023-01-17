<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Presmerovava podla role uzivatela
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check())
        {
            if (Auth::user()->role_as == '1')
            {
                return $next($request);
            }
            else
            {
                return redirect('/home')->with('status','Prístup zamietnutý, nie ste admin.');
            }
        }
        else
        {
            return redirect('/home')->with('status','Najskôr sa prihláste prosím.');
        }
    }

}
