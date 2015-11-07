<?php

class PedidosControle extends Controle {

    public function index() {
        $this->visao->render('cliente/index');
    }

    public function lista() {
        $pedidos = new Pedido();
        $pedidos->setIdcliente($_REQUEST['id_cliente']);

        $this->modelo('PedidoDAO');
        $objPedidos = $this->PedidoDAO->lista($pedidos);
        $_SESSION['pedidos_cliente'] = serialize($objPedidos);

        $this->visao->render('pedido/index');
    }

    public function detalhes(){
        $detalhes = new PedidosDetalhes();
        $detalhes->setIdPedido($_REQUEST['id_pedido']);
        
        $this->modelo('PedidoDAO');
        $objDetalhes = $this->PedidoDAO->detalhes($detalhes);
        $_SESSION['pedido_detalhes'] = serialize($objDetalhes);
        
        $this->visao->render('pedido/detalhes');
        
    }
}
