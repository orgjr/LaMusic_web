<?php
// incluindo o arquivo de conex�o
include("conexao.php");



// Verificando se os dados do formul�rio foram recebidos corretamente
if(isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['telefone'], $_POST['genero'], $_POST['data_aniversario'], $_POST['cep'], $_POST['rua'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'])) {
    
    // Recebendo os dados do formul�rio
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_aniversario = $_POST['data_aniversario'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    
    // Preparando a consulta SQL de inser��o
    $sql = "INSERT INTO clientes (nome, email, senha, telefone, genero, data_aniversario, cep, rua, numero, bairro, cidade) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparando a declara��o SQL
    $stmt = $conn->prepare($sql);
    
    // Verificando se a prepara��o da consulta foi bem-sucedida
    if ($stmt === false) {
        echo "Erro ao preparar a consulta SQL: " . $conn->error;
        exit;
    }
    
    // Vinculando par�metros
    $stmt->bind_param("sssssssssss", $nome, $email, $senha, $telefone, $genero, $data_aniversario, $cep, $rua, $numero, $bairro, $cidade);
    
    // Executando a consulta
    if ($stmt->execute()) {
        echo "Novo registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . $stmt->error;
    }
    
    // Fechando a declara��o
    $stmt->close();
} else {
    echo "Erro: Todos os campos do formul�rio devem ser preenchidos.";
}

// Fechando a conex�o
$conn->close();
?>
