<?php
require_once 'interface.Validate.php';

class StringValidator implements ValidateInterface
{
    private $string_fields = array('css_class', 'document_name');
    private $string = '';

    public function __construct($string = null)
    {
        if( is_null($string) )
            return;

        if( is_string($string) )
            $this->string = $string;
        else
        {
            try{
                throw new ErrorException('Could not validate '. var_export($string, true) .' as string');
            }
            catch (ErrorException $e)
            {
                die($e->getMessage() ."\n". $e->getTraceAsString());

            }
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