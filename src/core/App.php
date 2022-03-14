<?php
namespace Phpmvc\Src\Core;
class App{
    public static string $PROJECT_ROOT;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Database $db;
    public static App $app;
    public function __construct($root,$config)
    {
        self::$PROJECT_ROOT=$root;
        self::$app=$this;
        self::$db=new Database($config['host'],$config['db_name'],$config['username'],$config['password']);
        $this->request=new Request();
        $this->response=new Response();
        $this->router=new Router($this->request,$this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}