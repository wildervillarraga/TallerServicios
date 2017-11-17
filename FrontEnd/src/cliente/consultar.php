<?php

session_start();

if(empty($_POST['documento'])  ||  empty($_POST['psw'])) {
  $_SESSION['error']  = 'Por favor ingrese el numero de documento y su contraseña';
}
else {
  include_once("../cliente/cliente.php");

  $url = 'http://172.31.112.11/index.php';
  $ch = curl_init($url);
  //el json simulamos una petición de un login
  $jsonData = array(
    'identifier' => $_POST['documento'], //código fijo
    'psw' => $_POST['psw'],
  );
  //creamos el json a partir de nuestro arreglo
  $jsonDataEncoded = json_encode($jsonData);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  $result = curl_exec($ch);
  
  if(!empty($result)) {
    $result = json_decode($result);
    if(isset($result->data)) {
      $_SESSION['cliente'] = $result->data;
    }
  }
  
}

$url_inicio = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
header("Location: $url_inicio/index.php");