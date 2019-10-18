<?php
require_once 'interface.Validate.php';

class Number implements ValidateInterface
{
    private $number = 0;

    public function __construct($number)
    {
        if( is_numeric($number) && $number > -1 ){
            $this->number = $number;
        }
    }

    public function getData()
    {
        return $this->number;
    }
}