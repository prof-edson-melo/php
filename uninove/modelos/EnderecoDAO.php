<?php

/**
 * Model para o carrinho de compras
 */
class EnderecoDAO extends Conexao {

    public $conexao = null;

    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }

    /**
     * Realiza a inclusão do CEP
     * @param Endereco $endereco
     */
    public function inserir(Endereco $endereco) {
        $query = "INSERT INTO enderecos "
                . "(id_cliente, cep_origem, cep_destino, numero, complemento) "
                . "VALUES "
                . "(:id_cliente, :cep_origem, :cep_destino, :numero, :complemento)";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":id_cliente", $endereco->getIdCliente());
        $stmt->bindValue(":cep_origem", $endereco->getCepOrigem());
        $stmt->bindValue(":cep_destino", $endereco->getCepOrigem());
        $stmt->bindValue(":numero", $endereco->getNumero());
        $stmt->bindValue(":complemento", $endereco->getComplemento());
        $stmt->execute();
    }

    public function alterar(Endereco $endereco) {
        
    }

    public function excluir(Endereco $endereco) {
        
    }

}
