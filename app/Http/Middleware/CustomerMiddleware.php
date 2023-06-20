<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
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
        // if((session()->has('logged_in_admin')|| !session()->has('logged_in_customer')) && $request->path() == "add/product/to/shoppingcart/{id}") {
        //     return back();
        // }
        // if((session()->has('logged_in_admin')|| !session()->has('logged_in_customer')) && $request->path() == "shoppingcart") {
        //     return back();
        // }
        // if((session()->has('logged_in_admin')|| !session()->has('logged_in_customer')) && $request->path() == "remove/item/{id}") {
        //     return back();
        // }
        // if((session()->has('logged_in_admin')|| !session()->has('logged_in_customer')) && $request->path() == "creditcard") {
        //     return back();
        // }
        // if((session()->has('logged_in_admin')|| !session()->has('logged_in_customer')) && $request->path() == "submit/order") {
        //     return back();
        // }
        return $next($request);
    }
}
