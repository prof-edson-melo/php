<?php

class FinalizaCompraControle extends Controle {

    public function index() {
        $carrinho = new Carrinho();
        $carrinho->setSession($_SESSION['visitante']);

        /**
         * Carrega os dados do modelo
         */
        $this->modelo('CarrinhoDAO');
        $objCarrinho = array();
        $objCarrinho = $this->CarrinhoDAO->show($carrinho);
        $this->visao->bind('objCarrinho', $objCarrinho);

        $carrinho = new Carrinho();
        $carrinho->setSession($_SESSION['visitante']);

        $this->visao->render('finalizar_compra/index');
    }

    public function frete() {
        $frete = new Frete($_REQUEST['servico'], $_REQUEST['cepOrigem'], $_REQUEST['cepDestino']);
        $frete->calculaFrete();
        $_SESSION['frete'] = $frete->getValor();

        $carrinho = new Carrinho();
        $carrinho->setSession($_SESSION['visitante']);

        /**
         * Carrega os dados do modelo
         */
        $this->modelo('CarrinhoDAO');
        $objCarrinho = array();
        $objCarrinho = $this->CarrinhoDAO->show($carrinho);
        $this->visao->bind('objCarrinho', $objCarrinho);

        $this->visao->render('finalizar_compra/index');
    }

    public function fecharCompra() {

        /**
         * Grava o pedido
         */
        $this->modelo('PedidoDAO');
        $pedido = new Pedido();
        $pedido->setIdcliente($_REQUEST['id_cliente']);
        $pedido->setDataPedido(date('Y-m-d'));
        $idPedido = $this->PedidoDAO->novo($pedido);

        /**
         * Grava os produtos pedidos
         */
        $this->modelo('ProdutosPedidosDAO');
        foreach ($_SESSION['produtos_compra'] as $valor) {
            $p = new ProdutosPedidos();
            $p->setIdPedido($idPedido);
            $p->setIdProduto($valor['id_produto']);
            $p->setQuantidade($valor['qtd_produto']);
            $p->setValorUnitario($valor['valor']);
            $objProdutos = $this->ProdutosPedidosDAO->novo($p);
        }

        /**
         * Grava a venda
         */
        $total_venda = $_SESSION['frete'] + $_SESSION['produtos_total'];
        $this->modelo('VendaDAO');
        $venda = new Venda();

        $venda->setIdPedido($idPedido);
        $venda->setIdEnderecoEnvio(4);
        $venda->setValor($total_venda);
        $venda->setPago(0);
        $venda->setIdFormaPagamento(1);
        $venda->setEnviado(0);
        $venda->setIdFormaEnvio(1);
        
        $objVenda = $this->VendaDAO->fechaVenda($venda);
        /**
         * Remove os itens do carrinho
         */
        
        $this->modelo('CarrinhoDAO');
        $carrinho = new Carrinho();
        $carrinho->setSession($_SESSION['visitante']);
        $objCarrinho = $this->CarrinhoDAO->limpaVenda($carrinho);
        
        /**
         * Limpa as sessões
         */
        
        $_SESSION['frete'] = null;
        unset($_SESSION['frete']);
        
        $_SESSION['produtos_total'] = null;
        unset($_SESSION['produtos_total']);
        
        /**
         * Redireciona para a página de pedidos realizados do cliente
         */
        
        $this->visao->render('cliente/index');
    }

}
