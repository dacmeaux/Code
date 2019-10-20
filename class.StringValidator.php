<?php
require_once 'interface.Validate.php';

class StringValidator implements ValidateInterface
{
    private $string_fields = array('css_class');
    private $string = null;

    public function __construct($string = null)
    {
        if( !is_null($string) && is_string($string) ){
            $this->string = $string;
        }
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->string_fields) )
            return false;

        if( is_string($value) ){
            $this->string = $value;
        }

        return true;
    }

    public function getData()
    {
        return $this->string;
    }
}