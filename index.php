<?php
require_once 'class.Data.php';
require_once 'class.Result.php';
require_once 'class.Search.php';
require_once 'class.Response.php';
require_once 'class.DocumentUtils.php';
require_once 'class.NumberValidator.php';

$template = file_get_contents('template.html');
$response = new Response();
$data = $response->getData();
$documents = DocumentUtils::parseResponseToDocuments($response);

echo '<pre>Documents: '. var_export($documents, true) .'</pre>';