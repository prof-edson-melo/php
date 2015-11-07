<?php

/**
 * Model para o carrinho de compras
 */
class AdminDAO extends Conexao {

    public $conexao = null;

    public function __construct() {
        $this->conexao = Conexao::getConnection();
    }

    public function login(Admin $admin) {
        $query = "SELECT * FROM administradores WHERE usuario = :email AND senha = :senha";

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(":email", $admin->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(":senha", $admin->getSenha(), PDO::PARAM_STR);
        $stmt->execute();

        $rs_admin = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objAdmin = array();

        foreach ($rs_admin as $rs) {
            $admin = new Admin();
            
            $admin->setIdAdmin($rs['id_administrador']);
            $_SESSION['id_admin'] = $rs['id_administrador'];
            $_SESSION['email_admin'] = $rs['usuario'];
        }

        return $objAdmin;
    }

    public function cadastroProdutos(Produtos $produtos){
        
    }
}
