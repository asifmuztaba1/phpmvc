<?php
namespace Phpmvc\Src\Controller;
use Phpmvc\Src\Core\Controller;
use Phpmvc\Src\Core\Facades\Validator;
use Phpmvc\Src\Core\Request;
use Phpmvc\Src\Models\FormModel;

/**
 * @package Phpmvc\Src\Controller
 */
class HomeController extends Controller
{
    public function store(Request $request): string
    {
        $formModel= new FormModel();
        $formModel->validate=new Validator($formModel,$formModel->rules);
        if ($request->isPost()){

            $formModel->loadData($request->getBody());
            $formModel->buyer_ip="12.12.12";
            $formModel->hash_key='asdas';
            $formModel->entry_at='sdfsdf';
            $formModel->validate=new Validator($formModel,$formModel->rules);
            if(!$formModel->validate->validate()){

                return $this->render('home',['formModel'=>$formModel]);
            }
            //var_dump($validate->validate());
            //var_dump($validate->errors);

        }
        $body=$request->getBody();
        return $this->render('home',['formModel'=>$formModel]);
    }
}