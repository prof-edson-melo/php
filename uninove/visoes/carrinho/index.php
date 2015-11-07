<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>
<script type="text/javascript" src="visoes/assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">

    $(function () {
        $("#frete").click(function () {
            $.ajax({
            });
            return false;
        });
    });

</script> 
<!-- Conteúdo da página principal -->
<div class="col-md-10">
    <div class="container-fluid">
        <!-- Produtos -->
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Início</a></li>
                    <li class="active">Carrinho</li>
                </ol>

                <?php
                $totalCarrinho = 0;
                foreach ($objCarrinho as $item) {
                    $totalCarrinho = $item['id_produto'];
                }
                if ($totalCarrinho == 0) {
                    ?>

                <br><br><br>
                    <h1 class="text-center"> Ops! O carrinho está vazio!</h1>
                <?php } else { ?>
                    <h1>Lista dos produtos</h1>
                    <hr />
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th colspan="2">&nbsp;</th>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th class="text center">Quantidade</th>
                                <th>Total</th>
                            </tr>
                            <?php
                            $totalCarrinho = 0;
                            foreach ($objCarrinho as $item) {
                                /**
                                 * Verifica se um produto tem ou não desconto e soma os valores para totalizar
                                 */
                                $totalCarrinho += $item['valor'] * ($item['desconto'] > 0 ? $item['desconto'] : 1) * $item['qtd_produto'];
                                ?>
                                <tr>
                                    <td class="center">
                                        <a href="?controle=carrinho&amp;acao=remover&amp;remover=<?php echo ($item['id_carrinho']); ?>"><span class="glyphicon glyphicon-remove-circle"></span></a>
                                    </td>
                                    <td class="center">
                                        <img src="<?php echo(IMGPRODUTOS_ABSPATH) . '/' . $item['imagem']; ?>" 
                                             title="<?php echo ($item['titulo']); ?>" 
                                             alt="<?php echo ($item['imagem']); ?>" width="50">
                                    </td>
                                    <td><?php echo ($item['titulo']); ?></td>
                                    <td>
                                        <?php
                                        if ($item['desconto'] > 0) {
                                            echo (moeda(($item['valor'] * $item['desconto']) * $item['qtd_produto']));
                                        } else {
                                            echo (moeda($item['valor']));
                                        }
                                        ?>
                                    </td>
                                    <td class="text center"><?php echo ($item['qtd_produto']); ?></td>
                                    <td>
                                        <?php
                                        if ($item['desconto'] > 0) {
                                            echo (moeda(($item['valor'] * $item['desconto']) * $item['qtd_produto']));
                                        } else {
                                            echo (moeda(($item['valor'] * $item['qtd_produto'])));
                                        }
                                        ?>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="6">


                                    <a href="?controle=FinalizaCompra" class="btn btn-primary" role="button">
                                        <span class="glyphicon glyphicon-record"></span>
                                        Finalizar compra
                                    </a>

                                </td>
                            </tr>                            
                        </table>
                        <br />
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <h2>Cálculo do frete</h2>
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="cep" name="cep" size="8" placeholder="CEP">
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
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <h2>Totais</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Total do carrinho</th>
                                        <td>R$ <?php echo (moeda($totalCarrinho)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Frete</th>
                                        <td>A ser implementado</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>R$ <?php echo (moeda($totalCarrinho)); ?></td></span>
                                    </tr>
                                </table>
                            </div>
                            <br />
                            <br />
                            <br />
                        </div>
                    </div>
                <?php } ?> 
                <br><br><br><br><br><br><br>
            </div>
        </div>
        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
