<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            // admin role = 1 or true
            // user role = 0 or false

            if(Auth::user()->role == 1){
                return $next($request);
            } else {
                return redirect("/home")->with("message", "Access denied.");
            }

        } else {
            return redirect("/login")->with("message", "Login to access website info.");
        }

        return $next($request);
    }
}
