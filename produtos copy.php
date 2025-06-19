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

<head>
    <meta charset="utf-8" />
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="container">
    <h2 class="ml-3 mt-5 mb-4">Nossos Produtos</h2>
    <div class="row">
        <?php

        if(isset($_GET['categoria_id'])) {
            $categoria_id = $_GET['categoria_id'];
            $sql = "SELECT * FROM instrumentos WHERE categoria_id = $categoria_id";
            $result = $conn->query($sql);
             
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // echo $row['imagem'];
                    
        ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card bg-white">
                    <img class="card-img-top ml-3" src="<?php echo $row['imagem']; ?>" style="max-width: 200px; max-height: 200px; cursor: pointer" onclick="window.location='<?php echo 'pag_prod.php?instrumento_id=' . $row['instrumento_id']; ?>'" alt="<?php echo $row['nome_instrumento']; ?>">
                    <div class="card-body bg-white" style="cursor: pointer" onclick="window.location='<?php echo 'pag_prod.php?instrumento_id=' . $row['instrumento_id']; ?>'">
                        <form method="post">
                            <h4 class="card-title"><?php echo $row['nome_instrumento']; ?></h4>
                            <p class="card-text"><?php echo $row['descricao']; ?></p>
                            <p class="card-text">Preço: R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></p>
                            <input type="hidden" name="hidden_id" value="<?php echo $row['instrumento_id']; ?>" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row['nome_instrumento']; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row['preco']; ?>" />
                            <input type="hidden" name="hidden_desc" value="<?php echo $row['descricao']; ?>" />
                            <input type="hidden" name="quantidade" value="1"/>
                            <input type="submit" name="adicionar_carrinho" class="btn btn-primary" value="Adicionar ao carrinho" />
                        </form>
                    </div>
                </div>
            </div>
        <?php
                }
            } else {
                echo "<p class='col-12'>Nenhum produto encontrado para esta categoria.</p>";
            }
        } else {
            echo "<p class='col-12'>Categoria não especificada.</p>";
        }

        ?>
    </div>
</div>

    <!-- MAIN -->
    <main>
        
        <!-- SERVICE -->
        <section class="service">
            <div class="service__content container">
                <div class="service__item">
                    <img src="assets/img/entrega.png" alt="">
                    <p>entrega rápida</p>
                    <span>48 horas para produtos do estoque</span>
                </div>

                <div class="service__item">
                    <img src="assets/img/carrinho.png"  width="200" height="200" alt="">
                    <p>Compra 100% segura</p>
                    <span>Garantimos sua segurança</span>
                </div>

                <div class="service__item">
                    <img src="assets/img/ok.png" width="200" height="200" alt="">
                    <p>Produtos originais</p>
                    <span>com garantia</span>
                </div>
            </div>
        </section>
        <!-- SERVICE END -->
       
        <!-- NEWSLETTER -->
        <section class="newsletter section">
            <div class="newsletter__content container">
                <div class="newsletter__text">
                    <p>Quer receber nossas novidades e ofertas direto no seu e-mail?</p>
                </div>
                <div class="newsletter__form">
                    <form >
                        <input type="text" placeholder="Seu melhor e-mail">
                        <button class="btn">Quero receber</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- NEWSLETTER END -->
    </main>
    <!-- MAIN END-->

    <!-- FOOTER -->
    <footer class="footer container">
        <div class="footer__content">
            <div class="footer__data">
                <h1><a href="#" class="logo">la<span>Music</span></a></h1>
                <div class="social__media">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-pinterest-alt'></i></a>
                </div>
            </div>

            <div class="footer__data">
                <h2>Institucional</h2>
                <ul>
                    <li><a href="#">sobre a empresa</a></li>
                    <li><a href="#">política de privacidade</a></li>
                    <li><a href="#">política de trocas e devoluções</a></li>
                </ul>
            </div>

            <div class="footer__data">
                <h2>minha conta</h2>
                <ul>
                    <li><a href="#">meus pedidos</a></li>
                    <li><a href="#">minha conta</a></li>
                </ul>
            </div>

            <div class="footer__data">
                <h2>horário de atendimento</h2>
                <ul>
                    <li>segunda á sexta<br>das 9h às 18h</li>
                    <li>(11) 1234-5667</li>
                </ul>
            </div>
        </div>
        <div class="copy">
            <p>&copy Todos os direitos reservados</p>
        </div>
    </footer> 
    <!-- FOOTER END -->


    <!-- Swiper JS -->
    <script src="assets/js/swiper-bundle.js"></script>
    <!-- javascript -->
    <script src="assets/js/style.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>