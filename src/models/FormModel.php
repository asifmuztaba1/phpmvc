<?php

namespace Phpmvc\Src\Models;

use Phpmvc\Src\Core\App;
use Phpmvc\Src\Core\Facades\Validator;
use Phpmvc\Src\Core\Model;

class FormModel extends Model
{
    public $tableName='buyer_info';
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
        'amount'=>[Validator::VR_REQUIRED],
        'buyer'=>[Validator::VR_REQUIRED,[Validator::VR_MAX,'max'=>20]],
        'receipt_id'=>[Validator::VR_REQUIRED],
        'items'=>[Validator::VR_REQUIRED],
        'buyer_email'=>[Validator::VR_REQUIRED,Validator::VR_EMAIL],
        'buyer_ip'=>[Validator::VR_REQUIRED],
        'note'=>[Validator::VR_REQUIRED,[Validator::VR_MAX,'max'=>30]],
        'city'=>[Validator::VR_REQUIRED],
        'phone'=>[Validator::VR_REQUIRED],
        'hash_key'=>[Validator::VR_REQUIRED],
        'entry_by'=>[Validator::VR_REQUIRED],
    ];
    public ?object $validate=null;

    /**
     * @param string $tableName
     */
    public function __construct()
    {
        $this->createModelTable();
    }

    public function createModelTable()
    {
        $sql="CREATE TABLE IF NOT EXISTS `{$this->tableName}` (
                  `id` bigint(20) NOT NULL AUTO_INCREMENT,
                  `amount` int(10) NOT NULL,
                  `buyer` varchar(255) NOT NULL,
                  `receipt_id` varchar(20) NOT NULL,
                  `items` varchar(255) NOT NULL,
                  `buyer_email` varchar(50) NOT NULL,
                  `buyer_ip` varchar(20) NOT NULL,
                  `note` text NOT NULL,
                  `city` varchar(20) NOT NULL,
                  `phone` varchar(20) NOT NULL,
                  `hash_key` varchar(255) NOT NULL,
                  `entry_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `entry_by` int(10) NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                COMMIT;";
        App::$db->createTable($sql);
    }

}