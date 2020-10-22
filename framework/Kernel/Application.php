<?php


namespace App\Framework\Kernel;
use Psr\Http\Message\ServerRequestInterface;

final class Application
{
    protected static $app;
    protected $request;

    protected function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    static function app(ServerRequestInterface $request){
        if (self::$app)
            return self::$app;

        self::$app = new self($request);
        return self::$app;
    }

    function start(){
        echo "Start";
    }

    function request(){

    }

}