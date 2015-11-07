<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>
<!-- Efetua o cálculo do frete -->
<script type="text/javascript" src="visoes/assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">

    $(function () {
        $("#frete").click(function () {
            $.ajax({
                type: 'POST', /* Tipo da requisição */
                url: 'utils/Frete.php', /* URL que será chamada */
                data: 'cep=' + $('#cep').val() + '&servico=' + $('#servico').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function (data) {
                    var markup = data.resultado;
                    $("#dados_frete").html(markup);
                }
            });
            return false;
        });
    });

</script>             

<!-- Detalhes do Produto -->
<div class="col-md-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <?php
                $categoria = new Categoria();
                $categoria = unserialize($_SESSION['subcategoria']);

                // Categoria do produto
                foreach ($categoria as $tituloCategoria) {
                    $strCategoria = ("{$tituloCategoria->getDescricaoCategoria()}");
                }

                // Subcategoria
                foreach ($categoria as $tituloSubCategoria) {
                    $strSubCategoria = ("{$tituloSubCategoria->getDescricaoSubCategoria()}");
                }

                // Destaque
                $subCategoria = unserialize($_SESSION['subcategoria']);
                foreach ($subCategoria as $tituloSubCategoria) {
                    $e = $tituloCategoria->getDescricaoCategoria();
                }
                ?>
                <ol class="breadcrumb">
                    <li><a href="index.php">Início</a></li>
                    <?php
                    if (!is_null($e)) {
                        echo "<li>"
                        . "<a href=\"?controle=produto&amp;acao=buscaCategoria"
                        . "&amp;idCategoria={$tituloCategoria->getIdCategoria()}\">{$strCategoria}</a>"
                        . "</li>"
                        . "<li><a href=\"?controle=produto&amp;acao=buscaSubCategoria"
                        . "&amp;idSubCategoria={$tituloSubCategoria->getIdSubCategoria()}\">{$strSubCategoria}</a>"
                        . "</li>";
                        echo "<li class=\"active\"><strong>Detalhe</strong></li>";
                    } else {
                        echo "<li class=\"active\"><strong>{$strCategoria}</strong></li>";
                    }
                    ?>
                </ol>
            </div>
        </div>
        <?php
        // Cria o objeto $objProdutos
        $objProdutos = new Produto();

        // Carrega o objeto $objProdutos
        $objProdutos = unserialize($_SESSION['produtos']);

        // Percorre o registro
        foreach ($objProdutos as $produto) {
            ?>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo(IMGPRODUTOS_ABSPATH) . '/' . $produto->getImagem(); ?>" 
                             title="<?php echo ($produto->getTitulo()); ?>" 
                             alt="<?php echo ($produto->getTitulo()); ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-md-8">
                    <h1><?php echo $produto->getTitulo(); ?></h1>
                    <p><?php echo ($produto->getResumo()); ?></p>
                    <p><?php echo ($produto->getAutores()); ?></p>
                    <p><small>De:<del>R$ <?php echo (moeda($produto->getValor())); ?></del></small></p>
                    <p>Por: <strong>R$ <?php echo (moeda($produto->getValor() * $produto->getDesconto())); ?></strong></p>
                    <br>
                    <form class="form-inline" role="form" name="carrinho" action="?controle=carrinho&acao=incluir" method="post">
                        <p><strong>Informe a quantidade</strong></p>
                        <div class="form-group">
                            <input type="text" class="form-control" id="quantidade" size="3" name="quantidade" value="1" placeholder="informe a quantidade">
                        </div>
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            Adicionar ao carrinho
                        </button>
                        <input type="hidden" name="idProduto" value="<?php echo $produto->getIdProduto(); ?>">
                    </form>
                    <br><br>

                    <!-- Calculo do frete -->
                    <p><strong>Calcular valor do frete</strong></p>
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
                            <select name="servico" id="servico" class="form-control dropdown">
                                <option value="41106">PAC</option>
                                <option value="40010">SEDEX</option>
                            </select>
                        </div>
                        <button class="btn btn-default" id="frete">
                            <span class="glyphicon glyphicon-repeat"></span>
                            Calcular
                        </button>
                    </form>
                    <br>
                    <!-- Apresenta o valor do frete -->
                    <span id="dados_frete"></span>
                </div>
            </div>
        <?php } ?>
        <br>
        <div class="row">
            <div class="col-xs-12">
                <h2>Descrição</h2>
                <p><?php echo $produto->getDescricaoProduto(); ?></p>
                <h2>Detalhes</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Peso</th>
                            <td>1kg</td>
                        </tr>
                        <tr>
                            <th>Largura</th>
                            <td>10cm</td>
                        </tr>
                        <tr>
                            <th>Altura</th>
                            <td>20cm</td>
                        </tr>
                        <tr>
                            <th>Comprimento</th>
                            <td>30cm</td>
                        </tr>
                    </table>
                </div>
                <h2>Opiniões dos clientes</h2>
                <p>Nenhuma opinião ainda para este produto.</p>
            </div>
        </div>

        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
