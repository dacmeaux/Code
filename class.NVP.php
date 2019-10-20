<?php

final class NVP
{
    private $name = '';
    private $value = '';

    public function __construct($attr)
    {
        $this->name = $attr->name;
        $this->value = $attr->value;
    }

    public function getData()
    {
        return array($this->name=>$this->value);
    }
}