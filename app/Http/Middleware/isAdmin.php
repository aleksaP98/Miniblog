<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!$request->session()->has('user')){
            abort(404);
            //log error
        }
        elseif($request->session()->get('user')->role_id !== 1){
            abort(404);
            //log error
        }
        return $next($request);
    }
}
