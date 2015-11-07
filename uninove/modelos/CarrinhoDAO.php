<?php

/**
 * Model para o carrinho de compras
 */
class CarrinhoDAO extends Conexao {

    public $conexao = null;

    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }

    /**
     * Realiza a inclusão do produto no carrinho
     * @param Carrinho $carrinho
     */
    public function inserir(Carrinho $carrinho) {
        $query = "INSERT INTO carrinho "
                . "(id_produto, qtd_produto, session) "
                . "VALUES "
                . "(:id_produto, :qtd_produto, :session)";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":id_produto", $carrinho->getIdProduto());
        $stmt->bindValue(":qtd_produto", $carrinho->getQtdProduto());
        $stmt->bindValue(":session", $carrinho->getSession());
        $stmt->execute();
    }

    /**
     * Altera a quantidade de um produto no carrinho
     * @param type $session
     * @todo pegar o produto a ser alterado
     */
    public function alterar($session) {
        $query = "UPDATE carrinho SET "
                . "qtd_produto = :qtd_produto "
                . "WHERE session = :session)";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":qtd_produto", $carrinho->getQuantidadeProduto());
        $stmt->bindValue(":session", $carrinho->getSession());
        $stmt->execute();
    }

    /**
     * Remove um produto do carrinho
     * @param Carrinho $carrinho
     */
    public function excluir(Carrinho $carrinho) {
        $query = "DELETE FROM carrinho "
                . "WHERE id_carrinho = :id_carrinho";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":id_carrinho", $carrinho->getIdCarrinho());
        $stmt->execute();
    }

 /**
     * Remove um produto do carrinho
     * @param Carrinho $carrinho
     */
    public function limpaVenda(Carrinho $carrinho) {
        $query = "DELETE FROM carrinho "
                . "WHERE session = :session";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":session", $carrinho->getSession());
        $stmt->execute();
    }    
    
    /**
     * Verifica se um produto já está no carrinho
     * @param Carrinho $carrinho
     * @return int
     */
    public function verificaProduto(Carrinho $carrinho) {
        $query = "SELECT count(*) as total "
                . "FROM carrinho "
                . "WHERE id_produto = :id_produto "
                . "AND session = :session";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":id_produto", $carrinho->getIdProduto());
        $stmt->bindValue(":session", $carrinho->getSession());
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }

    public function show(Carrinho $carrinho) {
        $query = "SELECT carrinho.*, produtos.* "
                . "FROM carrinho "
                . "INNER JOIN produtos "
                . "ON carrinho.id_produto = produtos.id_produto "
                . "WHERE carrinho.session = :session";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":session", $carrinho->getSession(), PDO::PARAM_STR);
        $stmt->execute();

        return $rs_carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
