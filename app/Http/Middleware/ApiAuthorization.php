<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponser;
use Closure;

class ApiAuthorization
{
    use ApiResponser;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->header('authorization') && $request->header('authorization') == env('API_KEY')) {
            return $next($request);
        }
        return $this->errorResponse("Unauthorized action or invalid api key",401);
    }
}
