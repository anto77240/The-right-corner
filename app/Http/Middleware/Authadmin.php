<?php

namespace App\Http\Middleware;


use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Suport\Facades\Auth; 
use Illuminate\Http\Request;
use Closure;

class Authadmin
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
       
        if (!auth()->check()){
            flash('Vous n\'avez pas les droits pour voir cette page.');
            return back ();
        }

        if(auth()->check() AND auth()->user()->admin!= 1){
            flash('Vous n\'avez pas les droits pour voir cette page.')->error();

            return redirect('/');}
            
        else 
        {   
        return $next($request);}
    }
}
