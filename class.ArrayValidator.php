<?php
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
        {
            try{
                throw new ErrorException('Could not validate '. var_export($array, true) .' as array');
            }
            catch (ErrorException $e)
            {
                die($e->getMessage() ."\n". $e->getTraceAsString());

            }
        }
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->array_fields) )
            return false;

        if( is_array($value) ){
            $this->array = $value;
        }

        return true;
    }

    public function getData()
    {
        return $this->array;
    }
}