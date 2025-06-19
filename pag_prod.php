<?php include 'conexao.php'; 

if(isset($_POST["adicionar_carrinho"]))
{

    if(isset($_COOKIE["cart"]))
    {
        $cookie_data = stripslashes($_COOKIE['cart']);
   
        $dados_carrinho = json_decode($cookie_data, true);
    }
    else
    {
        $dados_carrinho = array();
    }

    if(!$dados_carrinho){
        $dados_carrinho=array();
    }

    $item_id_list = array_column($dados_carrinho, 'id');

    if(in_array($_POST["hidden_id"], $item_id_list))
    {
        foreach($dados_carrinho as $keys => $values)
        {
         if($dados_carrinho[$keys]["id"] == $_POST["hidden_id"])
         {
          $dados_carrinho[$keys]["quantidade_item"] = $dados_carrinho[$keys]["quantidade_item"] + $_POST["quantidade"];
         }
        }
    }
    else
    {
        $item_array = array(
            'id'              => $_POST["hidden_id"],
            'nome'            => $_POST["hidden_name"],
            'preco'           => $_POST["hidden_price"],
            'descricao'       => $_POST["hidden_desc"],
            'quantidade_item' => $_POST["quantidade"]
        );
        
        $dados_carrinho[] = $item_array;
    }

    $item_data = json_encode($dados_carrinho, JSON_UNESCAPED_UNICODE);
    setcookie('cart', $item_data, time() + (86400 * 30));
    header("location:carrinho.php?success=1");

}

?> 

<!DOCTYPE html>
<html lang="pt-br">

<html>
    <head>

        <meta charset="utf-8"/>
        <title>laMusic</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/guitarFavicon.png" type="image/x-icon">
        <!-- Link BoxIcons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="assets/css/swiper-bundle.css" />
        <!-- Link CSS Style -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    </head>
    <body>

        <?php include 'header.php'; ?> 
        
        <div class="container">
            <div class="row">
                <?php
                
                if(isset($_GET['instrumento_id']))
                {
                    $instrumento_id = $_GET['instrumento_id'];
                    $sql = "SELECT * FROM instrumentos WHERE instrumento_id = $instrumento_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0)
                    {
                        $fetch = $result->fetch_assoc();
                ?>      
                        <div class="card" style="width: 1000px;">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?php echo $fetch['imagem']; ?>" class="card-img" style="max-height: 400px;">
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                    <form method="post">
                                        <h2 class="card-title"><?php echo $fetch['nome_instrumento']; ?></h2><br>
                                        <p class="card-text"><?php echo $fetch['descricao']; ?></p>
                                        <p class="card-text"><small class="text-muted">Preço: R$ <?php echo number_format($fetch['preco'], 2, ',', '.'); ?></small></p>
                                        <input type="hidden" name="hidden_id" value="<?php echo $fetch['instrumento_id']; ?>" />
                                        <input type="hidden" name="hidden_name" value="<?php echo $fetch['nome_instrumento']; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $fetch['preco']; ?>" />
                                        <input type="hidden" name="hidden_desc" value="<?php echo $fetch['descricao']; ?>" />
                                        <input type="hidden" name="quantidade" value="1"/>
                                        <input type="submit" name="adicionar_carrinho" class="btn btn-primary" style="position: bottom;" value="Adicionar ao carrinho"/>
                                    </form>   
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div> 
        </div>      

    <!-- Swiper JS -->
    <script src="assets/js/swiper-bundle.js"></script>
    <!-- javascript -->
    <script src="assets/js/style.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>