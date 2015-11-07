<?php

class Admin {

    private $idAdmin = null;
    private $email = null;
    private $senha = null;

    public function __construct() {
        
    }

    public function getIdAdmin() {
        return $this->idAdmin;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setIdAdmin($idAdmin) {
        $this->idAdmin = $idAdmin;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

}
