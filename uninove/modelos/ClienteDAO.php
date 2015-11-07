<?php

/**
 * Model para o cliente
 */
class ClienteDAO extends Conexao {

    public $conexao = null;

    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }

    /**
     * Realiza o cadastro de um cliente novo
     * @param Cliente $cliente
     */
    public function novo(Cliente $cliente) {

        $query = "INSERT INTO clientes ("
                . "senha, nome, cpf, email, ddd_telefone, "
                . "telefone, ddd_celular, celular, data_cadastro) "
                . "VALUES (:senha, :nome, :cpf, :email, "
                . ":ddd_telefone, :telefone, :ddd_celular, :celular, :data_cadastro"
                . ")";

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(":senha", $cliente->getSenha(), PDO::PARAM_STR);
        $stmt->bindValue(":nome", $cliente->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(":cpf", $cliente->getCpf(), PDO::PARAM_STR);
        $stmt->bindValue(":email", $cliente->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(":ddd_telefone", $cliente->getDddTelefone(), PDO::PARAM_STR);
        $stmt->bindValue(":telefone", $cliente->getTelefone(), PDO::PARAM_STR);
        $stmt->bindValue(":ddd_celular", $cliente->getDddCelular(), PDO::PARAM_STR);
        $stmt->bindValue(":celular", $cliente->getCelular(), PDO::PARAM_STR);
        $stmt->bindValue(":data_cadastro", $cliente->getDataCadastro(), PDO::PARAM_STR);

        $stmt->execute();

        // pega o último id inserido
        return $this->conexao->LastInsertId();
    }

    /**
     * Realiza atualização dos dados do cliente
     * @param Cliente $cliente
     */
    public function atualizar(Cliente $cliente) {
        $query = "UPDATE clientes SET "
                . "nome = :nome, "
                . "email = :email, "
                . "ddd_telefone =:ddd_telefone, "
                . "telefone = :telefone, "
                . "ddd_celular = : ddd_celular, "
                . "celular = :celular "
                . "WHERE id_cliente = :id_cliente";

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(":nome", $cliente->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(":email", $cliente->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(":ddd_telefone", $cliente->getDddTelefone(), PDO::PARAM_STR);
        $stmt->bindValue(":telefone", $cliente->getTelefone(), PDO::PARAM_STR);
        $stmt->bindValue(":ddd_celular", $cliente->getDddCelular(), PDO::PARAM_STR);
        $stmt->bindValue(":celular", $cliente->getCelular(), PDO::PARAM_STR);

        $stmt->execute();
    }

    /**
     * Realiza a alteração do login e/ou senha
     */
    public function trocarSenha(Cliente $cliente) {
        $query = "UPDATE clientes SET "
                . "login = :login,"
                . "senha = :senha "
                . "WHERE id_cliente = :id_cliente";

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(":login", $cliente->getLogin(), PDO::PARAM_STR);
        $stmt->bindValue(":senha", $cliente->getSenha(), PDO::PARAM_STR);

        $stmt->execute();
    }

    /**
     * Verifica o login do cliente no sistema
     * @param Cliente $cliente
     */
    public function login(Cliente $cliente) {
        /**
         * Cria a sessão para a navegação segura do cliente,
         * incluindo a sessão atual de 'visitante'
         */
        $query = "SELECT clientes.*, enderecos.* FROM clientes INNER JOIN enderecos "
                . "ON enderecos.id_cliente = clientes.id_cliente "
                . "WHERE clientes.email = :email AND clientes.senha = :senha";

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(":email", $cliente->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(":senha", $cliente->getSenha(), PDO::PARAM_STR);
        $stmt->execute();

        $rs_cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objCliente = array();

        foreach ($rs_cliente as $rs) {
            $c = new Cliente();
            $endereco = new WSCepEndereco();
            $endereco->setCep($rs['cep_origem']);
            $endereco->getEndereco();

            $c->setIdCliente($rs['id_cliente']);
            $_SESSION['id_cliente'] = $rs['id_cliente'];
            $c->setNome($rs['nome']);
            $_SESSION['nome_cliente'] = $rs['nome'];
            $c->setCpf($rs['cpf']);
            $c->setCepOrigem($rs['cep_origem']);
            
            $frete = new Frete('41106', $rs['cep_origem'], $rs['cep_destino']);
            $frete->calculaFrete();
            $_SESSION['frete'] = $frete->getValor();

            $c->setEndereco($endereco->getTipoLogradouro() . ' ' . $endereco->getLogradouro());
            $c->setBairro($endereco->getBairro());
            $c->setCidade($endereco->getCidade());
            $c->setEstado($endereco->getEstado());

            $c->setEmail($rs['email']);
            $c->setNumero($rs['numero']);
            $c->setComplemento($rs['complemento']);

            $c->setDddTelefone($rs['ddd_telefone']);
            $c->setTelefone($rs['telefone']);
            $c->setDddCelular($rs['ddd_celular']);
            $c->setCelular($rs['celular']);

            $objCliente[] = $c;
        }

        return $objCliente; 
    }

    /**
     * Método para recuperação do login e da senha de acesso
     * @param Cliente $cliente
     * @todo A ser implementado
     */
    public function recuperaLoginSenha(Cliente $cliente) {
        
    }

}
