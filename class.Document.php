<?php
require_once 'class.Number.php';
require_once 'class.NVP.php';

final class Document
{
    private $data_file = 'data.json';
    private $total_records = 0;
    private $start_at = 0;
    private $max_records = 0;
    private $attr_obj = null;

    public function __construct(Number $id)
    {
        $json_data = json_decode(file_get_contents($this->data_file, true));
        $this->setState('total_records', $json_data[$id]->total_records);
        $this->setState('max_records', $json_data[$id]->max_records);
        $this->setState('start_at', $json_data[$id]->start_at);

        $this->attr_obj = new NVP($json_data[$id]->document_attributes);
    }

    private function setState($name, $value)
    {
        $numberValidator = new Number($value);
        $number = $numberValidator->getData();
        $this->{$name} = $number;
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