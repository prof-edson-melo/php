<?php

/**
 * DTO (Data Transfer Object) comentario para o model ComentarioDAO
 */
class Comentario {

    private $id_comentario = null;
    private $id_produto = null;
    private $comentario = null;
    private $avaliacao = null;

    public function __construct() {
        
    }

    public function getIdComentario() {
        return $this->id_comentario;
    }

    public function getIdProduto() {
        return $this->id_produto;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getAvaliacao() {
        return $this->avaliacao;
    }

    public function setIdComentario($id_comentario) {
        $this->id_comentario = $id_comentario;
    }

    public function setIdProduto($id_produto) {
        $this->id_produto = $id_produto;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }

}
