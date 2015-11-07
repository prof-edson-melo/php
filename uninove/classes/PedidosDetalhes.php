<?php

class PedidosDetalhes {

    private $idPedido = null;
    private $titulo = null;
    private $quantidade = null;
    private $valor_unitario = null;
    private $formaPagamento = null;
    private $formaEnvio = null;
    private $origem = null;
    private $destino = null;
    private $numero = null;
    private $complemento = null;
    private $data = null;
    private $endereco = null;

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function __construct() {
        
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getValor_unitario() {
        return $this->valor_unitario;
    }

    public function getFormaPagamento() {
        return $this->formaPagamento;
    }

    public function getFormaEnvio() {
        return $this->formaEnvio;
    }

    public function getOrigem() {
        return $this->origem;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setValor_unitario($valor_unitario) {
        $this->valor_unitario = $valor_unitario;
    }

    public function setFormaPagamento($formaPagamento) {
        $this->formaPagamento = $formaPagamento;
    }

    public function setFormaEnvio($formaEnvio) {
        $this->formaEnvio = $formaEnvio;
    }

    public function setOrigem($origem) {
        $this->origem = $origem;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

}
