<?php
require_once 'class.Validator.php';
require_once 'interface.Validate.php';

class BooleanValidator implements ValidateInterface
{
    private $boolean_fields = array('published');
    private $bool = null;

    public function __construct($bool = null)
    {
        if( is_null($bool) )
            return;

        if( is_bool($bool) )
            $this->bool = $bool;
        else
            Validator::failed($bool, 'boolean');
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->boolean_fields) )
            return false;

        if( is_bool($value) ){
            $this->bool = $value;
            return true;
        }

        return false;
    }

    public function getData()
    {
        return $this->bool;
    }
}