<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RealComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id_user = $request->id;
        dd($id);
        if(Auth::check() && Auth::id())
        return $next($request);
    }
}
