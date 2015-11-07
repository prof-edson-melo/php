<?php

// Se o caminho não existir, sai
if (!defined('ABSPATH')) {
    exit;
}

// Includes necessários para a aplicação
require_once ABSPATH . '/biblioteca/global-functions.php';
require_once ABSPATH . '/biblioteca/Conexao.php';
require_once ABSPATH . '/biblioteca/Request.php';
require_once ABSPATH . '/biblioteca/Visao.php';
require_once ABSPATH . '/biblioteca/Controle.php';
require_once ABSPATH . '/biblioteca/WSCorreios.php';
require_once ABSPATH . '/biblioteca/WSCepEndereco.php';
require_once ABSPATH . '/biblioteca/Frete.php';
require_once ABSPATH . '/biblioteca/LoaderClasses.php';

# inicializa a sessão
session_start();

# cria a sessão para o visitante
$_SESSION['visitante'] = session_id();

# cria um cookie para salvar a navegação
setcookie('visitante_loja', $_SESSION['visitante']);

$controle = Request::get('controle');
$acao = Request::get('acao');

if ($controle == '') {
    # agora definimos um controle padrão
    # quando nenhum controle for informado
    $controle = "Home";
}

# verifica se o arquivo de controle existe na pasta controle
if (file_exists("controles/{$controle}Controle.php")) {
    require_once "controles/{$controle}Controle.php";
} else {
    die("O controle <strong>{$controle}</strong> 
        não existe na pasta controle do MVC");
}

# adiciona a terminação Controle
# ao nome do controle
$controle .= 'Controle';

# instancia o controle
$controle = new $controle();

# agora,verificamos de a ação foi informada
if ($acao == "") {
    # se não informamos a ação
    # usamos o método padrão index
    $acao = 'index';
}

# verifica se o método existe no objeto controle
if (method_exists($controle, $acao)) {
    # se existir, executa o método
    $controle->$acao();
} else {
    # se não existir, emite uma mensagem de erro
    die('Page not found!!!');
}
