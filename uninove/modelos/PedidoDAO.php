<?php

class PedidoDAO extends Conexao {

    public $conexao = null;

    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }

    public function novo(Pedido $pedido) {
        $query = "INSERT INTO pedidos ("
                . "id_cliente, data_pedido) "
                . "VALUES "
                . "(:id_cliente, :data_pedido)";

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(":id_cliente", $pedido->getIdcliente(), PDO::PARAM_INT);
        $stmt->bindValue(":data_pedido", $pedido->getDataPedido(), PDO::PARAM_STR);

        $stmt->execute();

        // pega o último id inserido
        return $this->conexao->LastInsertId();
    }

    public function lista(Pedido $pedido) {
        $query = "SELECT * FROM pedidos WHERE id_cliente = :id_cliente";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":id_cliente", $pedido->getIdcliente(), PDO::PARAM_STR);
        $stmt->execute();

        $rs_pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objPedidos = array();

        foreach ($rs_pedidos as $rs) {
            $c = new Pedido();
            $c->setIdPedido($rs['id_pedido']);
            $c->setDataPedido($rs['data_pedido']);

            $objPedidos[] = $c;
        }

        return $objPedidos;
    }

 public function listaTodos() {
        $query = "SELECT * FROM pedidos ORDER BY data_pedido DESC";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        $rs_pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objPedidos = array();

        foreach ($rs_pedidos as $rs) {
            $c = new Pedido();
            $c->setIdPedido($rs['id_pedido']);
            $c->setDataPedido($rs['data_pedido']);

            $objPedidos[] = $c;
        }

        return $objPedidos;
    }
    
    public function detalhes(PedidosDetalhes $pedidoDetalhes) {
        $query = "SELECT pedidos.id_pedido, produtos.titulo, pedidos.data_pedido, produtos_pedidos.quantidade, produtos_pedidos.valor_unitario, "
                . "formas_de_pagamento.descricao_forma_pagamento, formas_de_envio.descricao_forma_envio, enderecos.cep_origem, enderecos.cep_destino, enderecos.numero, enderecos.complemento FROM produtos INNER JOIN (formas_de_pagamento INNER JOIN (formas_de_envio INNER JOIN (enderecos INNER JOIN ((pedidos INNER JOIN produtos_pedidos ON pedidos.id_pedido = produtos_pedidos.id_pedido) INNER JOIN vendas ON pedidos.id_pedido = vendas.id_pedido) ON enderecos.id_endereco = vendas.id_endereco_envio) ON formas_de_envio.id_forma_envio = vendas.id_forma_envio) ON formas_de_pagamento.id_forma_pagamento = vendas.id_forma_pagamento) ON produtos.id_produto = produtos_pedidos.id_produto WHERE (((pedidos.id_pedido)=:id_pedido));";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":id_pedido", $pedidoDetalhes->getIdPedido(), PDO::PARAM_INT);
        $stmt->execute();

        $rs_detalhes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objPedidosDetalhes = array();

        foreach ($rs_detalhes as $rs) {
            $endereco = new WSCepEndereco();
            $endereco->setCep($rs['cep_origem']);
            $endereco->getEndereco();

            $c = new PedidosDetalhes();
            $c->setIdPedido($rs['id_pedido']);
            $c->setTitulo($rs['titulo']);
            $c->setQuantidade($rs['quantidade']);
            $c->setValor_unitario($rs['valor_unitario']);
            $c->setFormaPagamento($rs['descricao_forma_pagamento']);
            $c->setFormaEnvio($rs['descricao_forma_envio']);
            $c->setOrigem($rs['cep_origem']);
            $c->setData(formata_data($rs['data_pedido']));
            $c->setDestino($rs['cep_destino']);
            $c->setNumero($rs['numero']);
            $c->setComplemento($rs['complemento']);
            $c->setEndereco(utf8_encode($endereco->getTipoLogradouro() . ' ' . $endereco->getLogradouro() . ', ' . $rs['numero'] . ' ' .  $rs['complemento'] . ' ' . 
                    $endereco->getBairro() . ' - ' . $rs['cep_origem'] . ' - ' . $endereco->getCidade() . '/' . $endereco->getEstado()));

            $objPedidosDetalhes[] = $c;
        }

        return $objPedidosDetalhes;
    }

}
