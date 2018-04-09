<?php

namespace App\Http\Middleware;

use Closure;

class ManagementMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

//        dd(\Auth::user()->isTeamLead);
        if ((\Auth::user() && \Auth::user()->isManager !== 1 ) || (\Auth::user() && \Auth::user()->isTeamLead !== 1 )) {
            return $next($request);
        }
        else {
            abort(500, 'You are not a part of management');
        }
    }

}
