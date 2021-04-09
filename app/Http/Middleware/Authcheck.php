<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!session()->has('logged') and ($request->path() != 'auth/login' and $request->path() != 'auth/register'))
        {
            return redirect('auth/login')->with('fail','You to need logged in!');
        }
        if(session()->has('logged') and ($request->path() == 'auth/login' or $request->path() == 'auth/register'))
        {
            return back();
        }
        return $next($request);
    }
}
