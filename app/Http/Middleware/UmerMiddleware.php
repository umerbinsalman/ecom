<?php

namespace App\Http\Middleware;

use Closure;

class UmerMiddleware
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
        if(\Auth::user()->email=='umer@gmail.com')
            return $next($request);
        else
            return abort(404);
    }
}
