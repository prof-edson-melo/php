<?php

class ProdutosPedidos {

    private $idProduto = null;
    private $idPedido = null;
    private $quantidade = null;
    private $valorUnitario = null;

    public function __construct() {
        
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getValorUnitario() {
        return $this->valorUnitario;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setValorUnitario($valorUnitario) {
        $this->valorUnitario = $valorUnitario;
    }

}
