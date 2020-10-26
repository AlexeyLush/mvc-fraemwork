<?php

use App\Framework\Application\ServiceProviders\DatabaseServiceProvider;
use App\Framework\Application\ServiceProviders\ExceptionHandleServiceProvider;
use App\Framework\Application\ServiceProviders\RouteServiceProvider;
use App\Framework\Application\ServiceProviders\ViewServiceProvider;

return [
    'name' => 'MVC',
    'debug' => true,

    'providers' => [
        ExceptionHandleServiceProvider::class,
        DatabaseServiceProvider::class,
        ViewServiceProvider::class,
        RouteServiceProvider::class,
    ],

];
