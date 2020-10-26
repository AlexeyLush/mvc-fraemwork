<?php


namespace App\Framework\Application\ServiceProviders;


use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ExceptionHandleServiceProvider extends ServiceProvider
{
    protected $handler;

    function register()
    {
        $this->handler = new Run();
        $this->handler->appendHandler(new PrettyPageHandler);
    }

    function boot()
    {
        $debug = config('app.debug') === true;
        error_reporting((E_ALL ^ E_NOTICE) * $debug);

        if ($debug)
            $this->handler->register();
    }
}