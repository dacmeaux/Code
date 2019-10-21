<?php
require_once 'class.Validator.php';
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
            Validator::failed($object, 'object');
    }

    public function isValid($name, $value)
    {
        if( !in_array($name, $this->object_fields) )
            return false;

        if( is_object($value) ){
            $this->object = $value;
            return true;
        }

        return false;
    }

    public function getData()
    {
        return $this->object;
    }
}