<?php


namespace App\Framework\Application\ServiceProviders;


use ActiveRecord\Config;

class DatabaseServiceProvider extends ServiceProvider
{


    function register()
    {
        Config::initialize(function (Config $config){
            $config->set_model_directory(config('database.models_dir'));
            $config->set_connections(config('database.connections'));
            $config->set_default_connection(config('database.default'));
        });
    }

    function boot()
    {

    }
}