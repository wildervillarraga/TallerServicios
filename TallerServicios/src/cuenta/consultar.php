<?php

function cuentaConsultarSaldo() {
  include_once("cliente/cliente.php");
  include_once("cuenta/cuenta.php");
  
  $cliente = unserialize($_SESSION['cliente']);
  
  $url = 'http://localhost/TallerServiciosCuenta/';
  $ch = curl_init($url);
  //el json simulamos una petición de un login
  $jsonData = array(
    'identifier' => $cliente->getIdCliente(),
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
      $cuenta = unserialize($result->data);
      
      return $cuenta->getSaldo();
    }
  }
  
  return NULL;
}