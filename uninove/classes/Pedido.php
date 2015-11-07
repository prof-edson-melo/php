<?php

class Pedido {

    private $idPedido = null;
    private $idcliente = null;
    private $dataPedido = null;

    public function __construct() {
        
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function getIdcliente() {
        return $this->idcliente;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    public function getDataPedido() {
        return $this->dataPedido;
    }

    public function setDataPedido($dataPedido) {
        $this->dataPedido = $dataPedido;
    }

}
