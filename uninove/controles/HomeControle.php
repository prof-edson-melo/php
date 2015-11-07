<?php

/**
 * Classe que controla a página inicial do sistema
 */
class HomeControle extends Controle {

    /**
     * Método executado se nada for informado
     */
    public function index() {

        /**
         * Carrega as categorias Menu Superior
         */
        $this->modelo('CategoriaDAO');
         $objCategoriasMenu = $this->CategoriaDAO->menuCategoriasSuperior();
        $_SESSION['categoriasMenu'] = serialize($objCategoriasMenu);

        /**
         * Carrega as categorias Menu Lateral
         */
        $this->modelo('CategoriaDAO');
         $objCategoriasLateral = $this->CategoriaDAO->menuCategoriasLateral();
        $_SESSION['categoriasLateral'] = serialize($objCategoriasLateral);
        
        /**
         * Carrega os produtos em oferta
         */
        $this->modelo('ProdutoDAO');
        $objProdutos = $this->ProdutoDAO->listarOferta(4);
        $_SESSION['produtos'] = serialize($objProdutos);

        /**
         * Carrega a view correspondente (index)
         */
        $this->visao->render('home/index');
    }

}
