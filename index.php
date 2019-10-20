<?php
require_once 'class.Data.php';
require_once 'class.Result.php';
require_once 'class.Search.php';
require_once 'class.Response.php';
require_once 'class.Document.php';
require_once 'class.NumberValidator.php';

$template = file_get_contents('template.html');
$response = new Response();
$data = $response->getData();
$search = $response->getSearch();
$code = $response->getCode();
$message = $response->getMessage();
$result_count = $response->getResultCount();


$document_obj = Document::documentFactory(new NumberValidator(1));
echo '<pre>Document 1: '. var_export($document_obj, true) .'</pre>';

echo '<pre>Data: '. var_export($data, true) .'</pre>';
echo '<pre>Code: '. var_export($code, true) .'</pre>';
echo '<pre>Message: '. var_export($message, true) .'</pre>';
echo '<pre>ResultCount: '. var_export($result_count, true) .'</pre>';
echo '<pre>Search: '. var_export($search, true) .'</pre>';

// Custom Code
function doSearch(Search $search_obj, Data $data_obj){
    $search = $search_obj->getData();
    $data = $data_obj->getData();
    $start = $search->start_at;
    $max = $search->max_records;
    $count = $start;
    $ret = array();

    while( $count < $max ){
        $ret[] = $data[$count];
        $count++;
    }

    return $ret;
}

function render(Result $result_obj){
    $template_file = 'template.html';
    $results = $result_obj->getData();
    $ret = array();
    $map = array(
        'document_name',
        'id',
        'published'
    );

    foreach( $results as $product ){
        $template = file_get_contents($template_file, true);

        // Replace template tokens
        foreach( $map as $name ){
            $template = str_replace('{{'. strtoupper($name) .'}}', $product->{$name}, $template);
        }

        foreach( $product->document_attributes as $attr ){
            $template = str_replace('{{'. strtoupper($attr->name) .'}}', $attr->value, $template);
        }

        $ret[] = $template;
    }

    echo implode("\n", $ret);
}

$results = doSearch(new Search($search), new Data($data));
render(new Result($results));