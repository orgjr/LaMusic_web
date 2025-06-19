<?php include 'conexao.php';

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['cart']);
  $cart_data = json_decode($cookie_data, true);
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("cart", $item_data, time() + (86400 * 30));
    header("location:carrinho.php?remove=1");
   }
  }
 }
 if($_GET["action"] == "clear")
 {
  setcookie("cart", "", time() - 3600);
  header("location:carrinho.php?clearall=1");
 }
}

if(isset($_POST["continuar"])){

    header("location:index.php");

}elseif(isset($_POST["finalizar"])){

    if(isset($_COOKIE["cart"])){

        header("location:login.php");

    }else{
        echo '<script type="text/javascript"> window.onload = function () { alert("O carrinho está vazio!"); } </script>'; 
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title>Carrinho</title>

    <script src="assets/js/style.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/guitarFavicon.png" type="image/x-icon">
    <!-- Link BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Link CSS Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    
    <?php include 'header.php'; ?>

    <div class="container">

        <?php
            if(isset($_GET["success"]))
            {
                echo '<section class="produtos">
                        <h2 class="mt-5 mb-4">Produto adicionado ao carrinho!</h2>
                      </section>'; 
            }
            elseif(isset($_GET["remove"]))
            {
                echo '<section class="produtos">
                        <h2 class="mt-5 mb-4">Produto removido do carrinho!</h2>
                      </section>'; 
            }
            elseif(isset($_GET["clearall"]))
            {
                echo '<section class="produtos">
                        <h2 class="mt-5 mb-4">Todos os produtos foram removidos</h2>
                      </section>';                 
            }
            else
            {
                echo '<section class="produtos">
                        <h2 class="mt-5 mb-4">Carrinho</h2>
                      </section>';                 
            }
        ?>

        <div align="right">
            <a href="carrinho.php?action=clear"><b>Limpar carrinho</b></a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th width="10%">Quantidade</th>
                        <th scope="col">Ação</th>
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
                            <td><?php echo $values["descricao"]; ?></td>
                            <td align="right">R$ <?php echo number_format($values["quantidade_item"] * $values["preco"], 2); ?></td>
                            <td><?php echo $values["quantidade_item"]; ?></td>
                            <td><a href="carrinho.php?action=delete&id=<?php echo $values["id"]; ?>"><span class="text-danger">Remover</span></a></td>
                        </tr>
                    <?php
                        $total = $total + ($values["quantidade_item"] * $values["preco"]);
                    }
                    ?>
                    <tr>
                        <td colspan="4" align="right">Total</td>
                        <td align="right">R$ <?php echo number_format($total, 2); ?></td>
                    </tr>
                    <?php
                }
                else
                {
                    echo '
                    <tr>
                        <td colspan="5" align="center">Sem itens no carrinho</td>
                    </tr>
                    ';                
                }

                ?>
            </table>
        </div>
        
        <form method="post">
            <div class="btn-group" style="width: 50%; left: 50%;">
                <button type="submit" name="continuar" class="btn btn-primary">Continuar comprando</button>
                <button type="submit" name="finalizar" class="btn btn-primary">Finalizar compra</button>
            </div>
        </form>

    </div>

</body>
</html>