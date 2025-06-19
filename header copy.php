<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/guitarFavicon.png" type="image/x-icon">
    <!-- Link BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.css" />
    <!-- Link CSS Style -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <div class="social">
        <div class="social__content container">
            <div class="social__whatsApp">
                <a href="#">
                    <i class='bx bxl-whatsapp'></i>
                    <span>compre pelo WhatsApp</span>
                </a>
            </div>
            <div class="social__media">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-pinterest-alt'></i></a>
            </div>
        </div>
    </div>

    <header class="header" id="header">
        <div class="nav__bar container">
            <h1><a href="index.php" class="logo">la<span>MUSIC</span></a></h1>

            <div class="nav" id="nav">
                <ul class="nav__menu">
                    <?php
    
                    // Consulta para obter todas as categorias
                    $sql = "SELECT categoria_id, nome_categoria FROM categorias";
                    $result = $conn->query($sql);
                    $row = $result->fetch(PDO::FETCH_ASSOC);

    
                    if ($row) {
                        echo "<li class='nav__item'><a href='produtos.php?categoria_id=" . $row["categoria_id"] . "' class='nav__link'>" . $row["nome_categoria"] . "</a></li>";
                        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<li class='nav__item'><a href='produtos.php?categoria_id=" . $row["categoria_id"] . "' class='nav__link'>" . $row["nome_categoria"] . "</a></li>";
                        }
                    } else {
                        echo "Nenhuma categoria encontrada.";
                    }

                    ?>
                </ul>
            </div>

            <div class="nav__login">
                <div class="nav__user">
                    <a href="login.php"><i class='bx bx-user'></i></a>
                </div>
                <div class="nav__cart">
                    <a href="carrinho.php"><i class='bx bxs-cart'></i></a>
                </div>
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Swiper JS -->
    <script src="assets/js/swiper-bundle.js"></script>
    <!-- javascript -->
    <script src="assets/js/style.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>