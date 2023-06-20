<?php

namespace App\Http\Middleware;

use Closure;
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
    public function handle(Request $request, Closure $next)
    {
        // if((session()->has('logged_in_customer')||!session()->has('logged_in_admin')) && $request->path()== "all/customers"){
        //     return back();
        // }
        // if((session()->has('logged_in_customer')||!session()->has('logged_in_admin')) && $request->path()== "dashboard"){
        //     return back();
        // }
        // if((session()->has('logged_in_customer')||!session()->has('logged_in_admin')) && $request->path()== "add/product"){
        //     return back();
        // }
        // if((session()->has('logged_in_customer')||!session()->has('logged_in_admin')) && $request->path()== "all/products"){
        //     return back();
        // }
        // if((session()->has('logged_in_customer')||!session()->has('logged_in_admin')) && $request->path()== "del/product/{id}"){
        //     return back();
        // }
        // if((session()->has('logged_in_customer')||!session()->has('logged_in_admin')) && $request->path()== "del/customer/{id}"){
        //     return back();
        // }
        // if((session()->has('logged_in_customer')||!session()->has('logged_in_admin')) && $request->path()== "all/orders"){
        //     return back();
        // }
        // if((session()->has('logged_in_customer')||!session()->has('logged_in_admin')) && $request->path()== "receipt/{id}"){
        //     return back();
        // }
        return $next($request);
    }
}
