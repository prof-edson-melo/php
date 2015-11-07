<?php

/**
 * DTO (Data Transfer Object) cliente para o model ClienteDAO
 */
class Cliente extends Endereco{

    private $id_cliente = null;
    private $login = null;
    private $senha = null;
    private $nome = null;
    private $cpf = null;
    private $endereco = null;
    private $bairro = null;
    private $cidade = null;
    private $estado = null;
    private $email = null;
    private $ddd_telefone = null;
    private $telefone = null;
    private $ddd_celular = null;
    private $celular = null;
    private $data_cadastro = null;

    public function __construct() {
        
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDddTelefone() {
        return $this->ddd_telefone;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getDddCelular() {
        return $this->ddd_celular;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getDataCadastro() {
        return $this->data_cadastro;
    }

    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDddTelefone($ddd_telefone) {
        $this->ddd_telefone = $ddd_telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setDddCelular($ddd_celular) {
        $this->ddd_celular = $ddd_celular;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function setDataCadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }
    
    public function getEndereco() {
        return $this->endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }



}
