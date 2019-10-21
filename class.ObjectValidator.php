<?php
require_once 'interface.Validate.php';

class ObjectValidator implements ValidateInterface
{
    private $object_fields = array('document', 'document_attributes');
    private $object = null;

    public function __construct($object = null)
    {
        if( is_null($object) )
            return;

        if( is_object($object) )
            $this->object = $object;
        else
        {
            try{
                throw new ErrorException('Could not validate '. var_export($object, true) .' as object');
            }
            catch (ErrorException $e)
            {
                die($e->getMessage() ."\n". $e->getTraceAsString());

            }
        }
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->object_fields) )
            return false;

        if( is_object($value) ){
            $this->object = $value;
        }

        return true;
    }

    public function getData()
    {
        return $this->object;
    }
}