<?php

use App\Framework\Application\Filesystem;
use App\Framework\Application\ServiceProviders\ViewServiceProvider;
use App\Framework\Kernel\Application;
use Laminas\Diactoros\Response;

function path($path = null) {
    return Filesystem::path($path);
}

function config($name, $default = null) {
    $name = explode('.', $name);
    $fileName = array_shift($name);

    if (!$fileName)
        return $default;

    $file = Filesystem::configPath($fileName);

    if (!Filesystem::exists($file))
        return $default;

    $config = include $file;

    foreach ($name as $key) {
        $config = $config[$key] ?? $default;
    }

    return $config;
}

function app(){
    return Application::app();
}

function view(string $view, array $vars = []) {
    $view = str_replace('.', '/', $view) . ".tpl";
    /** @var SmartyBC $smarty */
    $smarty = app()
        ->get(ViewServiceProvider::class)
        ->smarty();

    foreach ($vars as $key => $value)
        $smarty->assign($key, $value);

    $render = $smarty->fetch($view);
    $response = new Response();
    $response->getBody()->write($render);
    return $response;
}