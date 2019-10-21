<?php
require_once 'class.Response.php';
require_once 'class.DocumentUtils.php';

$response = new Response();
$data = $response->getData();
$documents = DocumentUtils::parseResponseToDocuments($response);

echo '<pre>Documents: '. var_export($documents, true) .'</pre>';