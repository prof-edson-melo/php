<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>
<div class="col-md-10">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="?controle=Admin&amp;acao=painel">Painel de Controle</a></li>
                <li class="active">Cadastro de Produto</li>
            </ol>
        </div>
        <div class="container-fluid">
            <form class="form-horizontal" role="form" action="?controle=Admin&amp;acao=novo" method="post">
                <div class="form-group">
                    <label for="categoria" class="col-sm-4 control-label">Categoria</label>
                    <div class="col-sm-5">
                        <select name="categoria" id="categoria" class="form-control dropdown">
                            <?php
                            $categorias = new Categoria();
                            $categorias = unserialize($_SESSION['categorias']);
                            foreach ($categorias as $valor) {
                                ?>
                                <option><?php echo $valor->getDescricaoCategoria(); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subcategoria" class="col-sm-4 control-label">Subcategoria</label>
                    <div class="col-sm-5">
                        <select name="id_subcategoria" id="id_subcategoria" class="form-control dropdown">
                            <?php
                            $subCategorias = new Categoria();
                            $subCategorias = unserialize($_SESSION['sub_categorias']);
                            foreach ($subCategorias as $valor) {
                                ?>
                                <option value="<?php echo $valor->getIdSubCategoria(); ?>"><?php echo $valor->getDescricaoSubCategoria(); ?></option>
                            <?php } ?>
                        </select>
                    </div>                
                </div>
                <div class="form-group">
                    <label for="titulo" class="col-sm-4 control-label">Título</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título">
                    </div>
                </div>
                <div class="form-group">
                    <label for="resumo" class="col-sm-4 control-label">Resumo</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" id="resumo" name="resumo" placeholder="Digite um resumo com aproximadamente 300 caracteres"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricao_produto" class="col-sm-4 control-label">Descrição</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="descricao_produto" name="descricao_produto" placeholder="Digite a descrição">
                    </div>
                </div>    
                <div class="form-group">
                    <label for="ano" class="col-sm-4 control-label">Ano</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="ano" name="ano" placeholder="Digite o ano">
                    </div>
                </div>    
                <div class="form-group">
                    <label for="editora" class="col-sm-4 control-label">Editora</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="editora" name="editora" placeholder="Digite a editora">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edicao" class="col-sm-4 control-label">Ediçao</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="edicao" name="edicao" placeholder="Digite a edição">
                    </div>
                </div>
                <div class="form-group">
                    <label for="issn" class="col-sm-4 control-label">ISSN</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="issn" name="issn" placeholder="Digite o issn">
                    </div>
                </div>
                <div class="form-group">
                    <label for="autor" class="col-sm-4 control-label">Autor(es)</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="autor" name="autor" placeholder="Digite o autor ou autores">
                    </div>
                </div>
                <div class="form-group">
                    <label for="paginas" class="col-sm-4 control-label">Páginas</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="paginas" name="paginas" placeholder="Digite o número de páginas">
                    </div>
                </div>
                <div class="form-group">
                    <label for="imagem" class="col-sm-4 control-label">Imagem</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="imagem" name="imagem" placeholder="Digite o caminho da imagem">
                    </div>
                </div>  

                <div class="form-group">
                    <label for="oferta" class="col-sm-4 control-label">Oferta</label>
                    <div class="col-sm-5">
                        <select name="oferta" id="id_subcategoria" class="form-control dropdown">
                            <option value="0" selected>Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>                
                </div>            

                <div class="form-group">
                    <label for="valor" class="col-sm-4 control-label">Valor R$</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="valor" name="valor" placeholder="Digite o valor com ponto e não vírgula">
                    </div>
                </div>

                <div class="form-group">
                    <label for="desconto" class="col-sm-4 control-label">Desconto %</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="desconto" name="desconto" placeholder="Digite o valor do desconto. Ex: 10% fica 0.9">
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <br />
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-record"></span>
                            Inserir
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
