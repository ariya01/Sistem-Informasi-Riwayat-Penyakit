<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class pasien
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
        if($user->roles->first()->name == "pasien")
        {
            return $next($request);
        }
        return redirect('hak');
    }
}
