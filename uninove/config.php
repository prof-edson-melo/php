<?php

// Caminho para a raiz
define('ABSPATH', dirname(__FILE__));

// Nome da aplicação
define('DB_APP', 'E-COMMERCE PHP MVC');

// Caminho para as imagens dos produtos
define('IMGPRODUTOS_ABSPATH', 'visoes/produtos/imagens');

// Caminho para a pasta de uploads
define('UP_ABSPATH', ABSPATH . 'visoes/uploads');

// URL da home
define('HOME_URI', 'http://localhost/uninove');

// Nome do host da base de dados
define('HOSTNAME', 'localhost');

// Banco de dados
define('DB_TYPE', 'mysql');

// Nome do DB
define('DB_NAME', 'ecommerce_php_mvc');

// Usuário do DB - modifique para seu usuário do banco
define('DB_USER', '');

// Senha do DB - modifique para sua senha do banco
define('DB_PASSWORD', '');

// Charset da conexão PDO
define('DB_CHARSET', 'utf8');

// Se você estiver desenvolvendo, modifique o valor para true
define('DEBUG', false);

// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/loader.php';
