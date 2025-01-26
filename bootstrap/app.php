<?php

use App\Http\Middleware\AdminUserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'useradmin' => AdminUserMiddleware::class,
        ]);

        $middleware->web(append:[
            \App\Http\Middleware\Localization::class,
            \Illuminate\Session\Middleware\StartSession::class,
        ]);
        $middleware->api(append:[
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        // $middleware->add(\Spatie\Permission\Middlewares\RoleMiddleware::class);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
