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

        Validator::failed($value, 'any');
        return false;
    }

    public static function failed($subject, $type)
    {
        try{
            throw new ErrorException('Could not validate '. var_export($subject, true) .' as '. $type);
        }
        catch (ErrorException $e)
        {
            die($e->getMessage() ."\n". $e->getTraceAsString());

        }
    }
}