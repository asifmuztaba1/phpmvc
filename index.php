<?php
require_once "vendor/autoload.php";

use Phpmvc\Src\Controller\HomeController;
use Phpmvc\Src\Core\App;
$config=[
    'host'=>'',
    'db_name'=>'xpeedstudio',
    'username'=>'root',
    'password'=>''
];
$app=new App(dirname(__DIR__).'\phpMvcCreation\src/',$config);
$app->router->get('/',[HomeController::class,'store']);
$app->router->post('/',[HomeController::class,'store']);
$app->router->get('/contact',[HomeController::class,'index']);
$app->router->post('/contact',[HomeController::class,'store']);

$app->run();