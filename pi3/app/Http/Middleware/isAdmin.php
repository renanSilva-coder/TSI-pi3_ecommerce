<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{

    public function handle(Request $request, Closure $next)
    {
    	if(Auth()->user()){
	        if(Auth()->user()->isAdmin)
	            return $next($request);
		}
        session()->flash('success','Você não tem permissão para entrar nessa página');
        return redirect()->back();
    }
}
