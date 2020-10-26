<?php


namespace App\Framework\Kernel;


use App\Framework\Application\ServiceProviders\RouteServiceProvider;
use Psr\Http\Message\ServerRequestInterface;

final class Application {

    /** @var self */
    protected static $app;
    protected $request;
    protected $providers;

    protected function __construct(ServerRequestInterface $request) {
        $this->request = $request;
        $this->providers = new ServiceProviderBag($this);
        $this->registerProviders();
    }

    static function app(ServerRequestInterface $request = null) {

        if(self::$app)
            return self::$app;

        self::$app = new self($request);
        return self::$app;
    }

    protected function registerProviders() {

        foreach (config('app.providers', []) as $provider)
            $this->providers->register($provider);

    }

    function start() {

        foreach (config('app.providers', []) as $provider)
            $this->providers->boot($provider);

        return $this->providers
            ->get(RouteServiceProvider::class)
            ->response();
    }

    function request() {
        return $this->request;
    }

    function get($provider){
        return $this->providers->get($provider);
    }


}
