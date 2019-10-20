<?php

class Validator
{
    private $_validators = array();

    public function addValidator( $validator )
    {
        $this->_validators[] = $validator;
    }

    public function validate( $name, $value )
    {
        foreach( $this->_validators as $validator )
        {
            if( $validator->isValid($name, $value) )
                return $validator->getData();
        }

        return false;
    }
}