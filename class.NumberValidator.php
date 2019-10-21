<?php
require_once 'interface.Validate.php';

class NumberValidator implements ValidateInterface
{
    private $number_fields = array('sub_product_id', 'id');
    private $number = 0;

    public function __construct($number = null)
    {
        if( is_null($number) )
            return;

        if( is_int($number) && $number > -1 )
            $this->number = $number;
        else
        {
            try{
                throw new ErrorException('Could not validate '. var_export($number, true) .' as number');
            }
            catch (ErrorException $e)
            {
                die($e->getMessage() ."\n". $e->getTraceAsString());

            }
        }
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->number_fields) )
            return false;

        if( is_numeric($value) && $value > -1 ){
            $this->number = $value;
        }

        return true;
    }

    public function getData()
    {
        return $this->number;
    }
}