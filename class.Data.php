<?php
require_once 'interface.Validate.php';

class Data implements ValidateInterface
{
    private $data = array();

    public function __construct($data)
    {
        // Set defaults
        $this->data['total_records'] = 0;
        $this->data['start_at'] = 0;
        $this->data['max_records'] = 0;

        // Ensure that data is an object
        if( !is_array($data) )
            $data = array($data);

        $this->data = $data;
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