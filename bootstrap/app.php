<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isDoctor;
use App\Http\Middleware\NoCache;
use App\Http\Middleware\notAdminOrDoctor;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'isAdmin' => isAdmin::class,
            'notAdminOrDoctor' => notAdminOrDoctor::class,
            'isDoctor' => isDoctor::class,
        ]);
        $middleware->append(['NoCache' => NoCache::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
