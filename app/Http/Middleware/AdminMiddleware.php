<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // protected function redirectTo($request){
    //     if(! $request->exceptJson()){
    //         return route('/');
    //     }
    // }
    public function handle($request, Closure $next)
{
    error_log("adminmiddleware");

    // Check if user is authenticated
    if (Auth::check()) {
        error_log("User authenticated: " . json_encode(Auth()->user()));

        // Check if the user is an admin
        if (Auth()->user()->usertype == 'admin') {
            error_log("run to this step");
            return $next($request);
        }
    } else {
        error_log("User not authenticated");
    }

    // Redirect if not admin
    return redirect()->route('login')->with('error', 'Access denied.');
 }



}
