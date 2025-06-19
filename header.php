<!DOCTYPE html>
<html lang="pt-br">

<header class="header" id="header">
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