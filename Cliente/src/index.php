<?php
header("Content-Type:application/json");

$post = file_get_contents('php://input'); 

if(!empty($post)) {
  $post = json_decode($post);
  
  $lineas = file('clientes.txt');

  foreach ($lineas as $linea) {
    $data = explode(';', $linea);
    if($data[0] == $post->identifier  &&  $data[1] == $post->psw) {
      include_once("cliente/cliente.php");
      
      $cliente = new Cliente($data[0], $data[2]);
      response(200,"Ok", serialize($cliente));
    }
  }
  
	response(200,"false", 'datos erroneos');
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