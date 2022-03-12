<?php
namespace Phpmvc\Src\Core;
class Router
{
    public Request $request;
    protected array $routes=[];

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path]=$callback;
    }

    public function resolve()
    {
        $path=str_replace('/phpMvcCreation','',$this->request->getPath());
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path]?? false;
        if(!$callback){
            return "Not Found";
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        return $callback();
    }

    private function renderView(string $callback)
    {

    }
}