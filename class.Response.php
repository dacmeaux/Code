<?php
require_once 'interface.ResponseInterface.php';

class Response implements ResponseInterface{

    private $data_obj = array();
    private $data_file = 'data.json';

    public function __construct()
    {
        $this->data_obj = json_decode(file_get_contents($this->data_file, true));
    }
    public function getCode()
    {
        // TODO: Implement getCode() method.
        return $this->data_obj->Code;
    }

    public function getMessage()
    {
        // TODO: Implement getMessage() method.
        return $this->data_obj->Message;
    }

    public function getData()
    {
        // TODO: Implement getData() method
        return $this->data_obj->Data;
    }

    public function getResultCount()
    {
        // TODO: Implement getResultCount() method.
        return $this->data_obj->ResultCount;
    }

    public function getSearch()
    {
        // TODO: Implement getSearch() method.
        return $this->data_obj->Search;
    }
}