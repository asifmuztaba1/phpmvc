<?php
require_once "vendor/autoload.php";
use Phpmvc\Src\Core\App;

$app=new App();
$app->router->get('/contact',function (){
    return "Contact";
});
$app->router->get('/','contact');

$app->run();