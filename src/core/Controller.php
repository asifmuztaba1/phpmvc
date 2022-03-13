<?php

namespace Phpmvc\Src\Core;

class Controller
{
    public function render($view,$params=[])
    {
        return App::$app->router->renderView($view,$params);
    }
}