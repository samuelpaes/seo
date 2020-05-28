<?php

namespace SEO\Http\Middleware;

use Closure;

class Admin
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
		if(auth()->user()->isAdmin == 0)
		{
			return $next($request);
		}
		
		return redirect('/pre_home')->with('error','SEM ACESSO. CONTATE O ADMINISTRADOR DO SISTEMA!');
	}
}
