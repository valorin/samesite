<?php

namespace App\Http\Middleware;

use Closure;

class HeadersMiddleware
{
    public function handle($request, Closure $next)
    {
        Header('Access-Control-Allow-Origin: *');

        return $next($request);
    }
}
