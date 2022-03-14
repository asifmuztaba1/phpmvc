<?php
namespace Phpmvc\Src\Core\Facades;
class Validator
{
    public const VR_REQUIRED='required';
    public const VR_EMAIL='email';
    public const VR_MAX='max';
    public const VR_MIN='min';
    public const VR_MATCH='match';
    public array $errors=[];
    private $inputs;

    /**
     * @param array $errors
     */
    public function __construct($inputs,$rules)
    {
        $this->inputs = $inputs;
        $this->rules = $rules;
    }

    public function validate()
    {
        foreach ($this->rules as $attribute=>$rules){
            $value=$this->inputs->{$attribute};
            foreach ($rules as $rule) {
                $rulename=$rule;
                if(!is_string($rulename)){
                    $rulename=$rule[0];
                }
                if($rulename===self::VR_REQUIRED && !$value){
                    $this->addErrors($attribute,self::VR_REQUIRED);
                }
                if($rulename==self::VR_EMAIL && !filter_var($value,FILTER_VALIDATE_EMAIL)){
                    $this->addErrors($attribute,self::VR_EMAIL);
                }
                if($rulename==self::VR_MIN && strlen($value)<$rule['min']){
                    $this->addErrors($attribute,self::VR_MIN,$rule);
                }
                if($rulename==self::VR_MAX && strlen($value)>$rule['max']){
                    $this->addErrors($attribute,self::VR_MAX,$rule);
                }
            }
        }
        return empty($this->errors);
    }

    public function addErrors($attribute,$rule,$params=[])
    {
        $message=$this->errorMessage()[$rule]??'';
        foreach ($params as $key=>$value) {
            $message=str_replace("{{$key}}",$value,$message);
        }
        $this->errors[$attribute][]=$message;
    }

    public function errorMessage()
    {
        return [
            self::VR_REQUIRED=>"This field is required",
            self::VR_EMAIL=>"This Must be an email",
            self::VR_MAX=>"The maximum length of the input should be {max}",
            self::VR_MIN=>"The minimum length of the input should be {min}",
        ];
    }
    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }
    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }
}
