<?php

namespace App\Http\Middleware;

use Closure;

class RoutePermitted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
    	if (!$request->user()->can($permission)) {
    		return redirect()->back();
    	}
        return $next($request);
    }
}
