<?php
require_once 'class.Validator.php';
require_once 'interface.Validate.php';

class StringValidator implements ValidateInterface
{
    private $string_fields = array('css_class', 'document_name', 'name', 'value');
    private $string = '';

    public function __construct($string = null)
    {
        if( is_null($string) )
            return;

        if( is_string($string) )
            $this->string = $string;
        else
            Validator::failed($string, 'string');
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->string_fields) )
            return false;

        if( is_string($value) ){
            $this->string = $value;
            return true;
        }

        return false;
    }

    public function getData()
    {
        return $this->string;
    }
}