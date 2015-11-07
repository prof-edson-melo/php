<?php

class Frete {

    private $servico = null;
    private $cepOrigem = null;
    private $cepDestino = null;
    private $prazo = null;
    private $valor = null;

    public function __construct($servico, $cepOrigem, $cepDestino) {
        $this->servico = $servico;
        $this->cepOrigem = $cepOrigem;
        $this->cepDestino = $cepDestino;
    }

    public function getServico() {
        return $this->servico;
    }

    public function getCepOrigem() {
        return $this->cepOrigem;
    }

    public function getCepDestino() {
        return $this->cepDestino;
    }

    public function getPrazo() {
        return $this->prazo;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setServico($servico) {
        $this->servico = $servico;
    }

    public function setCepOrigem($cepOrigem) {
        $this->cepOrigem = $cepOrigem;
    }

    public function setCepDestino($cepDestino) {
        $this->cepDestino = $cepDestino;
    }

    public function setPrazo($prazo) {
        $this->prazo = $prazo;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function calculaFrete() {
        $frete = new WSCorreios();
        $resposta = $frete
                ->setCepOrigem($this->cepOrigem)
                ->setCepDestino($this->cepDestino)
                ->setLargura('15')
                ->setComprimento('20')
                ->setAltura('5')
                ->setPeso('1')
                ->setFormatoDaEncomenda(WsCorreios::FORMATO_CAIXA)
                ->setServico($this->servico)
                ->dados();

        switch ($this->servico) {
            case $this->servico: '40010';
                $this->servico = 'SEDEX';
                break;
            default:
                $this->servico = 'PAC';
                break;
        }

        $this->valor = $resposta['valor'];
    }

}
