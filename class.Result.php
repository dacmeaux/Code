<?php
require_once 'interface.Validate.php';

class Result implements ValidateInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;

        if( !is_array($this->data) )
            $this->data = array($data);
    }

    public function isValid($name, $value)
    {
        // TODO: Implement isValid() method.
    }

    public function getData()
    {
        return $this->data;
    }
}