<?php

/**
 * Model para o produto
 */
class ProdutoDAO extends Conexao {

    public $conexao = null;

    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }

    /**
     * Realiza a pesquisa para um termo informado
     * @param type $termo
     * @return \Produto
     */
    public function pesquisar($termo) {
        $query = "SELECT * FROM produtos "
                . "WHERE titulo "
                . "like :termo OR descricao_produto like :termo";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":termo", '%' . $termo . '%', PDO::PARAM_STR);
        $stmt->execute();

        $rs_produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objProdutos = array();

        foreach ($rs_produtos as $rs) {
            $p = new Produto();
            $p->setIdProduto($rs['id_produto']);
            $p->setIdSubcategoria($rs['id_subcategoria']);
            $p->setTitulo($rs['titulo']);
            $p->setDescricaoProduto($rs['descricao_produto']);
            $p->setAutores($rs['autores']);
            $p->setValor($rs['valor']);
            $p->setDesconto($rs['desconto']);
            $p->setImagem($rs['imagem']);
            $objProdutos[] = $p;
        }
        return $objProdutos;
    }

    /**
     * Lista as ofertas na página incial
     * @param type $quantidade_registros
     * @return \Produto
     */
    public function listarOferta($quantidade_registros) {
        $query = "SELECT * FROM produtos "
                . "WHERE oferta = 1 LIMIT :quantidade_registros";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":quantidade_registros", $quantidade_registros, PDO::PARAM_INT);
        $stmt->execute();
        
        $rs_produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objProdutos = array();
        
        foreach ($rs_produtos as $rs) {
            $p = new Produto();
            $p->setIdProduto($rs['id_produto']);
            $p->setIdSubcategoria($rs['id_subcategoria']);
            $p->setTitulo($rs['titulo']);
            $p->setDescricaoProduto($rs['descricao_produto']);
            $p->setAutores($rs['autores']);
            $p->setValor($rs['valor']);
            $p->setDesconto($rs['desconto']);
            $p->setImagem($rs['imagem']);
            $objProdutos[] = $p;
        }
        return $objProdutos;
    }

    /**
     * Lista os produtos por categoria
     * @param type $idCategoria
     * @return \Produto
     */
    public function listarPorCategoria($idCategoria) {
        $query = "SELECT produtos.*, categorias.* FROM produtos
        INNER JOIN subcategorias
        ON produtos.id_subcategoria = subcategorias.id_subcategoria
        INNER JOIN categorias ON categorias.id_categoria = subcategorias.id_categoria
        WHERE subcategorias.id_categoria = :idCategoria";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":idCategoria", $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        
        $rs_produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objProdutos = array();

        foreach ($rs_produtos as $rs) {
            $p = new Produto();
            $p->setIdProduto($rs['id_produto']);
            $p->setTitulo($rs['titulo']);
            $p->setDescricaoProduto($rs['descricao_produto']);
            $p->setIdSubcategoria($rs['id_subcategoria']);
            $p->setAutores($rs['autores']);
            $p->setValor($rs['valor']);
            $p->setDesconto($rs['desconto']);
            $p->setImagem($rs['imagem']);

            $objProdutos[] = $p;
        }
        return $objProdutos;
    }

    /**
     * Lista os produtos por subcategoria
     * @param type $idSubCategoria
     * @return \Produto
     */
    public function listarPorSubCategoria($idSubCategoria) {
        $query = "SELECT produtos.*, categorias.* FROM produtos
        INNER JOIN subcategorias
        ON produtos.id_subcategoria = subcategorias.id_subcategoria
        INNER JOIN categorias ON categorias.id_categoria = subcategorias.id_categoria
        WHERE subcategorias.id_subcategoria = :idSubCategoria";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":idSubCategoria", $idSubCategoria, PDO::PARAM_INT);
        $stmt->execute();
        
        $rs_produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objProdutos = array();

        foreach ($rs_produtos as $rs) {
            $p = new Produto();
            $p->setIdProduto($rs['id_produto']);
            $p->setTitulo($rs['titulo']);
            $p->setIdSubcategoria($rs['id_subcategoria']);
            $p->setDescricaoProduto($rs['descricao_produto']);
            $p->setAutores($rs['autores']);
            $p->setValor($rs['valor']);
            $p->setDesconto($rs['desconto']);
            $p->setImagem($rs['imagem']);

            $objProdutos[] = $p;
        }
        return $objProdutos;
    }

    /**
     * Lista os detalhes de um produt
     * @param type $idProduto
     * @return \Produto
     */
    public function detalhe($idProduto) {
        $query = "SELECT produtos.*, categorias.* FROM produtos
        INNER JOIN subcategorias
        ON produtos.id_subcategoria = subcategorias.id_subcategoria
        INNER JOIN categorias ON categorias.id_categoria = subcategorias.id_categoria
        WHERE produtos.id_produto = :idProduto";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":idProduto", $idProduto, PDO::PARAM_INT);
        $stmt->execute();
        
        $rs_produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objProduto = array();

        foreach ($rs_produto as $rs) {
            $p = new Produto();
            $p->setIdProduto($rs['id_produto']);
            $p->setTitulo($rs['titulo']);
            $p->setResumo($rs['resumo']);
            $p->setDescricaoProduto($rs['descricao_produto']);
            $p->setIdSubcategoria($rs['id_subcategoria']);
            $p->setAutores($rs['autores']);
            $p->setValor($rs['valor']);
            $p->setDesconto($rs['desconto']);
            $p->setImagem($rs['imagem']);

            $objProduto[] = $p;
        }
        return $objProduto;
    }

    // (C)RUD - Administrativo
    public function novo(Produto $produto) {
        $query = "INSERT INTO produtos ("
                . "id_subcategoria, titulo, resumo, descricao_produto, "
                . "ano, editora, edicao, issn, autores, paginas, imagem,"
                . "oferta, valor, desconto, id_administrador,"
                . "peso, largura, altura, comprimento)"
                . "VALUES ("
                . ":id_subcategoria, :titulo, :resumo, :descricao_produto, "
                . ":ano, :editora, :edicao, :issn, :autores, :paginas, :imagem,"
                . ":oferta, :valor, :desconto, :id_administrador,"
                . ":peso, :largura, :altura, :comprimento)";
        
        $stmt = $this->conexao->prepare($query);
        
        $stmt->bindValue(":id_subcategoria", $produto->getIdSubcategoria(), PDO::PARAM_INT);
        $stmt->bindValue(":titulo", $produto->getTitulo(), PDO::PARAM_STR);
        $stmt->bindValue(":resumo", $produto->getResumo(), PDO::PARAM_STR);
        $stmt->bindValue(":descricao_produto", $produto->getDescricaoProduto(), PDO::PARAM_STR);
        $stmt->bindValue(":ano", $produto->getAno(), PDO::PARAM_STR);
        $stmt->bindValue(":editora", $produto->getEditora(), PDO::PARAM_STR);
        $stmt->bindValue(":edicao", $produto->getEdicao(), PDO::PARAM_STR);
        $stmt->bindValue(":issn", $produto->getIssn(), PDO::PARAM_STR);
        $stmt->bindValue(":autores", $produto->getAutores(), PDO::PARAM_STR);
        $stmt->bindValue(":paginas", $produto->getPaginas(), PDO::PARAM_INT);
        $stmt->bindValue(":imagem", $produto->getImagem(), PDO::PARAM_STR);
        $stmt->bindValue(":oferta", $produto->getOferta(), PDO::PARAM_INT);
        $stmt->bindValue(":valor", $produto->getValor(), PDO::PARAM_STR);
        $stmt->bindValue(":desconto", $produto->getDesconto(), PDO::PARAM_STR);
        $stmt->bindValue(":id_administrador", $produto->getIdAdministrador(), PDO::PARAM_INT);
        $stmt->bindValue(":peso", 0, PDO::PARAM_STR);
        $stmt->bindValue(":largura", 0, PDO::PARAM_STR);
        $stmt->bindValue(":altura", 0, PDO::PARAM_STR);
        $stmt->bindValue(":comprimento", 0, PDO::PARAM_STR);
        
        $stmt->execute();
    }

    /**
     * Realiza a alteração de um produto pelo administrador
     */
    public function alterar() {
        // A ser implementado
    }

    /**
     * Realiza a exclusão de um produto pelo administrador
     */
    public function excluir() {
        // A ser implementado
    }

}
