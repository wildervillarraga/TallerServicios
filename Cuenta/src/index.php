<?php
header("Content-Type:application/json");

$post = file_get_contents('php://input'); 

if(!empty($post)) {
  $post = json_decode($post);
  
  include_once("cuenta/cuenta.php");
  
  $cuenta = new Cuenta($post->identifier);
  $cuenta->updateSaldo();
  
  response(200,"Ok", serialize($cuenta));
}
else {
	response(400,"Invalid Request",NULL);
}

function response($status, $status_message, $data) {
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;
	
	$json_response = json_encode($response);
	echo $json_response;
  
  exit;
}