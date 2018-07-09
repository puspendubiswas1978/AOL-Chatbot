<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) 
	{
		case 'hi':
			$speech = "Hi, nice to meet you";
			break;
		case 'bye':
			$speech = "bye, good night";
			break;
		default:
			$speech = "Sorry, couldnt get you!";
			break;
	}
	$response = new \stdClass();
	$response->speech="";
	$response->displayText="";
	$response->source="webhook";
	echo json_encode($response);
}
else 
{
	echo "Method not allowed!";
}


?>