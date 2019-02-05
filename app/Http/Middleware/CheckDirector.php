<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDirector
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
        if ($user->type !== 'admin' or $user->type !== 'director') {
            \Alert::danger('No tienes permisos para realizar esta acción');
            return redirect()->back();
        }
        return $next($request);
    }
}
