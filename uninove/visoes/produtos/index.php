<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>

<!-- Conteúdo da página principal -->
<div class="col-md-10">
    <div class="container-fluid">

        <!-- Produtos Breadcrumb-->
        <div class="row">
            <div class="col-xs-12">
                <?php
                $categoria = new Categoria();
                $categoria = unserialize($_SESSION['subcategoria']);

                foreach ($categoria as $tituloCategoria) {
                    $strCategoria = ("{$tituloCategoria->getDescricaoCategoria()}");
                }

                $subCategoria = unserialize($_SESSION['subcategoria']);
                foreach ($subCategoria as $tituloSubCategoria) {
                    $e = $tituloSubCategoria->getDescricaoSubCategoria();
                }
                ?>

                <ol class="breadcrumb">
                    <?php
                    if (isset($_SESSION['pesquisa'])) {
                        echo '<li class=\"active\>Resultado da pesquisa para o termo: <strong>' . $_SESSION['pesquisa'] . '</strong></li>';
                        unset($_SESSION['pesquisa']);
                    } else {
                        ?>
                        <li><a href="index.php">Início</a></li>
                        <?php
                        if (!is_null($e)) {
                            echo "<li><a href=\"?controle=produto&amp;acao=buscaCategoria&amp;idCategoria={$tituloCategoria->getIdCategoria()}\">{$strCategoria}</a></li>";
                            echo "<li class=\"active\"><strong>{$e}</strong></li>";
                        } else {
                            echo "<li class=\"active\"><strong>{$strCategoria}</strong></li>";
                        }
                    }
                    ?>
                </ol>
                <hr />
            </div>
        </div>
        <!-- Produtos -->
        <div class="row">
            <!-- Início da carga dos produtos -->
            <?php
            // cria o objeto $objProdutos
            $objProdutos = new Produto();

            // carrega o objeto $objProdutos
            $objProdutos = unserialize($_SESSION['produtos']);

            if (sizeof($objProdutos) == 0) {
                echo '<br><h2 class="text center">Não foram encontrados produtos com o termo pesquisado!</h2><br><br>';
            } else {

                // percorre os objetos e apresenta os resultados
                foreach ($objProdutos as $produto) {
                    ?>
                    <div class="col-xs-12 col-md-3">
                        <div class="thumbnail">
                            <?php
                            $subCategoria = unserialize($_SESSION['subcategoria']);
                            foreach ($subCategoria as $valor) {
                                
                            }
                            ?>
                            <a href="?controle=produto&acao=detalhes&idProduto=<?php echo ($produto->getIdProduto()); ?>&amp;idSubCategoria=<?php echo ($produto->getIdSubcategoria()); ?>">
                                <img src="<?php echo(IMGPRODUTOS_ABSPATH) . '/' . $produto->getImagem(); ?>" 
                                     title="<?php echo ($produto->getTitulo()); ?>" 
                                     alt="<?php echo ($produto->getTitulo()); ?>">
                            </a>
                            <?php //}  ?>
                            <div class="caption center">
                                <p><?php echo ($produto->getAutores()); ?></p>
                                <?php if ($produto->getDesconto() > 0) { ?>
                                    <p><small>De:<del>R$ <?php echo (moeda($produto->getValor())); ?></del></small></p>
                                    <p>Por: <strong>R$ <?php echo (moeda($produto->getValor() * $produto->getDesconto())); ?></strong></p>
                                <?php } else { ?>
                                    <p>Valor:R$ <?php echo (moeda($produto->getValor())); ?></small></p>
                                <?php } ?>
                                <p>
                                    <a href="?controle=carrinho&acao=incluir&idProduto=<?php echo ($produto->getIdProduto()); ?>" class="btn btn-success" role="button">
                                        <span class="glyphicon glyphicon-shopping-cart"></span>
                                        Adicionar ao carrinho
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <!-- Fim da carga dos produtos -->
        </div>
        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
