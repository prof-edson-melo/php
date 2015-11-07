<?php

class WSCepEndereco {

    private $cep;
    private $url = 'http://republicavirtual.com.br/web_cep.php?cep=';
    private $tipoLogradouro = null;
    private $logradouro = null;
    private $bairro = null;
    private $cidade = null;
    private $estado = null;

    public function getCep() {
        return $this->cep;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTipoLogradouro() {
        return $this->tipoLogradouro;
    }

    public function getLogradouro() {
        return $this->logradouro;
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

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setTipoLogradouro($tipoLogradouro) {
        $this->tipoLogradouro = $tipoLogradouro;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
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

    public function getEndereco() {
        $this->resultado = @file_get_contents($this->url . urlencode($this->cep) . '&formato=query_string');
        if (!$this->resultado) {
            $this->resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";
        }
        parse_str($this->resultado, $this->retorno);

        $this->tipoLogradouro = $this->retorno['tipo_logradouro'];
        $this->logradouro = $this->retorno['logradouro'];
        $this->bairro = $this->retorno['bairro'];
        $this->cidade = $this->retorno['cidade'];
        $this->estado = $this->retorno['uf'];
    }

}
