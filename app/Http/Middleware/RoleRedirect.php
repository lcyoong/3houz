<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleRedirect
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
		if (Auth::user()->hasRole('member')) {
    		// return redirect(url('mb'));
    	}
		elseif (Auth::user()->hasRole('agent')) {
    		// return redirect(url('ag'));
    	}
		else {
    		// return redirect(url('ad'));
    	}
        return $next($request);
    }
}
