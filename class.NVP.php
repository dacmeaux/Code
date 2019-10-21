<?php
require_once 'class.Validator.php';
require_once 'class.NumberValidator.php';
require_once 'class.StringValidator.php';
require_once 'class.BooleanValidator.php';

final class NVP
{
    private $name = '';
    private $value = '';

    public function __construct(ObjectValidator $attr_obj)
    {
        $attrs = $attr_obj->getData();
        $this->setState('name', $attrs->name);
        $this->setState('value', $attrs->value);
    }

    private function setState($name, $value)
    {
        $validator_obj = new Validator();
        $validator_obj->addValidator(new NumberValidator());
        $validator_obj->addValidator(new BooleanValidator());
        $validator_obj->addValidator(new StringValidator());
        $value = $validator_obj->validate($name, $value);
        $this->{$name} = $value;
    }

    public function getData()
    {
        return array($this->name=>$this->value);
    }
}