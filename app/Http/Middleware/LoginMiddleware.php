<?php

namespace App\Http\Middleware;

use Closure;
class LoginMiddleware
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
        // session(['login' => 'true']);
        if($request->session()->has('login')){
            return $next($request);
        }else{
          return redirect('/admin/login');
        }

    }
}
