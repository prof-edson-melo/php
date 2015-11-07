<?php

class Endereco {

    private $id_endereco = null;
    protected $idCliente = null;
    protected $cepOrigem = null;
    protected $cepDestino = null;
    protected $numero = null;
    protected $complemento = null;

    public function getId_endereco() {
        return $this->id_endereco;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getCepOrigem() {
        return $this->cepOrigem;
    }

    public function getCepDestino() {
        return $this->cepDestino;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function setId_endereco($id_endereco) {
        $this->id_endereco = $id_endereco;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setCepOrigem($cepOrigem) {
        $this->cepOrigem = $cepOrigem;
    }

    public function setCepDestino($cepDestino) {
        $this->cepDestino = $cepDestino;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

}
