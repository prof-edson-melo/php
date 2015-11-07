<?php

/**
 * Classe que controla as operações dos produtos
 */
class ProdutoControle extends Controle {

    /**
     * Método executado se nada for informado
     */
    public function index() {
        $this->visao->render('produtos/index');
    }

    /**
     * Carrega as categorias e os produtos
     */
    public function buscaCategoria() {
        /**
         * Carrega os produtos por categoria
         */
        $this->modelo('ProdutoDAO');
        $objProdutos = $this->ProdutoDAO->listarPorCategoria($_REQUEST['idCategoria']);
        $_SESSION['produtos'] = serialize($objProdutos);

        /**
         * Carrega as categorias
         */
        $this->modelo('CategoriaDAO');
        $objCategoria = $this->CategoriaDAO->categoria($_REQUEST['idCategoria']);
        $_SESSION['subcategoria'] = serialize($objCategoria);

        /**
         * Carrega a view correspondente
         */
        $this->visao->render('produtos/index');
    }

    /**
     * Carrega as subcategorias
     */
    public function buscaSubCategoria() {

        /**
         * Carrega os produtos por subcategoria
         */
        $this->modelo('ProdutoDAO');
        $objProdutos = $this->ProdutoDAO->listarPorSubCategoria($_REQUEST['idSubCategoria']);
        $_SESSION['produtos'] = serialize($objProdutos);

        /**
         * Carrega as subcategorias
         */
        $this->modelo('CategoriaDAO');
        $objCategoria = $this->CategoriaDAO->subCategoria($_REQUEST['idSubCategoria']);
        $_SESSION['subcategoria'] = serialize($objCategoria);

        /**
         * Carrega a view correspondente
         */
        $this->visao->render('produtos/index');
    }

    /**
     * Realiza a pesquisa de um valor informado nos campos
     * titulo e descricao do produto
     */
    public function pesquisa() {
        /**
         * Carrega os produtos, caso encontre
         */
        $this->modelo('ProdutoDAO');
        $objProdutos = $this->ProdutoDAO->pesquisar($_REQUEST['termo']);
        $_SESSION['produtos'] = serialize($objProdutos);
        $_SESSION['pesquisa'] = $_REQUEST['termo'];

        /**
         * Varrega a view de resposta
         */
        $this->visao->render('produtos/index');
    }

    /**
     * Exibe os detalhes de um produto selecionado
     */
    public function detalhes() {
        /**
         * Carrega o produto
         */
        $this->modelo('ProdutoDAO');
        $objProdutos = $this->ProdutoDAO->detalhe($_REQUEST['idProduto']);
        $_SESSION['produtos'] = serialize($objProdutos);

        /**
         * Carrega a categoria relativa para montar o breadcrumb
         */
        $this->modelo('CategoriaDAO');
        $objCategoria = $this->CategoriaDAO->subCategoria($_REQUEST['idSubCategoria']);
        $_SESSION['subcategoria'] = serialize($objCategoria);

        /**
         * Carrega a view correspondente
         */
        $this->visao->render('produtos/detalhes');
    }

    /**
     * Realiza a inclusão de um produto no sistema
     */
    public function inserir() {
        $produto = new Produto();
        $produto->setIdSubcategoria(1);
        $produto->setTitulo('Minicraft');
        $produto->setResumo('Resumo');
        $produto->setDescricaoProduto('Descrição');
        $produto->setAno('ano');
        $produto->setEditora('editora');
        $produto->setEdicao(1);
        $produto->setIssn('issn');
        $produto->setAutores('autores');
        $produto->setPaginas(330);
        $produto->setImagem('imagem');
        $produto->setOferta(1);
        $produto->setValor(218.50);
        $produto->setDesconto(0.80);
        $produto->setIdAdministrador(1);
        $produto->setPeso(0.5);
        $produto->setLargura(2.1);
        $produto->setAltura(2.1);
        $produto->setComprimento(3.4);
        
        /**
         * Carrega o modelo e faz a inclusão dos dados
         */
        $this->modelo('ProdutoDAO');
        $this->ProdutoDAO->novo($produto);
        
        /**
         * Carrega a view do administrador
         */
    }

}
