<?php

namespace App\Http\Middleware;

use Closure;

class Trans
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
        app()->setLocale(locale());
        return $next($request);
    }
}
