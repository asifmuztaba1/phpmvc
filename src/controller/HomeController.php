<?php
namespace Phpmvc\Src\Controller;
use Phpmvc\Src\Core\App;
use Phpmvc\Src\Core\Controller;
use Phpmvc\Src\Core\Facades\Hasher;
use Phpmvc\Src\Core\Facades\System;
use Phpmvc\Src\Core\Facades\Validator;
use Phpmvc\Src\Core\Request;
use Phpmvc\Src\Models\FormModel;

/**
 * @package Phpmvc\Src\Controller
 */
class HomeController extends Controller
{
    /**
     * @throws \JsonException
     */
    public function store(Request $request): string
    {
        $formModel= new FormModel();
        $formModel->validate=new Validator($formModel,$formModel->rules);
        if ($request->isPost()){
            $formModel->loadData($request->getBody());
            $formModel->buyer_ip=System::getClientIp();
            $formModel->hash_key= Hasher::make('asdas','asif');
            $formModel->validate=new Validator($formModel,$formModel->rules);
            if(!$formModel->validate->validate()){
                return json_encode(["status" => "error", "msg" => $formModel->validate->errors], JSON_THROW_ON_ERROR);
            }

            $data=array(
                "amount"=>$formModel->amount,
                "buyer"=>$formModel->buyer,
                "receipt_id"=>$formModel->receipt_id,
                "items"=>$formModel->items,
                "buyer_email"=>$formModel->buyer_email,
                "note"=>$formModel->note,
                "city"=>$formModel->city,
                "phone"=>$formModel->phone,
                "entry_by"=>$formModel->entry_by,
                "buyer_ip"=>$formModel->buyer_ip,
                "hash_key"=>$formModel->hash_key
            );
            $insert   =  App::$db->insert($formModel->tableName,$data);
            return json_encode(["status" => "success", "msg" => "Record Saved"], JSON_THROW_ON_ERROR);
        }
        $body=$request->getBody();
        return $this->render('home',['formModel'=>$formModel]);
    }
    public function getReport(){
        $formModel= new FormModel();
        $data=App::$db->select($formModel->tableName);
        return $this->render('report',['data'=>$data]);
    }
}