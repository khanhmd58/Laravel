<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckAdmin
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
        if (!(Session::has('user') && Session::has('pass'))) {
            return redirect('login');
        }
        return $next($request);
    }
}
