<?php

session_start();

if(empty($_SESSION['factura'])) {
  $_SESSION['error']  = 'Por favor ingrese el numero de la factura';
}
else {
  include_once("../factura/factura.php");
  $factura = unserialize($_SESSION['factura']);
  $factura->pagarFactura();
  $_SESSION['transaccion'] = serialize($factura->transaccion);
  
}

$url_inicio = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
header("Location: $url_inicio/index.php");