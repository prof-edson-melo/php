<?php

class VendaDAO extends Conexao {

    public $conexao = null;

    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }

    public function fechaVenda(Venda $venda) {
        $query = "INSERT INTO vendas ("
                . "id_pedido, "
                . "id_endereco_envio, "
                . "valor, "
                . "pago, "
                . "id_forma_pagamento, "
                . "enviado, "
                . "id_forma_envio "
                
                . ") VALUES ("
                
                . ":id_pedido, "
                . ":id_endereco_envio, "
                . ":valor, "
                . ":pago, "
                . ":id_forma_pagamento, "
                . ":enviado, "
                . ":id_forma_envio "
                . ")";

        $stmt = $this->conexao->prepare($query);
        
        $stmt->bindValue(":id_pedido", $venda->getIdPedido(), PDO::PARAM_INT);
        $stmt->bindValue(":id_endereco_envio", $venda->getIdEnderecoEnvio(), PDO::PARAM_INT);
        $stmt->bindValue(":valor", $venda->getValor(), PDO::PARAM_STR);
        $stmt->bindValue(":pago", $venda->getPago(), PDO::PARAM_INT);
        $stmt->bindValue(":id_forma_pagamento", $venda->getIdFormaPagamento(), PDO::PARAM_STR);
        //$stmt->bindValue(":data_pagamento", date('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(":enviado", $venda->getEnviado(), PDO::PARAM_INT);
        $stmt->bindValue(":id_forma_envio", $venda->getIdFormaEnvio(), PDO::PARAM_INT);
        //$stmt->bindValue(":data_envio", date('Y-m-d'), PDO::PARAM_STR);

        $stmt->execute();
    }

}
