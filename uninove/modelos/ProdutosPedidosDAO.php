<?php

class ProdutosPedidosDAO extends Conexao {

    public $conexao = null;

    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }

    public function novo(ProdutosPedidos $produtos) {
        $query = "INSERT INTO produtos_pedidos ("
                . "id_produto, id_pedido, quantidade, valor_unitario) "
                . "VALUES "
                . "(:id_produto, "
                . ":id_pedido, "
                . ":quantidade, "
                . ":valor_unitario)";

        $stmt = $this->conexao->prepare($query);



        $stmt->bindValue(":id_produto", $produtos->getIdProduto(), PDO::PARAM_STR);
        $stmt->bindValue(":id_pedido", $produtos->getIdPedido(), PDO::PARAM_STR);
        $stmt->bindValue(":quantidade", $produtos->getQuantidade(), PDO::PARAM_STR);
        $stmt->bindValue(":valor_unitario", $produtos->getValorUnitario(), PDO::PARAM_STR);

        $stmt->execute();
        
        // pega o último id inserido
        return $this->conexao->LastInsertId();
    }

}
