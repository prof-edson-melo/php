<?php require ABSPATH . '/visoes/assets/includes/header.php'; ?>
<div class="col-md-10">

    <!-- Conteúdo da página principal -->
    <div class="container-fluid">

        <!-- Produtos -->
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Início</a></li>
                    <li class="active">Finalizar compra</li>
                </ol>

                <?php
                // Verifica se o usuário está logado no sistema
                if (!isset($_SESSION['cliente']) || $_SESSION['cliente'] == null) {
                    include 'login_cadastro.php';
                } else {

                    // cria o array com os produtos para serem inseridos no pedido
                    $produtos = array();

                    $cliente = new Cliente();
                    $cliente = unserialize($_SESSION['cliente']);
                    // Exibe os dados do cliente
                    foreach ($cliente as $valor) {
                        echo '<h3>' . $valor->getNome() . ' (' . $valor->getCpf() . ')</h3>';
                        echo '<strong>E-mail: </strong>' . $valor->getEmail() . '<br>';
                        echo '<strong>Telefone: </strong>' . $valor->getDddTelefone() . ' ' . $valor->getTelefone() . '<br>';
                        echo '<strong>Celular: </strong>' . $valor->getDddCelular() . ' ' . $valor->getCelular() . '<br>';
                        echo '<strong>Endereço: </strong>' . utf8_encode($valor->getEndereco()) . ', ' . $valor->getNumero() . ' ' . utf8_encode($valor->getComplemento()) . '<br>';
                        echo '<strong>Cep: </strong>' . $valor->getCepOrigem() . '<br>';
                        echo '<strong>Cidade: </strong>' . utf8_encode($valor->getCidade()) . '<br>';
                        echo '<strong>Estado: </strong>' . utf8_encode($valor->getEstado()) . '<br>';
                        ?>
                        
                        <?php
                    }
                    ?>
                           <hr />
                    <h2>Seu pedido</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th class="text center">Quantidade</th>
                                <th>Total</th>
                            </tr>
                            <?php
                            $totalCarrinho = 0;
                            foreach ($objCarrinho as $item) {
                                $totalCarrinho += $item['valor'] * ($item['desconto'] > 0 ? $item['desconto'] : 1) * $item['qtd_produto'];
                                ?>    

                                <tr>
                                    <td><?php echo $item['titulo']; ?> </td>
                                    <td>R$ <?php echo ($item['desconto'] == 0 ? moeda($item['valor'] * $item['qtd_produto']) : (moeda($item['valor'] * $item['qtd_produto'] * $item['desconto']))); ?></td>
                                    <td class="text center"><?php echo $item['qtd_produto']; ?></td>
                                    <td>R$ <?php echo ($item['desconto'] == 0 ? moeda($item['valor'] * $item['qtd_produto']) : (moeda($item['valor'] * $item['qtd_produto'] * $item['desconto']))); ?></td>
                                </tr>
                                <?php
                                $produtos[] = array("id_produto" => $item['id_produto'], "qtd_produto" => $item['qtd_produto'], "valor" => ($item['desconto'] == 0 ? $item['valor'] * $item['qtd_produto'] : $item['valor'] * $item['qtd_produto'] * $item['desconto']));
                            }
                            ?>
                            <tr>
                                <th>FRETE (CEP destino)</th>
                                <td colspan="2">

                                    <form class="form-inline" role="form" action="?controle=FinalizaCompra&acao=frete" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="cep" name="cepDestino" placeholder="CEP" value="<?php echo $valor->getCepOrigem(); ?>">
                                            <select name="servico" id="servico" class="form-control dropdown">
                                                <option value="41106">PAC</option>
                                                <option value="40010">SEDEX</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="cepOrigem" value="<?php echo $valor->getCepOrigem(); ?>">
                                        <input type="submit" class="btn btn-default" id="frete" value="Calcular">
                                    </form>
                                </td>
                                <td>R$ <?php
                                    echo moeda($_SESSION['frete']);
                                    $_SESSION['produtos_compra'] = $produtos;
                                    $_SESSION['produtos_frete'] = $_SESSION['frete'];
                                    $_SESSION['produtos_total'] = $totalCarrinho;
                                    ?></td>
                            </tr>
                            <tr>
                                <th>TOTAL DO PEDIDO</th>
                                <th colspan="2">&nbsp;</th>
                                <th>R$ <?php echo moeda($totalCarrinho + $_SESSION['frete']); ?></th>
                            </tr>
                        </table>
                    </div>
                    <form class="form-inline" role="form" action="?controle=FinalizaCompra&amp;acao=fecharCompra" method="post">
                        <div class="well">
                            <h2>Selecione o meio de pagamento.</h2>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="EsconderMensagem" value="boleto">
                                    Boleto bancário<br>
                                    <input type="radio" name="optionsRadios" id="MostrarEsconderMensagem" value="cartao">
                                    Cartão de crédito
                                </label><br>

                                <!-- DIV que controla a exibição dos campos do cartão -->
                                <div id="Mensagem" style="display:none">
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="numero_cartao" class="col-sm-6 control-label">Número</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="complemento" name="numero_cartao" placeholder="Digite o número do cartão">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mes" class="col-sm-6 control-label">Validade - Mês</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="complemento" name="mes_vencimento" placeholder="Digite o mês">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mes" class="col-sm-6 control-label">Validade - Ano</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="complemento" name="ano_vencimento" placeholder="Digite o ano">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="codigo_seguranca" class="col-sm-6 control-label">Código de segurança</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="cidade" name="codigo_seguranca">
                                            </div>
                                        </div>     
                                    </div>
                                    
                                </div>
                            </div>
                            <hr />
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Concordo com os <a href="">termos e condições</a>.
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <br />
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-record"></span>
                                    Finalizar compra
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="id_cliente" value="<?php echo $valor->getIdCliente(); ?>">
                    </form>
                <?php } ?>
            </div>
            <p>&nbsp;</p>
        </div>
        <?php require ABSPATH . '/visoes/assets/includes/footer.php'; ?>
        <!-- Controle para exibição do cartão de crédito -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#MostrarMensagem").click(MostrarMensagem);
                $("#EsconderMensagem").click(EsconderMensagem);
                $("#MostrarEsconderMensagem").click(MostrarEsconderMensagem);
            });

            function MostrarMensagem() {
                $("#Mensagem").show();
            }
            function EsconderMensagem() {
                $("#Mensagem").hide();
            }
            function MostrarEsconderMensagem() {
                $("#Mensagem").toggle();
            }
        </script> 
