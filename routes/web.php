<?php
//web.php

use App\Controllers\SiteController;
use League\Route\RouteGroup;
/**
 * @var RouteGroup $router
 */

$router->get('/', [SiteController::class, 'index']);