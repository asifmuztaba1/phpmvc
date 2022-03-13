<?php
namespace Phpmvc\Src\Core;
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes=[];

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response=$response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path]=$callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path]=$callback;
    }
    public function resolve()
    {
        $path=str_replace('/phpMvcCreation','',$this->request->getPath());
        $method = $this->request->method();
        $callback = $this->routes[$method][$path]?? false;
        if(!$callback){
            App::$app->response->setStatusCode(404);
            return "Not Found";
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            [$controllerClass, $controllerMethod] = $callback;
            $objectToClass=new $controllerClass();
            return $objectToClass->$controllerMethod($this->request);
        }
        return $callback($this->request);
    }

    public function renderView(string $view,$params=[])
    {
        $layoutContent=$this->layoutContent();
        $viewCont=$this->renderViewCont($view,$params);
        return str_replace('{{yeildblock}}',$viewCont,$layoutContent);
    }

    private function layoutContent()
    {
        ob_start();
        include_once App::$PROJECT_ROOT."views/layouts/layout.php";
        return ob_get_clean();
    }
    private function renderViewCont($view,$params){
        ob_start();
        foreach ($params as $key=>$value){
            $$key=$value;
        }
        include_once App::$PROJECT_ROOT."views/$view.php";
        return ob_get_clean();
    }
}