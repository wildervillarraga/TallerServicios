<?php

class Factura {
  private $idFactura;
  private $valorFactura;
  private $convenioFactura;

  public function __construct($idFactura) {
    $this->idFactura = $idFactura;
  }

  public function getIdFactura() {
      return $this->idFactura;
  }

  public function getValorFactura() {
      return $this->valorFactura;
  }

  public function getConvenioFactura() {
      return $this->convenioFactura;
  }
  
  public function consultarFactura() {
    $wsdl = "http://localhost/TallerServiciosDispatcher/index.php?wsdl";
    $options = array(
      'soap_version'=>SOAP_1_1,
      'cache_wsdl'=>WSDL_CACHE_NONE,
      'connection_timeout'=>15,
      'trace'=>1,
      'encoding'=>'UTF-8',
      'exceptions'=>true,
    );
    $params = array(
      'idPago' => $this->idFactura,
    );
    
    try {
      $soap = new SoapClient($wsdl, $options);
      $data = $soap->getPago($params);
      
      print_r($data);
      sdad();
      
      $this->valorFactura = 1000;
    }
    catch(Exception $e) {
      die($e->getMessage());
    }
    
    $this->valorFactura = 2000;
  }

  public function pagarFactura() {
    include_once("../transaccion/transaccion.php");
    
    $wsdl = "http://localhost/TallerServiciosDispatcher/index.php?wsdl";
    $options = array(
      'soap_version'=>SOAP_1_1,
      'cache_wsdl'=>WSDL_CACHE_NONE,
      'connection_timeout'=>15,
      'trace'=>1,
      'encoding'=>'UTF-8',
      'exceptions'=>true,
    );
    $params = array(
      'factura' => $this->idFactura,
    );
    
    try {
      $soap = new SoapClient($wsdl, $options);
      $data = $soap->pagarFactura($params);
    }
    catch(Exception $e) {
      die($e->getMessage());
    }
    
    $this->transaccion = $transaccion;
  }
}