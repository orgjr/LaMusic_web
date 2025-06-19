<?php 
    include ("conexao.php"); 
?>
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login e Cadastro</title>

    <!-- Bootstrap CSS -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Favicon -->

    <link rel="shortcut icon" href="assets/img/guitarFavicon.png" type="image/x-icon">

    <!-- Link BoxIcons -->

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Link Swiper's CSS -->

    <link rel="stylesheet" href="assets/css/swiper-bundle.css" />

    <!-- Link CSS Style -->

    <link rel="stylesheet" href="assets/css/style.css">



  <style>

    /*--------------------COLORS-----------------------------*/

    :root {

      --primary-color: #3d572f;

      --primary-color-alt: #96d674;

      --secondary-color: #eeeeee;

      --secondary-color-alt: #dcdcdc;

      --black-color: #0f0f0f;

      --white-color: #ffffff;

    }



    /*---------------FONT  AND TYPOGRAPHY-------------------*/

    :root {

      --font-body: "Raleway", sans-serif;

      --font-title: "Anton", sans-serif;

      --font-cursive: "Satisfy", cursive;

      --big-font-size: 3rem; /*48px*/

      --h1-font-size: 2.25rem; /*36px*/

      --h2-font-size: 1.5rem; /*24px*/

      --h3-font-size: 1.25rem; /*20px*/

      --normal-font-size: 1rem; /*16px*/

      --small-font-size: 0.813rem; /*12px  0.938rem  14*/

    }



    /*---------------FONT WEIGHT-------------------*/

    :root {

      --font-light: 300;

      --font-regular: 400;

      --font-medium: 500;

      --font-semibold: 600;

      --font-bold: 700;

      --font-extrabold: 800;

    }



    /*---------------MARGINS-------------------*/

    :root {

      --mb-05: 0.5rem;

      --mb-1: 1rem;

      --mb-1-5: 1.5rem;

      --mb-2: 2rem;

      --mb-2-5: 2.5rem;

      --mb-3: 3rem;

    }



    /*---------------Z INDEXS-------------------*/

    :root {

      --Z-fixed: 100;

      --z-tooltip: 10;

    }



    *,

    ::before,

    ::after {

      padding: 0;

      margin: 0;

      box-sizing: border-box;

    }



    html {

      scroll-behavior: smooth;

    }



    body {

      background-color: var(--white-color);

      font-family: var(--font-body);

      font-size: var(--normal-font-size);

      overflow-x: hidden;

    }



    a {

      text-decoration: none;

    }



    ul {

      list-style: none;

    }



    .container {

      max-width: 1200px;

      margin: 0 auto;

    }



    .section {

      padding: 6rem 6%;

    }



    .section__title {

      font-size: var(--h1-font-size);

      text-align: center;

      font-weight: var(--font-medium);

      text-transform: uppercase;

    }



    /* BUTTON */

    .btn {

      width: 100%;

      height: 50px;

      display: flex;

      align-items: center;

      justify-content: center;

      outline: none;

      background-color: var(--primary-color);

      border: none;

      color: var(--white-color);

      font-size: var(--small-font-size);

      font-weight: var(--font-extrabold);

      text-transform: uppercase;

      padding: 0.5rem;

      cursor: pointer;

      transition: all 400ms ease-in-out;

    }

    .btn:hover {

      background-color: var(--primary-color-alt);

      color: var(--black-color);

    }

    .btn__outline {

      background-color: var(--white-color);

      border: 1px solid var(--primary-color);

      color: var(--black-color);

    }

  </style>

</head>

<body>

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
                    <a href="#"><i class='bx bx-user'></i></a>
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

  <div class="container mt-5">

    <div class="row justify-content-center">

 <!-- Login -->
<div id="loginSection" class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-header" style="background-color: var(--primary-color); color: var(--white-color);">
            Login
        </div>
        <div class="card-body">
            <form id="loginForm">
                <div class="form-group">
                    <label for="loginEmail">Email:</label>
                    <input type="email" class="form-control" id="loginEmail" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Senha:</label>
                    <input type="password" class="form-control" id="loginPassword" required>
                </div>
                <button type="submit" class="btn">Entrar</button>
            </form>
        </div>
    </div>
    <p class="text-center">Ainda não tem uma conta? <a href="#" id="toggleSignup">Cadastre-se</a></p>
</div>

<!-- Cadastro -->
<div id="signupSection" class="col-md-6 offset-md-3" style="display: none;">
    <div class="card">
        <div class="card-header" style="background-color: var(--primary-color); color: var(--white-color);">
            Cadastro
        </div>
        <div class="card-body">
            <form id="registerForm">
                <div class="form-group">
                    <label for="registerName">Nome:</label>
                    <input type="text" class="form-control" id="registerName" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Email:</label>
                    <input type="email" class="form-control" id="registerEmail" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Senha:</label>
                    <input type="password" class="form-control" id="registerPassword" required>
                </div>
                <!-- Adicione os outros campos aqui conforme necessário -->
                <button type="submit" class="btn">Cadastrar</button>
            </form>
        </div>
    </div>
    <p class="text-center">Já tem uma conta? <a href="#" id="toggleLogin">Faça login</a></p>
</div>


<!-- Cadastro -->
<div class="col-md-8">
    <div class="card">
        <div class="card-header" style="background-color: var(--primary-color); color: var(--white-color);">
            Cadastro
        </div>
        <div class="card-body">
            <form id="registerForm" action="register.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerName">Nome:</label>
                            <input type="text" class="form-control" id="registerName" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerEmail">Email:</label>
                            <input type="email" class="form-control" id="registerEmail" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerPassword">Senha:</label>
                            <input type="password" class="form-control" id="registerPassword" name="password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerPhone">Telefone:</label>
                            <input type="text" class="form-control" id="registerPhone" name="phone">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerGender">Gênero:</label>
                            <select class="form-control" id="registerGender" name="gender">
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerBirthday">Data de Aniversário:</label>
                            <input type="date" class="form-control" id="registerBirthday" name="birthday">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerCEP">CEP:</label>
                            <input type="text" class="form-control" id="registerCEP" name="cep">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerStreet">Rua:</label>
                            <input type="text" class="form-control" id="registerStreet" name="street">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerNumber">Número:</label>
                            <input type="text" class="form-control" id="registerNumber" name="number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerNeighborhood">Bairro:</label>
                            <input type="text" class="form-control" id="registerNeighborhood" name="neighborhood">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="registerCity">Cidade:</label>
                            <input type="text" class="form-control" id="registerCity" name="city">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn">Cadastrar</button>
            </form>
            <div id="registerMessage" style="display: none;"></div> <!-- Mensagem de feedback -->
        </div>
    </div>
</div>




<script>
  // Função para exibir mensagem de feedback
  function showMessage(messageElement, message, isSuccess) {
    messageElement.innerText = message;
    messageElement.style.display = 'block';
    messageElement.style.color = isSuccess ? 'green' : 'red';
  }

  // Event listener para o formulário de login
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio do formulário padrão
    // Simulação de login
    var email = document.getElementById('loginEmail').value;
    var password = document.getElementById('loginPassword').value;
    // Aqui você deve fazer a validação do login no lado do servidor
    // Suponha que a validação seja bem-sucedida
    showMessage(document.getElementById('loginMessage'), 'Login bem-sucedido!', true);
    // Ou, se a validação falhar, mostre uma mensagem de erro:
     showMessage(document.getElementById('loginMessage'), 'Email ou senha inválidos', false);
  });

 // Event listener para o formulário de cadastro
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio do formulário padrão
    
    // Obtém os dados do formulário
    var formData = new FormData(this);
    
    // Faz a requisição POST para o script PHP que irá lidar com o cadastro
    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Verifica se a resposta do servidor indica sucesso
        if (data === 'success') {
            showMessage(document.getElementById('registerMessage'), 'Cadastro bem-sucedido!', true);
        } else {
            showMessage(document.getElementById('registerMessage'), 'Falha ao cadastrar. Tente novamente mais tarde.', false);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        showMessage(document.getElementById('registerMessage'), 'Erro ao conectar ao servidor. Tente novamente mais tarde.', false);
    });
});

// Função para exibir mensagens
function showMessage(element, message, success) {
    element.innerText = message;
    element.style.display = 'block';
    if (success) {
        element.style.color = 'green';
    } else {
        element.style.color = 'red';
    }
}

</script>



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



  <script>

    $(document).ready(function(){

      // Ação de login

      $("#loginForm").submit(function(event){

        event.preventDefault();

        var email = $("#loginEmail").val();

        var password = $("#loginPassword").val();

        // Aqui você pode adicionar a lógica de autenticação do usuário

      });



      // Ação de cadastro

      $("#registerForm").submit(function(event){

        event.preventDefault();

        var name = $("#registerName").val();

        var email = $("#registerEmail").val();

        var password = $("#registerPassword").val();

        // Aqui você pode adicionar a lógica para enviar os dados do formulário para o backend

      });

    });

  </script>

</body>

</html>

