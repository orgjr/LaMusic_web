<?php 
    include ("conexao.php"); 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
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

    <!-- HEADER -->
    <header class="header" id="header">
        <div class="nav__bar container">
            <h1><a href="index.php" class="logo">la<span>MUSIC</span></a></h1>

            <div class="nav" id="nav">
                <ul class="nav__menu">
                   <?php
    
                    // Consulta para obter todas as categorias
                    $sql = "SELECT categoria_id, nome_categoria FROM categorias";
                    $result = $conn->query($sql);

    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
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

    <!-- MAIN -->
    <main>
        <!-- HERO -->
        <section class="hero container">
            <div class="hero__content swiper" id="hero">
                <div class="swiper-wrapper">
                    <div class="hero__slide swiper-slide">
                        <div class="hero__slide-text">
                            <h1>Saldão</h1>
                            <span>2024</span>
                            <p>Instrumentos de qualidade</p>
                        </div>
                        <div class="hero__slide-img">
                            <img src="assets/img/instrumentos-musicais.jpg" alt="">
                        </div>
                    </div>

                    <div class="hero__slide swiper-slide">
                        <div class="hero__slide-text">
                            <h1>40 %</h1>
                            <span>OFF</span>
                            <p>em toda a linha de Guitarras</p>
                        </div>
                        <div class="hero__slide-img">
                            <img src="assets/img/guitarra.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- HERO END -->

        <!-- ENVIRONMENT -->
        <section class="environment section container">
            <h1 class="section__title">Encontre o instrumento certo para a sua música</h1>

            <div class="environment__itens">
                <a href="#" class="environment__item">
                    <img src="assets/img/guitarrista.png" width="250" height="250" alt="">
                    <span>Rock</span>
                </a>

                <a href="#" class="environment__item">
                    <img src="assets/img/jazz.png"  width="200" height="250" alt="">
                    <span>Jazz</span>
                </a>

                <a href="#" class="environment__item">
                    <img src="assets/img/tambor.png"  width="200" height="250" alt="">
                    <span>Samba</span>
                </a>

                <a href="#" class="environment__item">
                    <img src="assets/img/violaoMPB.png"   width="200" height="250" alt="">
                    <span>MPB</span>
                </a>
            </div>
        </section>
        <!-- ENVIRONMENT END -->

        <!-- OFFER -->
        <section class="offer section container">
            <h1 class="section__title">Ofertas para você</h1>
            <div class="offer__content swiper-container" id="offer">
                <div class="swiper-wrapper">
                    <div class="offer__item swiper-slide">
                        <div class="offer__img">
                            <img src="assets/img/guitarraTeg-320.jpg" width="320" height="205" alt="">
                        </div>
                        <div class="offer__desc">
                            <p>Guitarra Elétrica Teg-320</p>
                        </div>
                        <div class="offer__price">
                            <span>R$ 999,00</span>
                        </div>
                        <div class="offer__discount">
                            <a href="#">PIX ou <i class='bx bx-barcode'></i>
                                R$ 899,00<br>com 10% de desconto</a>
                        </div>
                        <a href="#" class="btn">adicionar ao carrinho</a>
                    </div>

                    <div class="offer__item swiper-slide">
                        <div class="offer__img">
                            <img src="assets/img/bateria.png " width="320" height="205"alt="">
                        </div>
                        <div class="offer__desc">
                            <p>Bateria Acústica Nagano</p>
                        </div>
                        <div class="offer__price">
                            <span>R$ 999,00</span>
                        </div>
                        <div class="offer__discount">
                            <a href="#">PIX ou <i class='bx bx-barcode'></i>
                                R$ 359,10<br>com 10% de desconto</a>
                        </div>
                        <a href="#" class="btn">adicionar ao carrinho</a>
                    </div>

                    <div class="offer__item swiper-slide">
                        <div class="offer__img">
                            <img src="assets/img/violaoEstudo.png" width="320" height="205" alt="">
                        </div>
                        <div class="offer__desc">
                            <p>Violão acústico estudo</p>
                        </div>
                        <div class="offer__price">
                            <span>R$ 499,00</span>
                        </div>
                        <div class="offer__discount">
                            <a href="#">PIX ou <i class='bx bx-barcode'></i>
                                R$ 459,00<br>com 10% de desconto</a>
                        </div>
                        <a href="#" class="btn">adicionar ao carrinho</a>
                    </div>

                    <div class="offer__item swiper-slide">
                        <div class="offer__img">
                            <img src="assets/img/baixoEletrico.png" width="300" height="300" alt="">
                        </div>
                        <div class="offer__desc">
                            <p>Baixo elétrico</p>
                        </div>
                        <div class="offer__price">
                            <span>R$ 499,00</span>
                        </div>
                        <div class="offer__discount">
                            <a href="#">PIX ou <i class='bx bx-barcode'></i>
                                R$ 449,10<br>com 10% de desconto</a>
                        </div>
                        <a href="#" class="btn">adicionar ao carrinho</a>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
        <!-- OFFER END -->

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

        <!-- OFFER TWO -->
        <section class="offer section container">
            <h1 class="section__title">Os mais desejados</h1>
            <div class="offer__content swiper-container" id="offer">
                <div class="swiper-wrapper">
                    <div class="offer__item swiper-slide">
                        <div class="offer__img">
                            <img src="assets/img/desejados/GuitarraElétricaGiannini .png"  alt="">
                        </div>
                        <div class="offer__desc">
                            <p>Guitarra Elétrica Giannini Masterwood Supersonic GMW33 Pau-Ferro</p>
                        </div>
                        <div class="offer__price">
                            <span>R$ 499,00</span>
                        </div>
                        <a href="#" class="btn">adicionar ao carrinho</a>
                    </div>

                    <div class="offer__item swiper-slide">
                        <div class="offer__img">
                            <img src="assets/img/ViolaoGiannini.png" width="346" height="420" alt="">
                        </div>
                        <div class="offer__desc">
                            <p>Violão Náilon Eletroacústico Giannini Performance GNF-3</p>
                        </div>
                        <div class="offer__price">
                            <span>R$ 399,00</span>
                        </div>
                        <a href="#" class="btn">adicionar ao carrinho</a>
                    </div>

                    <div class="offer__item swiper-slide">
                        <div class="offer__img">
                            <img src="assets/img/desejados/ViolãoNáilon.png" width="350" alt="">
                        </div>
                        <div class="offer__desc">
                            <p>Violão Náilon Eletroacústico Giannini Performance GNF-3 CEQ Translucent Dark Wine</p>
                        </div>
                        <div class="offer__price">
                            <span>R$ 489,00</span>
                        </div>
                        <a href="#" class="btn">adicionar ao carrinho</a>
                    </div>

                    <div class="offer__item swiper-slide">
                        <div class="offer__img">
                            <img src="assets/img/desejados/Contra-baixoElétrico-4-cordas-Giannini.png" alt="">
                        </div>
                        <div class="offer__desc">
                            <p>Contra-baixo Elétrico 4 cordas Giannini GB-100 3 Tone Sunburst com escudo Tortoise</p>
                        </div>
                        <div class="offer__price">
                            <span>R$ 499,00</span>
                        </div>
                        <a href="#" class="btn">adicionar ao carrinho</a>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
        <!-- OFFER TWO END -->

        <!-- OFFER-COLLECTION -->
        <section class="offer__collection section">
            <div class="offer__collection-content container">
                <div class="offer__collection-desc">
                    <h1>Corra! Falta apenas</h1><br><br>
                    <div class="countdown" id="countdown">
                        <!-- <div class="time">
                            <h2 id="days">00</h2>
                            <small>dias</small>
                        </div> -->
                        <div class="time">
                            <h2 id="hours"></h2>
                            <small>horas</small>
                        </div>
                        <div class="time">
                            <h2 id="minutes"></h2>
                            <small>minutos</small>
                        </div>
                        <div class="time">
                            <h2 id="seconds"></h2>
                            <small>segundos</small>
                        </div>
                    </div>
                    <img src="assets/img/spinner.gif" alt="carregabdo..." id="loading" class="loading">
                    <p class="offer__collection-text"><br>para aproveitar 30% de desconto<br>
                        em  baterias Michael  Elevation </p>
                </div>
                <div class="offer__collection-img">
                    <img src="assets/img/drums2-1696802_1280.png"  width="533" height="286"  alt="">
                </div>
            </div>
        </section>
        <!-- OFFER-COLLECTION END -->

        <!-- COLLECTION -->
        <section class="collection section container">
            <h1 class="section__title">Som na Caixa DJ !</h1>
            <div class="collection__content">
                <div class="collection__box one">
                    <a href="#">
                        <div class="box__img">
                            <img src="assets/img/colecao/Monitor Estúdio Yamaha HS 7 Ativo.png" alt="">
                        </div>
                        <div class="box__desc">
                            <div class="box__name">
                                <p>Monitor Estúdio Yamaha HS 7 Ativo</p>
                                <div class="box__price">
                                    <span>R$2.963,95</span>
                                </div>
                            </div>
                            <div class="offer__discount">
                                <a href="#">PIX ou <i class='bx bx-barcode'></i>
                                    R$ 2923,95<br>com 10% de desconto</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="collection__box two">
                    <a href="#">
                        <div class="box__img">
                            <img src="assets/img/colecao/Caixa 12 ElectroVoice ZLX12BT US Bluetooth Ativa.png" alt="">
                        </div>
                        <div class="box__desc">
                            <div class="box__name">
                                <p>Caixa 12 ElectroVoice ZLX12BT US Bluetooth Ativa</p>
                                <div class="box__price">
                                    <span>R$ 4.040,10</span>
                                </div>
                            </div>
                            <div class="offer__discount">
                                <a href="#">PIX ou <i class='bx bx-barcode'></i>
                                    R$ 3.633,10<br>com 10% de desconto</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="collection__box two">
                    <a href="#">
                        <div class="box__img">
                            <img src="assets/img/colecao/Teclado Arranjador Roland E-X30.png" alt="">
                        </div>
                        <div class="box__desc">
                            <div class="box__name">
                                <p>Teclado Arranjador Roland E-X30</p>
                                <div class="box__price">
                                    <span>R$1.289,00</span>
                                </div>
                            </div>
                            <div class="offer__discount">
                                <a href="#">PIX ou <i class='bx bx-barcode'></i>
                                    R$ 1.160,00<br>com 10% de desconto</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="collection__box one">
                    <a href="#">
                        <div class="box__img">
                            <img src="assets/img/colecao/Piano Digital Yamaha P145.png" alt="">
                        </div>
                        <div class="box__desc">
                            <div class="box__name">
                                <p>Piano Digital Yamaha P145</p>
                                <div class="box__price">
                                    <span>R$ 4.147,00</span>
                                </div>
                            </div>
                            <div class="offer__discount">
                                <a href="#">PIX ou <i class='bx bx-barcode'></i>
                                    R$ 3.732,90<br>com 10% de desconto</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- COLLECTION END -->


        <div class="inspiration__info">
            <h2>Siga <a href="#">la<span>Music</span></a> no</h2>
            <h3>Instagram</h3>
            <i class='bx bxl-instagram'></i>
            <p>Fique por dentro das novidades, tendências, promoções e muito mais</p>
            <a href="#" class="btn btn__outline">seguir</a>
        </div>

        <!-- INSPIRATION
        <section class="inspiration section container">
            <h1 class="section__title">Galeria</h1>
            <div class="inspiration__content">
                <div class="inspiration__info">
                    <h2>Siga <a href="#">la<span>Music</span></a> no</h2>
                    <h3>Instagram</h3>
                    <i class='bx bxl-instagram'></i>
                    <p>Fique por dentro das novidades, tendências, promoções e muito mais</p>
                    <a href="#" class="btn btn__outline">seguir</a>
                </div>
                <div class="inspiration__img swiper-container" id="inspiration-img">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="assets/img/galeria/bass-guitar-1841186.jpg" width="300" height="472" >
                        </div>
                        <div class="swiper-slide">
                            <img src="assets/img/inpiracao/inspiracao-2.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="assets/img/inpiracao/inspiracao-3.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="assets/img/inpiracao/inspiracao-4.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="assets/img/inpiracao/inspiracao-5.jpg" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section> -->
        <!-- INSPIRATION END -->

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
                    <li><a href="about.php">sobre a laMusic</a></li>
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
</body>

</html>