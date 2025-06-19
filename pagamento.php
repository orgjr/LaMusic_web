<?php include 'conexao.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/guitarFavicon.png" type="image/x-icon">
    <!-- Link BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.css" />
    <!-- Link CSS Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="assets/js/style.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
    
    <?php include 'header.php'; ?>

    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                        Produtos
                    </div>

                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Preço</th>
                                    <th width="10%">Quantidade</th>
                                </tr>
                            </thead>

                            <?php

                            if(isset($_COOKIE["cart"]))
                            {
                                $total = 0;
                                $cookie_data = stripslashes($_COOKIE['cart']);
                                $dados_carrinho = json_decode($cookie_data, true);
                                if(!$dados_carrinho){
                                    $dados_carrinho=array();
                                }

                                foreach($dados_carrinho as $keys=>$values)
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $values["nome"]; ?></td>
                                        <td align="right">R$ <?php echo number_format($values["quantidade_item"] * $values["preco"], 2); ?></td>
                                        <td><?php echo $values["quantidade_item"]; ?></td>
                                    </tr>
                                <?php
                                    $total = $total + ($values["quantidade_item"] * $values["preco"]);
                                }
                                ?>
                                <tr>
                                    <td colspan="2" align="right">Total</td>
                                    <td align="right">R$ <?php echo number_format($total, 2); ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                        Forma de Pagamento
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="input_numcartao">Número do cartão</label>
                                    <input type="number" class="form-control" id="input_numcartao">
                                </div>
                                <div class="col">
                                    <label for="input_codseg">Código de segurança</label>
                                    <input type="number" class="form-control" id="input_codseg">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="input_nomec">Nome no cartão</label>
                                    <input type="text" class="form-control" id="input_nomec">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Mês</label>
                                    <input type="number" class="form-control" id="input_mes">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Ano</label>
                                    <input type="number" class="form-control" id="input_ano">
                                </div>
                            </div>

                            <small id="texto" class="form-text text-muted">Aqui seria um exemplo de pagamento com cartão, mas será implantado opção de pagamento por boleto, deixando a escolha para o usuário
                                                                           . Falta implementar também uma forma de limitar a quantidade de caracteres no mês e ano</small>
                            <button type="submit" class="btn btn-primary">Finalizar compra</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>