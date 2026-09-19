<?php

use App\Http\Middleware\TrustProxies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\TrustProxies as IlluminateTrustProxies;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->replace(IlluminateTrustProxies::class, TrustProxies::class);

        $middleware->redirectGuestsTo(function (Request $request): string {
            if ($request->is('untukmu') || $request->is('untukmu/*')) {
                return route('birthday.login');
            }

            return route('login');
        });

        $middleware->redirectUsersTo(function (): string {
            if (auth()->user()?->isBirthdayRecipient()) {
                return route('birthday.card');
            }

            return route('dashboard');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
