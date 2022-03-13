<?php

namespace Phpmvc\Src\Models;

use Phpmvc\Src\Core\Facades\Validator;
use Phpmvc\Src\Core\Model;

class FormModel extends Model
{
    public string $amount='';
    public string $buyer='';
    public string $receipt_id='';
    public string $items='';
    public string $buyer_email='';
    public string $buyer_ip='';
    public string $note='';
    public string $city='';
    public string $phone='';
    public string $hash_key='';
    public string $entry_at='';
    public string $entry_by='';
    public array $rules=[
        'amount'=>[Validator::VR_REQUIRED,[Validator::VR_MIN,'min'=>8]],
        'buyer'=>[Validator::VR_REQUIRED],
        'receipt_id'=>[Validator::VR_REQUIRED],
        'items'=>[Validator::VR_REQUIRED],
        'buyer_email'=>[Validator::VR_REQUIRED,Validator::VR_EMAIL],
        'buyer_ip'=>[Validator::VR_REQUIRED],
        'note'=>[Validator::VR_REQUIRED],
        'city'=>[Validator::VR_REQUIRED],
        'phone'=>[Validator::VR_REQUIRED],
        'hash_key'=>[Validator::VR_REQUIRED],
        'entry_at'=>[Validator::VR_REQUIRED],
        'entry_by'=>[Validator::VR_REQUIRED],
    ];
    public ?object $validate=null;

}