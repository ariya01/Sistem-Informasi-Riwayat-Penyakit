<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class dokter
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
        $user = Auth::user();
        if($user->roles->first()->name == "dokter")
        {
            return $next($request);
        }
        return redirect('hak');
    }
}
