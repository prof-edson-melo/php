<?php

/**
 * DTO (Data Transfer Object) categoria/subcategoria
 */
class Categoria {

    private $idCategoria = null;
    private $descricaoCategoria = null;
    private $idSubCategoria = null;
    private $descricaoSubCategoria = null;
    
    public function __construct() {
        
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getDescricaoCategoria() {
        return $this->descricaoCategoria;
    }

    public function getIdSubCategoria() {
        return $this->idSubCategoria;
    }

    public function getDescricaoSubCategoria() {
        return $this->descricaoSubCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function setDescricaoCategoria($descricaoCategoria) {
        $this->descricaoCategoria = $descricaoCategoria;
    }

    public function setIdSubCategoria($idSubCategoria) {
        $this->idSubCategoria = $idSubCategoria;
    }

    public function setDescricaoSubCategoria($descricaoSubCategoria) {
        $this->descricaoSubCategoria = $descricaoSubCategoria;
    }


}
