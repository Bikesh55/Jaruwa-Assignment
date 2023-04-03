<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(! Auth::guard('admin')->check() && ($request->path() != '/' && $request->path() != '/register')){
            return redirect('/')->with('fail','You must log in first' );
        }
        if(Auth::guard('admin')->check() && ($request->path()=='/' || $request->path()=='/register')) {
            return back();
        }
        return $next($request);
    }
    
}
