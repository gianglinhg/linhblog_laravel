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
        $id_user = App\Models\Comment::where('id',$request->id)->value('id_user');
        dd($id_user);
        if(Auth::check() && Auth::id())
        return $next($request);
    }
}
