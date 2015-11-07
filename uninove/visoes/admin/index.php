<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>

<div class="col-md-10">

    <!-- Conteúdo da página principal -->
    <div class="container-fluid">

        <!-- Produtos -->
        <div class="row">
            <div class="col-xs-12">
                <h1>Área de acesso administrativa</h1>
                <hr />
            </div>
        </div>
        <h4>Informe os dados abaixo</h4>
        <form class="form-inline well" action="?controle=Admin&amp;acao=login" role="form" method="post">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">@</div>
                    <input class="form-control" name="email" type="email" placeholder="Digite o email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                    <input type="password" name="senha" class="form-control" id="exampleInputPassword2" placeholder="Digite a senha">
                </div>
            </div>
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-log-in"></span>
                Entrar
            </button>
        </form>
        <br><br>
        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
