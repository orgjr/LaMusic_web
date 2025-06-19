<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>laMusic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

    <!-- RESET CSS -->
    <link rel="stylesheet" href="assets/css/reset.css" />
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

    <?php include 'header.php'; ?>

    <div class="about__container">
        <div class="about__title">
            <a><span>Sobre a</span></a>
            <h1><a class="logo">la<span>MUSIC</span></a></h1>
        </div>

        <?php
        $paragraph = '<html>
        <div class="about__text">
            <p>Somos uma empresa apaixonada por música, comprometida em fornecer os melhores instrumentos musicais para músicos de todos os níveis. Fundada em fevereiro de 2024, nossa missão é tornar a experiência musical mais acessível e gratificante para todos.</p><br>
            <p>Nossa loja oferece uma ampla seleção de instrumentos, desde guitarras e violões até teclados e equipamentos de áudio. Trabalhamos apenas com marcas de alta qualidade e estamos sempre atualizados com as últimas tendências e tecnologias do mundo da música.</p><br>
            <p>Além de oferecer produtos de qualidade, nos dedicamos a fornecer um excelente atendimento ao cliente. Nossa equipe é formada por músicos experientes e apaixonados que estão sempre prontos para ajudar e aconselhar nossos clientes.</p><br>
            <p>Se você está começando sua jornada musical ou é um músico experiente em busca de equipamentos profissionais, estamos aqui para atender às suas necessidades. Visite nossa loja hoje mesmo e deixe-nos ajudá-lo a encontrar o instrumento perfeito para você.</p>
        </div>
        </html>';
        echo "$paragraph" .PHP_EOL;
        ?>

    </div>

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
                    <li><a href="#">sobre a laMusic</a></li>
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

</body>