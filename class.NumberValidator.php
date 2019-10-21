<?php
require_once 'class.Validator.php';
require_once 'interface.Validate.php';

class NumberValidator implements ValidateInterface
{
    private $number_fields = array('sub_product_id', 'id', 'value');
    private $number = 0;

    public function __construct($number = null)
    {
        if( is_null($number) )
            return;

        if( is_numeric($number) && $number > -1 )
            $this->number = $number;
        else
            Validator::failed($number, 'number');
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->number_fields) )
            return false;

        if( is_numeric($value) && $value > -1 ){
            $this->number = $value;
            return true;
        }

        return false;
    }

    public function getData()
    {
        return $this->number;
    }
}