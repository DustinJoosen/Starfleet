<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureRank
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(!auth()->check()){
            return redirect('/login');
        }

        $user = Auth::user();

        foreach($roles as $role){
            if(strtolower($role) == strtolower($user->officer->rank->name)){
                return $next($request);
            }
        }

        abort(403, "Unauthorized page");


        return $next($request);
    }
}
