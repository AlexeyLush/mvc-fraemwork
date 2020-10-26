<?php


namespace App\Framework\Application\ServiceProviders;


use SmartyBC;

class ViewServiceProvider extends ServiceProvider
{

    /***
     * @var SmartyBC
     */
    protected $smarty;

    function register()
    {
        $this->smarty = new SmartyBC();
    }

    function boot()
    {
        $path = config('view.path');
        $cPath = config('view.compile_path');
        $this->smarty->setTemplateDir($path)
            ->setCompileDir($cPath);

        $data = $this->getRequestData();
        $this->smarty->assign('request', $data);
    }

    protected function getRequestData(){
        $request = $this->app->request();
        $method = $request->getMethod();

        if ($method == "GET")
            return $request->getQueryParams();

        return $request->getParsedBody();

    }

    function smarty(){
        return $this->smarty;
    }
}