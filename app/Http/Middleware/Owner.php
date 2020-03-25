<?php

namespace App\Http\Middleware;

use Closure;

class Owner
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
        // Owner: nour-ja19@hotmail.fr
        $user = auth()->user();
        if(strtolower($user->email) == 'nour-ja19@hotmail.fr'){
            return $next($request);
        }
        return abort(404);
    }
}
