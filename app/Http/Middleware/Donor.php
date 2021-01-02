<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Donor
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
        if (Auth::guard('donor') != null) {
            return $next($request);
        }
        return redirect('/donor/login');
    }
}
