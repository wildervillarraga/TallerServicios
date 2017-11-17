<?php

class Cuenta {
  private $idCliente;
  private $saldoCuenta;

  public function __construct($idCliente) {
    $this->idCliente = $idCliente;
  }

  public function updateSaldo() {
    $saldo = NULL;
    
    $lineas = file('cuentas.txt');

    foreach ($lineas as $linea) {
      $data = explode(';', $linea);
      if($data[0] == $this->idCliente) {
        $saldo = $data[1];
      }
    }
    
    $this->saldoCuenta = $saldo;
  }

  public function getIdCliente() {
      return $this->idCliente;
  }

  public function getSaldo() {
      return $this->saldoCuenta;
  }
  
}