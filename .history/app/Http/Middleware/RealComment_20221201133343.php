<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

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
        $id_user = DB::table('comment')->where('id',$request->id)->value('id_user');
        if(Auth::check() && Auth::id() == $id_user)
        return $next($request);
        else return back()->with('error','Bạn không thể xóa bình luận này');
    }
}
