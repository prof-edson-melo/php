<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>
<div class="col-md-10">
    <div class="container-fluid">

        <!-- Produtos -->
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <?php if (isset($_SESSION['id_admin'])) { ?>
                        <li><a href="?controle=Admin&amp;acao=painel">Painel de Controle</a></li>
                        <li class="active">Lista de pedidos</li>
                    <?php } else { ?>
                        <li><a href="index.php">Início</a></li>
                        <li><a href="?controle=Pedidos&amp;acao=lista&amp;id_cliente=<?php echo $_SESSION['id_cliente']; ?>">Pedido</a></li>
                        <li class="active">Detalhes do pedido</li>
                    <?php } ?>
                </ol>
                <h1>Detalhes do pedido</h1>
                <hr />
                <?php
                $detalhes = new PedidosDetalhes();
                $detalhes = unserialize($_SESSION['pedido_detalhes']);

                foreach ($detalhes as $valor) {
                    ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Número do pedido</th>
                                <th>Data</th>
                            </tr>
                            <tr>
                                <td><?php echo $valor->getIdPedido(); ?></td>
                                <td><?php echo $valor->getData(); ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Endereço de entrega</th>
                                <td><?php echo $valor->getEndereco(); ?></td>
                            </tr>
                            <tr>
                                <th>Endereço de cobrança</th>
                                <td><?php echo $valor->getEndereco(); ?></td>
                            </tr>
                            <tr>
                                <th>Forma de pagamento</th>
                                <td><?php echo $valor->getFormaPagamento(); ?></td>
                            </tr>
                            <tr>
                                <th>Forma de envio</th>
                                <td><?php echo $valor->getFormaEnvio(); ?></td>
                            </tr>                        
                        </table>
                    </div>
                    <?php
                    break;
                }
                ?>


                <div class="table-responsive">
                    <table class="table table-striped table-bordered">

                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                        </tr>
                        <?php
                        $totalPedido = 0;
                        foreach ($detalhes as $valor) {
                            $totalPedido += $valor->getValor_unitario() * $valor->getQuantidade();
                            ?>
                            <tr>
                                <td><?php echo $valor->getTitulo(); ?></td>
                                <td>R$ <?php echo moeda($valor->getValor_unitario()); ?></td>
                                <td><?php echo $valor->getQuantidade(); ?></td>
                                <td>R$ <?php echo moeda(($valor->getValor_unitario() * $valor->getQuantidade())); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th>TOTAL DO PEDIDO</th>
                            <th colspan="2">&nbsp;</th>
                            <th>R$ <?php echo moeda($totalPedido); ?></th>
                        </tr>

                    </table>

                </div>
            </div>
        </div>

        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
