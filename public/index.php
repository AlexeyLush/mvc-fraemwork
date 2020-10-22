<?php

use App\Framework\Kernel\Application;
use Laminas\Diactoros\ServerRequestFactory;

require_once __DIR__ . "/../vendor/autoload.php";

$request = ServerRequestFactory::fromGlobals();

Application::app($request)
    ->start();