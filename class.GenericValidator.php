<?php
require_once 'interface.Validate.php';

class GenericValidator implements ValidateInterface
{
    private $generic = null;

    public function __construct($generic = null)
    {
        if( is_null($generic) )
            return;

        if( !is_int($generic) && !is_array($generic) && !is_object($generic) && !is_bool($generic) && !is_string($generic) )
            $this->generic = (string) $generic;
    }

    public function isValid($name, $value)
    {
        if( !is_int($value) && !is_array($value) && !is_object($value) && !is_bool($value) && !is_string($value) )
            $this->generic = (string) $value;

        return true;
    }

    public function getData()
    {
        return $this->generic;
    }
}