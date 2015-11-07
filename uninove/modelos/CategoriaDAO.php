<?php

/**
 * Model para a categoria
 */
class CategoriaDAO extends Conexao {

    public $conexao = null;

    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }

    /**
     * Carrega as categorias da barra de menu
     * @return \Categoria
     */
    public function menuCategoriasSuperior() {
        $query = "SELECT * FROM categorias "
                . "ORDER BY descricao_categoria ASC";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        
        $rs_categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $objCategorias = array();

        foreach ($rs_categorias as $rs) {
            $p = new Categoria();
            $p->setIdCategoria($rs['id_categoria']);
            $p->setDescricaoCategoria($rs['descricao_categoria']);

            $objCategorias[] = $p;
        }
        return $objCategorias;
    }
    /**
     * Carrega as categorias do menu lateral
     * @return \Categoria
     */
    public function subCategorias() {
        $query = "SELECT * FROM subcategorias ORDER BY descricao_subcategoria ASC;";

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        
        $rs_categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objCategorias = array();

        foreach ($rs_categorias as $rs) {
            $c = new Categoria();
            $c->setIdCategoria($rs['id_categoria']);
            $c->setIdSubCategoria($rs['id_subcategoria']);
            $c->setDescricaoSubCategoria($rs['descricao_subcategoria']);

            $objCategorias[] = $c;
        }
        return $objCategorias;
    }
    /**
     * Carrega as categorias do menu lateral
     * @return \Categoria
     */
    public function menuCategoriasLateral() {
        $query = "SELECT categorias.id_categoria, "
                . "categorias.descricao_categoria, "
                . "subcategorias.id_subcategoria, "
                . "descricao_subcategoria "
                . "FROM categorias "
                . "INNER JOIN subcategorias "
                . "ON categorias.id_categoria = subcategorias.id_categoria "
                . "ORDER BY descricao_subcategoria ASC;";

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        
        $rs_categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objCategorias = array();

        foreach ($rs_categorias as $rs) {
            $c = new Categoria();
            $c->setIdCategoria($rs['id_categoria']);
            $c->setIdSubCategoria($rs['id_subcategoria']);
            $c->setDescricaoSubCategoria($rs['descricao_subcategoria']);

            $objCategorias[] = $c;
        }
        return $objCategorias;
    }

    /**
     * Método criado para listar os usuários
     * existentes na tabela de usuários do
     * banco de dados.
     */
    public function categoria($idCategoria) {
        $query = "
            select subcategorias.id_subcategoria,
            subcategorias.descricao_subcategoria, categorias.id_categoria, categorias.descricao_categoria
            FROM categorias
            INNER JOIN subcategorias
            ON subcategorias.id_categoria = categorias.id_categoria
            WHERE categorias.id_categoria = {$idCategoria}
            GROUP BY subcategorias.descricao_subcategoria";
            
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        
        $rs_categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objCategoria = array();

        foreach ($rs_categoria as $rs) {
            $c = new Categoria();
            $c->setIdCategoria($rs['id_categoria']);
            $c->setIdSubCategoria($rs['id_subcategoria']);
            $c->setDescricaoCategoria($rs['descricao_categoria']);
            $objCategoria[] = $c;
        }
        return $objCategoria;
    }

    /**
     * Carrega as subcategorias
     * @param type $idSubCategoria
     * @return \subCategoria
     */
    public function subCategoria($idSubCategoria) {
        $query = "SELECT subcategorias.id_subcategoria, "
                . "subcategorias.descricao_subcategoria, "
                . "categorias.id_categoria, "
                . "categorias.descricao_categoria "
                . "FROM categorias "
                . "INNER JOIN subcategorias "
                . "ON subcategorias.id_categoria = categorias.id_categoria "
                . "WHERE subcategorias.id_subcategoria = :id_subcategoria "
                . "GROUP BY subcategorias.descricao_subcategoria";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":id_subcategoria", $idSubCategoria, PDO::PARAM_STR);
        $stmt->execute();
        
        $rs_categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objCategoria = array();

        foreach ($rs_categoria as $rs) {
            $c = new Categoria();
            $c->setIdCategoria($rs['id_categoria']);
            $c->setIdSubCategoria($idSubCategoria);
            $c->setDescricaoCategoria($rs['descricao_categoria']);
            $c->setDescricaoSubCategoria($rs['descricao_subcategoria']);
            $objCategoria[] = $c;
        }
        return $objCategoria;
    }

    /**
     * C(R)UD categorias
     */
    public function inserir() {
        
    }

    public function alterar() {
        
    }

    public function excluir() {
        
    }

}
