<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class checkAge
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
        if( strlen($request->name)>20 )
        {
            $name_err_message = 'The Task title cant be more than 20';
            $request->session()->flash('name_err_message', $name_err_message);
            return redirect('/home');
        }
        return $next($request);
    }
}
