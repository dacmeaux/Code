<?php


class Result
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;

        if( !is_array($this->data) )
            $this->data = array($data);
    }

    public function getData()
    {
        return $this->data;
    }
}