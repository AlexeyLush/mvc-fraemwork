<?php


namespace App\Framework\Kernel;


use App\Framework\Application\ServiceProviders\ServiceProvider;
use Exception;
use ReflectionClass;

class ServiceProviderBag
{
    protected $app;
    protected $providers;

    public function __construct(Application $app) {
        $this->app = $app;
        $this->providers = [];
    }

    function register(string $name) {

        if (array_key_exists($name, $this->providers))
            throw new Exception("[$name] provider already registered.");

        $reflection = new ReflectionClass($name);

        if (! ($reflection)->isSubclassOf(ServiceProvider::class))
            throw new Exception("[$name] class must be ServiceProver.");

        $provider = new $name($this->app);
        $provider->register();
        $this->providers[$name] = $provider;
    }

    function get(string $name) {

        if(! isset($this->providers[$name]))
            throw new Exception("[$name] provider does not registered.");

        return $this->providers[$name];
    }

    function boot(string $name) {
        $this->get($name)->boot();
    }

}
