<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
<<<<<<< HEAD
=======

    public function handle($request, \Closure $next)
    {
        if(env('APP_ENV') !== 'testing')
        {
            return parent::handle($request, $next);
        }

        return $next($request);
    }
>>>>>>> 4a1ed0f2e38ec36cb4ada39582ab2567f36f2ccb
}
