<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InspectLanguageRequest
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
        if (isset($request->language)) {
            return $next($request);
        } else {
            $request->merge(['language' => 'es']);
            return $next($request);
        }
    }
}
