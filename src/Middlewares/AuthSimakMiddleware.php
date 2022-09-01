<?php

namespace DedeGunawan\SsoSimakUnsilLaravel\Middlewares;

use Closure;
use DedeGunawan\SsoSimakUnsilLaravel\Helpers\SsoSimakHelper;
use Illuminate\Http\Request;

class AuthSimakMiddleware
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
        $login = SsoSimakHelper::loginFromToken();
        if (!$login) return SsoSimakHelper::getInstance()->generateLoginUrl();

        return $next($request);
    }
}
