<?php
require_once 'class.Validator.php';
require_once 'class.NumberValidator.php';
require_once 'class.BooleanValidator.php';
require_once 'class.StringValidator.php';
require_once 'class.ObjectValidator.php';
require_once 'class.GenericValidator.php';
require_once 'class.ArrayValidator.php';
require_once 'class.Search.php';
require_once 'class.NVP.php';


final class Document
{
    private $id = 0;
    private $document_name = '';
    private $published = false;
    private $document_attributes = array();

    public function __construct(ObjectValidator $valid_obj)
    {
        $_data = $valid_obj->getData();
        $this->setState('id', $_data->id);
        $this->setState('document_name', $_data->document_name);
        $this->setState('published', $_data->published);

//        $this->setState('my_name', null);
        $attrs = array();
        foreach( $_data->document_attributes as $document_attribute )
            $attrs[] = new NVP($document_attribute);

        $this->setState('document_attributes', $attrs);
    }

    private function setState($name, $value)
    {
        $validator_obj = new Validator();
        $validator_obj->addValidator(new NumberValidator());
        $validator_obj->addValidator(new BooleanValidator());
        $validator_obj->addValidator(new StringValidator());
        $validator_obj->addValidator(new ArrayValidator());
        $validator_obj->addValidator(new ObjectValidator());
        // Generic validator is a catchall and
        // converts everything to a string
//        $validator_obj->addValidator(new GenericValidator());
        $value = $validator_obj->validate($name, $value);
        $this->{$name} = $value;
    }

    public static function documentFactory(ObjectValidator $valid_obj)
    {
        return new Document($valid_obj);
    }
}