<?php
namespace App\Middleware;

class GuardApiSwitcher {
    public function handle($request, \Closure $next) {
        auth()->setDefaultDriver('api');
        return $next($request);
    }
}
