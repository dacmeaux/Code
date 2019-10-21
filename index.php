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

//function render(Result $result_obj){
//    $template_file = 'template.html';
//    $results = $result_obj->getData();
//    $ret = array();
//    $map = array(
//        'document_name',
//        'id',
//        'published'
//    );
//
//    foreach( $results as $product ){
//        $template = file_get_contents($template_file, true);
//
//        // Replace template tokens
//        foreach( $map as $name ){
//            $template = str_replace('{{'. strtoupper($name) .'}}', $product->{$name}, $template);
//        }
//
//        foreach( $product->document_attributes as $attr ){
//            $template = str_replace('{{'. strtoupper($attr->name) .'}}', $attr->value, $template);
//        }
//
//        $ret[] = $template;
//    }
//
//    echo implode("\n", $ret);
//}

//$results = doSearch(new Search($search), new Data($data));
//render(new Result($results));