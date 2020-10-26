<?php


namespace App\Framework\Application\ServiceProviders;


use App\Framework\Contracts\ServiceProviderContract;
use App\Framework\Kernel\Application;

abstract class ServiceProvider implements ServiceProviderContract
{
    protected $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }

}
