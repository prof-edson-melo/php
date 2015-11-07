<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>
<!-- Conteúdo da página principal -->
<div class="col-md-10">
    <div class="container-fluid">

        <!-- Imagens rotativas -->
        <div id="homeCarousel" class="carousel slide hidden-xs hidden-sm" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#homeCarousel" data-slide-to="1"></li>
                <li data-target="#homeCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Geração das imagens rotativas -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo(IMGPRODUTOS_ABSPATH); ?>/img_01.png" alt="Primeiro slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Cras justo odio, dapibus ac facilisis in.</h1>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo(IMGPRODUTOS_ABSPATH); ?>/img_02.jpg" alt="Segundo slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Donec id elit non mi porta gravida at eget.</h1>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo(IMGPRODUTOS_ABSPATH); ?>/img_03.jpg" alt="Terceiro slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Nullam id dolor id nibh ultricies vehicula ut id elit.</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim da geração das imagens rotativas -->

            <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div><!-- Fim das imagens rotativas -->

        <br />

        <!-- Produtos -->
        <div class="row">
            <!-- Início da carga dos produtos -->
            <?php
            // cria o objeto $objProdutos
            $objProdutos = new Produto();

            // carrega o objeto $objProdutos
            $objProdutos = unserialize($_SESSION['produtos']);

            // percorre os objetos e apresenta os resultados
            foreach ($objProdutos as $produto) {
                ?>
                <div class="col-xs-12 col-md-3">
                    <div class="thumbnail">
                        <a href="?controle=produto&acao=detalhes&amp;idProduto=<?php echo ($produto->getIdProduto()); ?>&amp;idSubCategoria=<?php echo ($produto->getIdSubcategoria()); ?>">
                            <img src="<?php echo(IMGPRODUTOS_ABSPATH) . '/' . $produto->getImagem(); ?>" 
                                 title="<?php echo ($produto->getTitulo()); ?>" 
                                 alt="<?php echo ($produto->getTitulo()); ?>">
                        </a>
                        <div class="caption center">
                            <p><?php echo ($produto->getAutores()); ?></p>
                            <p><small>De:<del>R$ <?php echo (moeda($produto->getValor())); ?></del></small></p>
                            <p>Por: <strong>R$ <?php echo (moeda($produto->getValor() * $produto->getDesconto())); ?></strong></p>
                            <p>
                                <a href="?controle=carrinho&acao=incluir&idProduto=<?php echo ($produto->getIdProduto()); ?>" class="btn btn-success" role="button">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    Adicionar ao carrinho
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
            <!-- Fim da carga dos produtos -->
        </div>
        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
