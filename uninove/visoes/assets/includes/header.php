<?php if (!defined('ABSPATH')) exit; ?>

<!doctype html>
<html class="no-js">
    <head>
        <meta charset="<?php echo(DB_CHARSET); ?>">
        <title><?php echo(DB_APP); ?></title>
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0">

        <!-- Tags para o SEO -->
        <meta name="robots" content="all">
        <meta itemprop="name" content="<?php echo(DB_APP); ?>">
        <meta itemprop="description" content="">
        <meta name="author" content="nome_do_aluno"> 
        <meta itemprop="image" content="http://">

        <!-- Estilos originais do framework Boostrap -->
        <link rel="stylesheet" href="visoes/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="visoes/assets/css/bootstrap-theme.css" media="screen" >
        <link rel="stylesheet" href="visoes/assets/css/font-awesome.min.css">

        <!-- Estilos personalizados -->
        <link rel="stylesheet" href="visoes/assets/css/main.css">

    </head>
    <body>
        <!-- A aplicação começa aqui -->
        <div class="container-fluid">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><?php echo(DB_APP); ?></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list" title="Sair" alt="Sair"></span>&nbsp;
                                    Categorias <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <!-- Lista das categorias no menu -->
                                    <?php
                                    // carga das categorias
                                    $objCategorias = new Categoria();
                                    $objCategorias = unserialize($_SESSION['categoriasMenu']);

                                    foreach ($objCategorias as $categoria) {
                                        $categorias = "<li><a href=\"?controle=produto&amp;acao=buscaCategoria&amp;idCategoria={$categoria->getIdCategoria()}\">";
                                        $categorias.= $categoria->getDescricaoCategoria();
                                        $categorias.= "</a></li>";
                                        echo $categorias;
                                    }
                                    ?>
                                    <!-- Fim da lista de categorias do menu -->
                                </ul>
                            </li>
                        </ul>

                        <form class="navbar-form navbar-right" role="search" action="?controle=produto&acao=pesquisa" method="post">
                            <div class="form-group">
                                <input type="text" name="termo" class="form-control" placeholder="Digite o que procura...">
                            </div>
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                                Buscar
                            </button>
                        </form>

                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="?controle=carrinho&acao=show">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> 
                                    Carrinho</a></li>
                                    <li><a href="?controle=FinalizaCompra"><span class="glyphicon glyphicon-usd"></span>&nbspFinalizar compra</a></li>
                            <?php
                            if (isset($_SESSION['cliente'])) {
                                ?>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                        <strong><?php echo $_SESSION['nome_cliente']; ?></strong>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="?controle=Pedidos&amp;acao=lista&amp;id_cliente=<?php echo $_SESSION['id_cliente']; ?>"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Meus pedidos</a></li>
                                        <li><a href="?controle=Cliente&amp;acao=logout"><span class="glyphicon glyphicon-log-out" title="Sair" alt="Sair"></span>&nbsp;&nbsp;Sair</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a href="?controle=Cliente">Login&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li>

                            <?php } ?>

                        </ul>
                    </div><!-- /.navbar-collapse -->

                </div>
            </nav>
            <!-- Menu lateral esquerdo -->
            <div class="row">
                <div class="col-md-2 hidden-xs hidden-sm">
                    <ul class="nav nav-pills nav-stacked">

                        <?php
                        // monta o menu lateral das categorias
                        $objMenuLateral = new Categoria();
                        $objMenuLateral = unserialize($_SESSION['categoriasMenu']);

                        // monta o submenu para as subcategorias
                        //$objSubMenuLateral = new Categorias();
                        $objSubMenuLateral = unserialize($_SESSION['categoriasLateral']);

                        foreach ($objMenuLateral as $menu) {
                            $categoria = "<li class=\"active\"><a href=\"?controle=produto&acao=buscaCategoria&idCategoria={$menu->getIdCategoria()}\">";
                            $categoria.= $menu->getDescricaoCategoria();
                            $categoria.= "</a></li>";
                            echo $categoria;

                            // Mostra as subcategorias
                            foreach ($objSubMenuLateral as $subMenu) {
                                if ($subMenu->getIdCategoria() == $menu->getIdCategoria()) {
                                    $subCategoria = "<li><a href=\"?controle=produto&acao=buscaSubCategoria&idSubCategoria={$subMenu->getIdSubCategoria()}\">";
                                    $subCategoria.= $subMenu->getDescricaoSubCategoria();
                                    $subCategoria.= "</a></li>";
                                    echo $subCategoria;
                                }
                            }
                        }
                        ?>    
                        <!-- Fim das categorias -->
                    </ul>
                </div>
                <!-- Fim do Menu lateral esquerdo -->
