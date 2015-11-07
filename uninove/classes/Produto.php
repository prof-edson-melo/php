<?php

/**
 * DTO (Data Transfer Object) produto para ser utilizada com o ProdutoDAO
 */
class Produto {

    private $id_produto = null;
    private $id_pedido = null;
    private $id_subcategoria = null;
    private $titulo = null;
    private $resumo = null;
    private $descricao_produto = null;
    private $ano = null;
    private $editora = null;
    private $edicao = null;
    private $issn = null;
    private $autores = null;
    private $paginas = null;
    private $imagem = null;
    private $oferta = null;
    private $valor = null;
    private $quantidade = null;
    private $desconto = null;
    private $peso = null;
    private $largura = null;
    private $altura = null;
    private $comprimento = null;
    private $id_administrador = null;

    public function __construct() {
        
    }

    public function getIdProduto() {
        return $this->id_produto;
    }

    public function getIdSubcategoria() {
        return $this->id_subcategoria;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescricaoProduto() {
        return $this->descricao_produto;
    }

    public function getResumo() {
        return $this->resumo;
    }

    public function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getEditora() {
        return $this->editora;
    }

    public function getEdicao() {
        return $this->edicao;
    }

    public function getIssn() {
        return $this->issn;
    }

    public function getAutores() {
        return $this->autores;
    }

    public function getPaginas() {
        return $this->paginas;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getOferta() {
        return $this->oferta;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getDesconto() {
        return $this->desconto;
    }

    public function setIdProduto($id_produto) {
        $this->id_produto = $id_produto;
    }

    public function setIdSubcategoria($id_subcategoria) {
        $this->id_subcategoria = $id_subcategoria;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDescricaoProduto($descricao_produto) {
        $this->descricao_produto = $descricao_produto;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function setEditora($editora) {
        $this->editora = $editora;
    }

    public function setEdicao($edicao) {
        $this->edicao = $edicao;
    }

    public function setIssn($issn) {
        $this->issn = $issn;
    }

    public function setAutores($autores) {
        $this->autores = $autores;
    }

    public function setPaginas($paginas) {
        $this->paginas = $paginas;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function setOferta($oferta) {
        $this->oferta = $oferta;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setDesconto($desconto) {
        $this->desconto = $desconto;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getLargura() {
        return $this->largura;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getComprimento() {
        return $this->comprimento;
    }

    public function getIdAdministrador() {
        return $this->id_administrador;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setLargura($largura) {
        $this->largura = $largura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function setComprimento($comprimento) {
        $this->comprimento = $comprimento;
    }

    public function setIdAdministrador($id_administrador) {
        $this->id_administrador = $id_administrador;
    }

    public function getIdPedido() {
        return $this->id_pedido;
    }

    public function setIdPedido($id_pedido) {
        $this->id_pedido = $id_pedido;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

}
