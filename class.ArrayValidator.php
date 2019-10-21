<?php
require_once 'class.Validator.php';
require_once 'interface.Validate.php';

class ArrayValidator implements ValidateInterface
{
    private $array_fields = array('document_attributes');
    private $array = array();

    public function __construct($array = null)
    {
        if( is_null($array) )
            return;

        if( is_array($array)  )
            $this->array = $array;
        else
            Validator::failed($array, 'array');
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->array_fields) )
            return false;

        if( is_array($value) ){
            $this->array = $value;
            return true;
        }

        return false;
    }

    public function getData()
    {
        return $this->array;
    }
}