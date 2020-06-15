<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {
   protected $middleware = [
      \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
      \App\Http\Middleware\EncryptCookies::class,
      \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
      \Illuminate\Session\Middleware\StartSession::class,
      \Illuminate\View\Middleware\ShareErrorsFromSession::class,
      \App\Http\Middleware\VerifyCsrfToken::class,
   ];

   protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        // \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],

    'api' => [
        'throttle:60,1',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
];
  
   protected $routeMiddleware = [
      'auth' => \App\Http\Middleware\Authenticate::class,
      'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
      'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
      'Age' => \App\Http\Middleware\AgeMiddleware::class,
      'Role' => \App\Http\Middleware\RoleMiddleware::class,
      'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
      'terminate' => \App\Http\Middleware\TerminateMiddleware::class,
      'First' => \App\Http\Middleware\FirstMiddleware::class,
      'Second' => \App\Http\Middleware\SecondMiddleware::class,
   ];
}