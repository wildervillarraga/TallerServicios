<?php

class Cliente {
  private $idCliente;
  private $nombreCliente;

  public function __construct($idCliente, $nombreCliente) {
    $this->idCliente = $idCliente;
    $this->nombreCliente = $nombreCliente;
  }

  public function getIdCliente() {
      return $this->idCliente;
  }

  public function getNombreCliente() {
      return $this->nombreCliente;
  }
  
}