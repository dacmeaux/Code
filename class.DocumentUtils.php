<?php
require_once 'interface.ResponseInterface.php';
require_once 'class.Document.php';


final class DocumentUtils
{
    private function __construct(){}

    public static function parseResponseToDocuments(ResponseInterface $response)
    {
        $json_data  = $response->getData();
        $documents = array();

        foreach( $json_data->Data as $_data )
        {
            $object_validator = new ObjectValidator($_data);
            // Test validator
//            $object_validator = new ObjectValidator(array());
            $document_obj = Document::documentFactory($object_validator);
            $documents[] = $document_obj;
        }

        return $documents;
    }
}