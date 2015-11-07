<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>

<div class="col-md-10">

    <div class="container-fluid">

        <!-- Produtos -->
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="?controle=Admin&amp;acao=painel">Painel de Controle</a></li>
                    <li class="active">Lista de pedidos</li>
                </ol>
                <h1>Meus pedidos</h1>
                <hr />
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Pedido</th>
                            <th>Data</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php
                        $pedidos = new Pedido();
                        $pedidos = unserialize($_SESSION['pedidos']);
                        foreach ($pedidos as $valor) {
                            ?>
                            <tr>
                                <td><?php echo $valor->getIdPedido(); ?></td>
                                <td><?php echo formata_data($valor->getDataPedido()); ?></td>
                                <td><a href="?controle=Pedidos&amp;acao=detalhes&amp;id_pedido=<?php echo $valor->getIdPedido(); ?>"><span class="glyphicon glyphicon-th-list"></span> exibir detalhes</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <br><br>
        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
