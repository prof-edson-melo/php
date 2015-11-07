<?php

/**
 * Classe que controla as operações do carrinho
 */
class CarrinhoControle extends Controle {

    /**
     * Método executado se nada for informado
     */
    public function index() {
        $this->visao->render('produtos/index');
    }

    /**
     * Método que inclui um produto no carrinho
     */
    public function incluir() {
        /**
         * Verifica se foi informado um valor maior que 1 produto
         */
        $quantidade = 1;
        if (isset($_REQUEST['quantidade'])) {
            $quantidade = $_REQUEST['quantidade'];
        }

        /**
         * Carrega os dados do modelo
         */
        $carrinho = new Carrinho();
        $carrinho->setIdProduto($_REQUEST['idProduto']);
        $carrinho->setQtdProduto($quantidade);
        $carrinho->setSession($_SESSION['visitante']);

        $this->modelo('CarrinhoDAO');
        /**
         * Verifica se o produto já foi adicionado ao carrinho
         */
        if (intval($this->CarrinhoDAO->verificaProduto($carrinho)) > 0) {
            /**
             * A ser implementado na view do carrinho
             */
            $_SESSION['alertaCarrinho'] = 'Produto já adicionado!';
        } else {
            $objProduto = $this->CarrinhoDAO->inserir($carrinho);
        }
        /**
         * Invoca o método para exibir o carrinho
         */
        $this->show();
    }

    /**
     * Apresenta todos os produtos contidos no carrinho
     */
    public function show() {
        $carrinho = new Carrinho();
        $carrinho->setSession($_SESSION['visitante']);

        /**
         * Carrega os dados do modelo
         */
        $this->modelo('CarrinhoDAO');
        $objCarrinho = array();
        $objCarrinho = $this->CarrinhoDAO->show($carrinho);
        $this->visao->bind('objCarrinho', $objCarrinho);

        $this->visao->render('carrinho/index');
    }

    /**
     * Remove um intem selecionado no carrinho
     */
    public function remover() {
        $carrinho = new Carrinho();
        $carrinho->setIdCarrinho($_REQUEST['remover']);
        $carrinho->setSession($_SESSION['visitante']);

        /**
         * Realiza a exclusão
         */
        $this->modelo('CarrinhoDAO');
        $objCarrinho = $this->CarrinhoDAO->excluir($carrinho);

        /**
         * Executa o método que atualiza o carrinho
         */
        $this->show();
    }

}
