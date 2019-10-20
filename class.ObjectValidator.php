<?php
require_once 'interface.Validate.php';

class ObjectValidator implements ValidateInterface
{
    private $object_fields = array('document_attributes');
    private $object = null;

    public function __construct($object = null)
    {
        if( !is_null($object) && is_object($object) ){
            $this->object = $object;
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