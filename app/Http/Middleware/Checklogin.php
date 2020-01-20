<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Checklogin
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
        if(!Auth::guard('backend')->check())
            return  redirect()->route('b.dangnhap')->with(['msg'=>'Vui lòng đăng nhập đã','type'=>'warning']);
        return $next($request);
    }
}