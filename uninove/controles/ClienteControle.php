<?php

/**
 * Classe que controla as operações do cliente (CRUD)
 */
class ClienteControle extends Controle {

    public function index() {
        $this->visao->render('cliente/index');
    }

    /**
     * Realiza o cadastro de um cliente novo
     */
    public function novo() {

        $cliente = new Cliente();
        $cliente->setNome($_REQUEST['nome']);
        $cliente->setCpf($_REQUEST['cpf']);
        $cliente->setEmail($_REQUEST['email']);
        $cliente->setDddTelefone($_REQUEST['ddd_telefone']);
        $cliente->setTelefone($_REQUEST['telefone']);
        $cliente->setDddCelular($_REQUEST['ddd_celular']);
        $cliente->setCelular($_REQUEST['celular']);
        $cliente->setSenha($_REQUEST['senha']);
        $cliente->setDataCadastro(date('Y-m-d'));

        $this->modelo('ClienteDAO');
        $idCliente = $this->ClienteDAO->novo($cliente);

        $this->modelo('EnderecoDAO');
        $endereco = new Endereco();
        $endereco->setIdCliente($idCliente);
        $endereco->setNumero($_REQUEST['numero']);
        $endereco->setComplemento($_REQUEST['complemento']);
        $endereco->setCepOrigem($_REQUEST['cep']);
        $endereco->setCepDestino($_REQUEST['cep']);
        $this->EnderecoDAO->inserir($endereco);

        $this->visao->render('cliente/mensagem_cadastro');
    }

    /**
     * Realiza a carga dos dados para a edição
     */
    public function editar() {
        
    }

    /**
     * Realiza a alteração dos dados de um cliente existente
     */
    public function atualizar() {
        
    }

    /**
     * Verifica o login do cliente no sistema
     */
    public function login() {

        /**
         * Cria a sessão para a navegação segura do cliente,
         * incluindo a sessão atual de 'visitante'
         */
        $cliente = new Cliente();
        $cliente->setEmail($_REQUEST['email']);
        $cliente->setSenha($_REQUEST['senha']);

        $this->modelo('ClienteDAO');
        $objCliente = $this->ClienteDAO->login($cliente);
        $_SESSION['cliente'] = serialize($objCliente);


        if (isset($_REQUEST['finalizar_compra'])) {
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
        } else {
            $this->visao->render('pedido/index');
        }
    }

    public function logout() {
        $_SESSION['cliente'] = null;
        unset($_SESSION['cliente']);

        $this->visao->render('cliente/index');
    }

}
