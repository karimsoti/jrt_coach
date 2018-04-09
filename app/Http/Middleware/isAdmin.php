<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
//        dd(\Illuminate\Support\Facades\Auth::user()->admin);


        if (!\Auth::user()) {
            abort(403, 'You are not logged in');
        }
        else if (\Auth::user()->admin !== 1) {
            abort(403, 'You are not an admin');
        }



        return $next($request);
    }

}
