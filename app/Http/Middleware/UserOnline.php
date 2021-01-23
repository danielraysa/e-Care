<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;

class UserOnline
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
        if(Auth::check()){
            $user = Auth::user();
            $expiresAt = Carbon::now()->addMinutes(1);
            $lastExpired = Carbon::now()->addMinutes(30);
            Cache::put('user-online-'.$user->id, true, $expiresAt);
            Cache::put('last-user-online-'.$user->id, Carbon::now()->format('H:i'), $lastExpired);
        }
        return $next($request);
    }
}
