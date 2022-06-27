<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class ClientUser
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
        if(Auth::user()->toArray()['role_name']=='USERr') {
            return $next($request); 
            //return $request->url()->previous();
        } else {
            Auth::logout();
            session()->flash('error', 'You are not Authenticate.');
            return redirect('/');
        } 

        // if (Auth::guard($guard)->check()) {
        //     return redirect('/design-tool-auth');
        // }
        
        // return $next($request);

        if(auth()->user()->is_admin == 0){
            
            return $next($request);
        }
        else {
            Auth::logout();
            session()->flash('error', 'You are not Authenticate.');
            return redirect('/');
        } 
    }
}
