<?php
require_once 'interface.Validate.php';

class BooleanValidator implements ValidateInterface
{
    private $boolean_fields = array('published');
    private $bool = null;

    public function __construct($bool = null)
    {
        if( !is_null($bool) && is_bool($bool) ){
            $this->bool = $bool;
        }
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->boolean_fields) )
            return false;

        if( is_bool($value) ){
            $this->bool = $value;
        }

        return true;
    }

    public function getData()
    {
        return $this->bool;
    }
}