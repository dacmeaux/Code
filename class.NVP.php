<?php
require_once 'interface.Validate.php';

final class NVP implements ValidateInterface
{
    private $attrs = array();

    public function __construct($attrs)
    {
        foreach( $attrs as $attr_obj )
        {
            $this->attrs[$attr_obj->name] = $attr_obj->value;
        }
    }

    public function getData()
    {
        return $this->attrs;
    }
}