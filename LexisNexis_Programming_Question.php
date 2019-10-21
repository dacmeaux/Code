<?php 

// PART 1
// 
// You are given the below ResponseInterface and json blob
// 
// Write a class that implements ResponseInterface which takes a json string and parses the response into the following parts:
// 	* Search
// 	* Data
// 	* Code
// 	* Message
// 	* ResultCount
// 	
// NOTE: Response class should be read-only. 
// 		 Both Code and ResultCount should have default values of 0
// 		 Data should have an empty array as its default value


//interface ResponseInterface
//{
//	public function getCode();
//	public function getMessage();
//	public function getResultCount();
//	public function getData();
//	public function getSearch();
//}


$json = '{
    "Search": {
        "total_records": 2,
        "start_at": 0,
        "max_records": 2
    },
    "Data": [
    	{
    		"id": 2,
    		"document_name": "Document One",
    		"published": true,
    		"document_attributes":[
				{
					"name": "sub_product_id",
					"value": "1"
				},
				{
					"name": "css_class",
					"value": "mbs-style-1"
				}
    		]
    	},
    	{
    		"id": 2,
    		"document_name": "Document Two",
    		"published": false,
    		"document_attributes":[
				{
					"name": "sub_product_id",
					"value": "2"
				},
				{
					"name": "css_class",
					"value": "mbs-style-2"
				}
    		]
    	}
    ],
    "Code": 0,
    "Message": "",
    "ResultCount": 2
}';



// PART 2
// In the provided JSON Blob the Data property contained a collection of "Documents". Write two classes
// one for "Document" and one for the object that represents the document_attribute collection. Since the
// attributes are name value pairs, call this object "NVP".
// 
// Each object should be read-only.



// PART 3
// Now write a "static" class called  DocumentUtils that has a static method called parseResponseToDocuments
// that takes a ResponseInterface as input and returns a collection of Documents.
// 
// Please ensure that this function also parses document attribute objects
// @throws \Exception when either the Document or its attribute do not have the correct structure
