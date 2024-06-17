<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'adminRights'=>\App\Http\Middleware\AdminRights::class,
            'currentUser'=>\App\Http\Middleware\CurrentUser::class,
            'loggedIn'=>\App\Http\Middleware\LoggedIn::class,
            'loggedOut'=>\App\Http\Middleware\LoggedOut::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
