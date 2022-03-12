<?php
require_once "vendor/autoload.php";
use Phpmvc\Src\Core\App;
$app=new App(dirname(__DIR__).'\phpMvcCreation\src/');
$app->router->get('/contact','contact');
$app->router->get('/','home');

$app->run();