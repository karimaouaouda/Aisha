<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Symfony\Component\HttpFoundation\Response;

class Register
{

    protected Pipeline $pipeline;

    public function __construct() {
        $this->pipeline = new Pipeline(app());
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
