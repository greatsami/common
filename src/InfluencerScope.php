<?php

namespace Microservices;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class InfluencerScope
{
    public function __construct(private UserService $userService)
    {
    }

    public function handle(Request $request, Closure $next)
    {
        if ($this->userService->isInfluencer()) {
            return $next($request);
        }
        throw new AuthenticationException();
    }
}
