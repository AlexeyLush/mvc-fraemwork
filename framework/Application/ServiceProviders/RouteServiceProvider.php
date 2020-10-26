<?php


namespace App\Framework\Application\ServiceProviders;


use Exception;
use League\Route\Http\Exception\NotFoundException;
use League\Route\Router;

class RouteServiceProvider extends ServiceProvider
{

    /** @var Router */
    protected $router;
    protected $response;

    function register() {
        $this->router = new Router;
        $this->registerRoutes();
    }

    function boot() {
        $request = $this->app->request();
        try{
            $this->response = $this->router->dispatch($request);
        } catch(Exception $exception){
            if (config('app.debug') === true)
                throw $exception;

            $code = $exception->getCode();
            if (!$code)
                $code = 500;

            $message = $exception->getMessage();
            $this->response = view('error', [
                'code' => $code,
                'message' => $message
            ]);
        }
    }

    function registerRoutes() {
        $this->router->group('', function ($router) {
            require_once path('routes/web.php');
        });
    }

    function router() {
        return $this->router;
    }

    function response() {
        return $this->response;
    }

}
