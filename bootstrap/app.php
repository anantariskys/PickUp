<?php

use App\Http\Middleware\isCustomer;
use App\Http\Middleware\isDriver;
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
            'isCustomer' => isCustomer::class,
            'isDriver' => isDriver::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
