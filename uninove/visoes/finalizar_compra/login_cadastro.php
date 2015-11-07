<h1>Finalizar compra</h1>
<hr />
<p>Possui cadastro? Entre com seu email e senha para acessar sua conta.</p>
<form class="form-inline well" action="?controle=cliente&amp;acao=login" role="form" method="post">
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
            <input type="hidden" name="finalizar_compra" value="finalizar_compra">
        </div>
    </div>
    <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-log-in"></span>
        Entrar
    </button>
</form>
<hr />
<h3>ou</h3>
<hr />
<h3>Preencha o formulário abaixo para realizar seu cadastro.</h3>
<form class="form-horizontal" role="form" action="?controle=Cliente&amp;acao=novo&amp;path=finalizar_compra" method="post">
    <div class="form-group">
        <label for="nomeCompleto" class="col-sm-4 control-label">Digite seu nome completo</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="nomeCompleto" name="nome" placeholder="Nome completo">
        </div>
    </div>
    <div class="form-group">
        <label for="cpf" class="col-sm-4 control-label">CPF</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF">
        </div>
    </div>
    <div class="form-group">
        <label for="cep" class="col-sm-4 control-label">CEP</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite seu CEP">
        </div>
    </div>
    <div class="form-group">
        <label for="numero" class="col-sm-4 control-label">Número</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="complemento" name="numero" placeholder="Digite o número">
        </div>
    </div>    
    <div class="form-group">
        <label for="complemento" class="col-sm-4 control-label">Complemento</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite o complemento">
        </div>
    </div>    
    <div class="form-group">
        <label for="email" class="col-sm-4 control-label">E-mail</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email">
        </div>
    </div>

    <div class="form-group">
        <label for="ddd_telefone" class="col-sm-4 control-label">DDD</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="ddd_telefone" name="ddd_telefone" placeholder="Digite o ddd">
        </div>
    </div>
    <div class="form-group">
        <label for="telefone" class="col-sm-4 control-label">Telefone</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite seu telefone fixo">
        </div>
    </div>
    <div class="form-group">
        <label for="ddd_celular" class="col-sm-4 control-label">DDD</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="ddd_celular" name="ddd_celular" placeholder="Digite o ddd">
        </div>
    </div>
    <div class="form-group">
        <label for="celular" class="col-sm-4 control-label">Celular</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="celular" name="celular" placeholder="Digite seu telefone celular">
        </div>
    </div>
    <div class="form-group">
        <label for="login" class="col-sm-4 control-label">Login</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="login" name="login" placeholder="Digite um login para acesso">
        </div>
    </div>    
    <div class="form-group">
        <label for="senha" class="col-sm-4 control-label">Senha</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
        </div>
    </div>
    <hr />
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-4">
            <br />
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-record"></span>
                Prosseguir
            </button>
        </div>
    </div>
</form>
