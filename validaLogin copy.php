<?php

include("conexao.php");

var_dump($_POST['senha']);

// Verifica se o método de requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Prepara os dados para consulta no banco
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Query para consultar no banco
    $sql = "SELECT * FROM clientes WHERE email='$email' AND senha='$senha'";

    // Executa a query
    $result = $conn->query($sql);

    // Verifica se o resultado da consulta retorna pelo menos uma linha
    if ($result !== false && $result->num_rows > 0) {
        echo "Login bem sucedido!";
	header("Location: pagamento.php");
        exit(); // Certifique-se de sair do script após o redirecionamento

   //	echo json_encode(['success' => true, 'redirect' => 'index.php']);

    } else {
        echo "Email ou senha incorretos.";
    }

  
}

// Fechar conexão com o banco de dados
$conn->close();
?>
