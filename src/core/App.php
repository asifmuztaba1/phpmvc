<?php
namespace Phpmvc\Src\Core;
class App{

    public Router $router;
    public Request $request;
    public function __construct()
    {
        $this->request=new Request();
        $this->router=new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}