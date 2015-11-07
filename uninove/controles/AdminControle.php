<?php

class AdminControle extends Controle {

    public function index() {
        $this->visao->render('admin/index');
    }

    public function painel() {
        $this->visao->render('admin/painel');
    }
    
    public function login() {
        $this->modelo('AdminDAO');
        
        $admin = new Admin();
        $admin->setEmail($_REQUEST['email']);
        $admin->setSenha($_REQUEST['senha']);
        $objAdmin = $this->AdminDAO->login($admin);
        $this->visao->render('admin/painel');
    }
    
    public function cadastrarProdutos(){
        $this->modelo('CategoriaDAO');
        
        $categorias = $this->CategoriaDAO->menuCategoriasSuperior();
        $_SESSION['categorias'] = serialize($categorias);
        
        $subCategorias = $this->CategoriaDAO->subCategorias();
        $_SESSION['sub_categorias'] = serialize($subCategorias);
        
        
        $this->visao->render('admin/cadastro_produtos');
    }
    
    public function novo(){
        
        $this->modelo('ProdutoDAO');
        $produto = new Produto();
        
        $produto->setIdSubcategoria($_REQUEST['id_subcategoria']);
        $produto->setTitulo($_REQUEST['titulo']);
        $produto->setResumo($_REQUEST['resumo']);
        $produto->setDescricaoProduto($_REQUEST['descricao_produto']);
        $produto->setAno($_REQUEST['ano']);
        $produto->setEditora($_REQUEST['editora']);
        $produto->setEdicao($_REQUEST['edicao']);
        $produto->setIssn($_REQUEST['issn']);
        $produto->setAutores($_REQUEST['autor']);
        $produto->setPaginas($_REQUEST['paginas']);
        $produto->setImagem($_REQUEST['imagem']);
        $produto->setValor($_REQUEST['valor']);
        $produto->setDesconto($_REQUEST['desconto']);
        $produto->setIdAdministrador($_SESSION['id_admin']);
        
        $produto = $this->ProdutoDAO->novo($produto);
        $this->visao->render('admin/painel');
    }
    
    public function pedidos(){
        $this->modelo('PedidoDAO');
        $objPedidos = $this->PedidoDAO->listaTodos();
        $_SESSION['pedidos'] = serialize($objPedidos);

        $this->visao->render('admin/pedidos');
    }

}
