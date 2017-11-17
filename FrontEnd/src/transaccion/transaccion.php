<?php

class Transaccion {
  private $idTransaccion;
  private $identifier;
  private $valor;
  private $return_id;

  public function __construct($identifier, $valor, $return_id) {
    $this->identifier = $identifier;
    $this->valor = $valor;
    $this->return_id = $return_id;
  }

  public function getIdTransaccion() {
      return $this->idTransaccion;
  }

  public function getIdentifier() {
      return $this->identifier;
  }

  public function getValor() {
      return $this->valor;
  }

  public function getReturn_id() {
    return $this->return_id;
  }

  public function save() {
    $this->idTransaccion = rand(1234, 999999);
  }
  
}