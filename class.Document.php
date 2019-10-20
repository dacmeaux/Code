<?php
require_once 'class.Validator.php';
require_once 'class.NumberValidator.php';
require_once 'class.BooleanValidator.php';
require_once 'class.StringValidator.php';
require_once 'class.ObjectValidator.php';
require_once 'class.Search.php';
require_once 'class.NVP.php';

final class Document
{
    private $data_file = 'data.json';
    private $json_data = null;
    private $document_name = '';
    private $published = false;
    private $document_attributes = array();

    public function __construct(NumberValidator $number_obj)
    {
        $id = $number_obj->getData();
        $json_data = $this->json_data = json_decode(file_get_contents($this->data_file, true));
        var_export($json_data);

        $this->setState('document_name', $json_data->Data[$id]->document_name);
        $this->setState('published', $json_data->Data[$id]->published);

        foreach( $json_data->Data[$id]->document_attributes as $document_attribute )
            $this->document_attributes[] = new NVP($document_attribute);
    }

    private function setState($name, $value)
    {
        $validator_obj = new Validator();
        $validator_obj->addValidator(new NumberValidator());
        $validator_obj->addValidator(new BooleanValidator());
        $validator_obj->addValidator(new StringValidator());
        $validator_obj->addValidator(new ObjectValidator());
        $value = $validator_obj->validate($name, $value);
        $this->{$name} = $value;
    }

    public function getTotalRecords()
    {
        $search_obj = new Search($this->json_data);
        return $search_obj->getTotalRecords();
    }

    public function getStartAt()
    {
        $search_obj = new Search($this->json_data);
        return $search_obj->getStartAt();
    }

    public function getMaxRecords()
    {
        $search_obj = new Search($this->json_data);
        return $search_obj->getMaxRecords();
    }

    public function getDocumentAttributes()
    {
        return $this->document_attributes;
    }

    public static function documentFactory($id)
    {
        return new Document($id);
    }
}