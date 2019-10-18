<?php 

// Question
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
?>