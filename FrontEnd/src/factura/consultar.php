<?php

session_start();

if(empty($_POST['factura'])) {
  $_SESSION['error']  = 'Por favor ingrese el numero de la factura';
  
}
else {
  include_once("../factura/factura.php");

  $factura = new Factura($_POST['factura']);
  $factura->consultarFactura();
  
  $_SESSION['factura'] = serialize($factura);
}

$url_inicio = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
header("Location: $url_inicio/index.php");