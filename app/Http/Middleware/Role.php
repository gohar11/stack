<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Role
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)

    {
        $role = explode('|', $role);
        if(Auth::check() && $request->user()->authorizeRoles($role)){
            return $next($request);
        }
        return route('/');
    }
}
