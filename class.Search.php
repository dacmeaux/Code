<?php
require_once 'interface.Validate.php';

class Search implements ValidateInterface
{
    public $total_records = 0;
    private $start_at = 0;
    private $max_records = 0;

    public function __construct($data)
    {
        // Set defaults
        $this->total_records = 0;
        $this->start_at = 0;
        $this->max_records = 0;

        // Ensure that data is an object
        if( !is_object($data) )
            $data = (object) $data;

        // Set new data
        if( isset($data->total_records) && is_numeric($data->total_records) && $data->total_records > -1 )
            $this->total_records = $data->total_records;

        if( isset($data->start_at) && is_numeric($data->start_at) && $data->start_at > -1 )
            $this->start_at = $data->start_at;

        if( isset($data->max_records) && is_numeric($data->max_records) && $data->max_records > -1 )
            $this->max_records = $data->max_records;

    }

    public function isValid($name, $value)
    {
        // TODO: Implement isValid() method.
    }

    public function getData()
    {
        return (object) array(
            'total_records'=>$this->total_records,
            'max_records'=>$this->max_records,
            'start_at'=>$this->start_at
        );
    }

    public function getTotalRecords()
    {
        return $this->total_records;
    }

    public function getStartAt()
    {
        return $this->start_at;
    }

    public function getMaxRecords()
    {
        return $this->max_records;
    }
}