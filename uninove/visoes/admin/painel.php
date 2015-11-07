<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>

<div class="col-md-10">

    <!-- Conteúdo da página principal -->
    <div class="container-fluid">

        <!-- Produtos -->
        <div class="row">
            <div class="col-xs-12">
                <h1>Painel Administrativo - <?php echo '(' . $_SESSION['email_admin'] . ')'; ?></h1>
                <hr />
            </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Painel Administrativo</div>
            <!-- Table -->
            <table class="table text-center">
                <tr>
                    <td><form class="form-inline" action="?controle=Admin&amp;acao=cadastrarProdutos" role="form" method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="text-center">
                                        <br />
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-record"></span>
                                            Produtos
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td><form class="form-inline" action="?controle=Admin&amp;acao=login" role="form" method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="text-center">
                                        <br />
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-record"></span>
                                            Categorias
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </td>
                    <td>
                        <form class="form-inline" action="?controle=Admin&amp;acao=login" role="form" method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="text-center">
                                        <br />
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-record"></span>
                                            Entrega
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form class="form-inline" action="?controle=Admin&amp;acao=login" role="form" method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="text-center">
                                        <br />
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-record"></span>
                                            Pagamento
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </td>
                    <td>
                        <form class="form-inline" action="?controle=Admin&amp;acao=login" role="form" method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="text-center">
                                        <br />
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-record"></span>
                                            Subcategorias
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form></td>
                    <td>
                        <form class="form-inline" action="?controle=Admin&amp;acao=pedidos" role="form" method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="text-center">
                                        <br />
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-record"></span>
                                            Pedidos
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>







        <br><br>
        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
