<?php

/**
 * DTO (Data Transfer Object) carrinho para o model CarrinhoDAO
 */
class Carrinho {

    private $id_carrinho = null;
    private $id_produto = null;
    private $qtd_produto = null;
    private $session = null;
    private $comprou = null;

    public function __construct() {
        
    }

    public function getIdCarrinho() {
        return $this->id_carrinho;
    }

    public function getIdProduto() {
        return $this->id_produto;
    }

    public function getQtdProduto() {
        return $this->qtd_produto;
    }

    public function getSession() {
        return $this->session;
    }

    public function getComprou() {
        return $this->comprou;
    }

    public function setIdCarrinho($id_carrinho) {
        $this->id_carrinho = $id_carrinho;
    }

    public function setIdProduto($id_produto) {
        $this->id_produto = $id_produto;
    }

    public function setQtdProduto($qtd_produto) {
        $this->qtd_produto = $qtd_produto;
    }

    public function setSession($session) {
        $this->session = $session;
    }

    public function setComprou($comprou) {
        $this->comprou = $comprou;
    }

}
