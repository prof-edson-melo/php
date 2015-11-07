<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>
               <div class="col-md-10">

                    <!-- Conteúdo da página principal -->
                    <div class="container-fluid">

                        <!-- Produtos -->
                        <div class="row">
                            <div class="col-xs-12">
                                <ol class="breadcrumb">
                                    <li><a href="#">Início</a></li>
                                    <li class="active">Fale conosco</li>
                                </ol>
                                <h1>Formulário de Contato</h1>
                                <hr />
                            </div>
                        </div>
                        <form name="cadastro" class="form-horizontal" action="?controle=Contato&amp;acao=envia" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputSenha" class="col-lg-2 control-label">Assunto</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="inputSenha" name="senha" placeholder="Informe o assunto" value="">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label for="inputNome" class="col-lg-2 control-label">Nome</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Informe seu nome" value="" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">E-mail</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Informe seu e-mail" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputMensagem" class="col-lg-2 control-label">Mensagem</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" id="inputMensagem" name="email" placeholder="Digite sua mensagem"></textarea>
                                    </div>
                                </div>                                

                                <div class="form-group">
                                    <div class="col-lg-6 col-lg-offset-2">
                                        <button type="submit" name="operacao" class="btn btn-success" value="cadastrar">Enviar mensagem</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
<?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
