<?php 

    include ("conexao.php");
    include ("header.php");
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
  <!-- Link Login CSS Style -->
  <link rel="stylesheet" href="assets/css/loginStyle.css">
</head>
<body>




    <div class="container">

    <div class="row justify-content-center mt-5">

        <!-- Login -->

        <div id="loginSection" class="col-md-6">

            <div class="card">

                <div class="card-header" style="background-color: var(--primary-color); color: var(--white-color);">

                    Login

                </div>

                <div class="card-body">

                    <form id="loginForm" action="validaLogin.php" method="POST">

                        <div class="form-group">

                            <label for="loginEmail">Email:</label>

                            <input type="email" class="form-control" id="loginEmail" name="email">

                        </div>

                        <div class="form-group">

                            <label for="loginPassword">Senha:</label>

                            <input type="password" class="form-control" id="loginPassword" name="senha">

                        </div>

                        <button type="submit" class="btn">Entrar</button>

                    </form>

                </div>

            </div>


		<!-- Div para a mensagem de boas-vindas -->
    			<div id="welcomeMessage" style="display: none;">
        		<h3>Bem-vindo!</h3>
		        <!-- Adicione aqui a anima��o de boas-vindas -->
               </div>



            <p class="text-center mt-3">Ainda não tem uma conta? <a href="#" id="toggleSignup">Cadastre-se</a></p>

        </div>

    </div>




    <div class="row justify-content-center mt-5">

        <!-- Cadastro -->

        <div id="signupSection" class="col-md-8" style="display: none;">

            <div class="card">

                <div class="card-header" style="background-color: var(--primary-color); color: var(--white-color);">

                    Cadastro

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <form id="registerForm">

                                <div class="form-group">

                                    <label for="registerName">Nome:</label>

                                    <input type="text" class="form-control" id="registerName" name="nome" required>

                                </div>

                                <div class="form-group">

                                    <label for="registerEmail">Email:</label>

                                    <input type="email" class="form-control" id="registerEmail" name="email" required>

                                </div>

                                <div class="form-group">

                                    <label for="registerPassword">Senha:</label>

                                    <input type="password" class="form-control" id="registerPassword" name="senha" required>

                                </div>

                                <div class="form-group">

                                    <label for="registerPhone">Telefone:</label>

                                    <input type="text" class="form-control" id="registerPhone" name="telefone">

                                </div>

                                <div class="form-group">

                                    <label for="registerGender">Gênero:</label>

                                    <select class="form-control" id="registerGender" name="genero">

                                        <option value="Masculino">Masculino</option>

                                        <option value="Feminino">Feminino</option>

                                        <option value="Outro">Outro</option>

                                    </select>

                                </div>

                           

                        </div>

                        <div class="col-md-6">

                            

                                <div class="form-group">

                                    <label for="registerBirthday">Data de Aniversário:</label>

                                    <input type="date" class="form-control" id="registerBirthday" name="data_aniversario">

                                </div>

                                <div class="form-group">

                                    <label for="registerCEP">CEP:</label>

                                    <input type="text" class="form-control" id="registerCEP" name="cep">

                                </div>

                                <div class="form-group">

                                    <label for="registerStreet">Rua:</label>

                                    <input type="text" class="form-control" id="registerStreet" name="rua">

                                </div>

                                <div class="form-group">

                                    <label for="registerNumber">Número:</label>

                                    <input type="text" class="form-control" id="registerNumber" name="numero">

                                </div>

                                <div class="form-group">

                                    <label for="registerNeighborhood">Bairro:</label>

                                    <input type="text" class="form-control" id="registerNeighborhood" name="bairro">

                                </div>

                                <div class="form-group">

                                    <label for="registerCity">Cidade:</label>

                                    <input type="text" class="form-control" id="registerCity" name="cidade">

                                </div>

                                <button type="submit" class="btn">Cadastrar</button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            <p class="text-center mt-3">Já tem uma conta? <a href="#" id="toggleLogin">Faça login</a></p>

        </div>

    </div>

</div>







<script>


// Event listener para alternar entre login e cadastro
document.getElementById('toggleSignup').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('loginSection').style.display = 'none';
    document.getElementById('signupSection').style.display = 'block';
});

document.getElementById('toggleLogin').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('signupSection').style.display = 'none';
    document.getElementById('loginSection').style.display = 'block';
});



document.getElementById('loginForm2').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Envia os dados do formul�rio via AJAX
    var formData = new FormData(this);
    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Se o login for bem-sucedido, redireciona para a URL fornecida
            window.location.href = data.redirect; // Redireciona para a URL especificada no JSON
        } else {
            // Se o login falhar, exibe uma mensagem de erro (opcional)
            alert('Email ou senha inv�lidos');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});



// Event listener para o formul�rio de cadastro
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
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

// Fun��o para exibir mensagens
function showMessage(element, message, success) {
    element.innerText = message;
    element.style.display = 'block';
    element.style.color = success ? 'green' : 'red';
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











   



 



</body>



</html>



