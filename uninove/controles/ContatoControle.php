<?php

class ContatoControle extends Controle {

    public function index() {
        $this->visao->render('contato/index');
    }

    public function envia(){
        // implementar o envio
        $this->visao->render('contato/mensagem');
    }
}
