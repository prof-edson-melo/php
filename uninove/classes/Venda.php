<?php

/**
 * DTO (Data Transfer Object) venda para o model VendaDAO
 */
class Venda {

    private $id_venda = null;
    private $id_pedido = null;
    private $id_endereco_envio = null;
    private $valor = null;
    private $pago = null;
    private $id_forma_pagamento = null;
    private $data_pagamento = null;
    private $enviado = null;
    private $id_forma_envio = null;
    private $data_envio = null;

    public function __construct() {
        
    }

    public function getIdVenda() {
        return $this->id_venda;
    }

    public function getIdPedido() {
        return $this->id_pedido;
    }

    public function getIdEnderecoEnvio() {
        return $this->id_endereco_envio;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getPago() {
        return $this->pago;
    }

    public function getIdFormaPagamento() {
        return $this->id_forma_pagamento;
    }

    public function getDataPagamento() {
        return $this->data_pagamento;
    }

    public function getEnviado() {
        return $this->enviado;
    }

    public function getIdFormaEnvio() {
        return $this->id_forma_envio;
    }

    public function getDataEnvio() {
        return $this->data_envio;
    }

    public function setIdVenda($id_venda) {
        $this->id_venda = $id_venda;
    }

    public function setIdPedido($id_pedido) {
        $this->id_pedido = $id_pedido;
    }

    public function setIdEnderecoEnvio($id_endereco_envio) {
        $this->id_endereco_envio = $id_endereco_envio;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setPago($pago) {
        $this->pago = $pago;
    }

    public function setIdFormaPagamento($id_forma_pagamento) {
        $this->id_forma_pagamento = $id_forma_pagamento;
    }

    public function setDataPagamento($data_pagamento) {
        $this->data_pagamento = $data_pagamento;
    }

    public function setEnviado($enviado) {
        $this->enviado = $enviado;
    }

    public function setIdFormaEnvio($id_forma_envio) {
        $this->id_forma_envio = $id_forma_envio;
    }

    public function setDataEnvio($data_envio) {
        $this->data_envio = $data_envio;
    }

}
