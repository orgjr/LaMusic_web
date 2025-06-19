<?php
// incluindo o arquivo de conexão
include("conexao.php");



// Verificando se os dados do formulário foram recebidos corretamente
if(isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['telefone'], $_POST['genero'], $_POST['data_aniversario'], $_POST['cep'], $_POST['rua'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'])) {
    
    // Recebendo os dados do formulário
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
    
    // Preparando a consulta SQL de inserção
    $sql = "INSERT INTO clientes (nome, email, senha, telefone, genero, data_aniversario, cep, rua, numero, bairro, cidade) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparando a declaração SQL
    $stmt = $conn->prepare($sql);
    
    // Verificando se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        echo "Erro ao preparar a consulta SQL: " . $conn->error;
        exit;
    }
    
    // Vinculando parâmetros
    $stmt->bind_param("sssssssssss", $nome, $email, $senha, $telefone, $genero, $data_aniversario, $cep, $rua, $numero, $bairro, $cidade);
    
    // Executando a consulta
    if ($stmt->execute()) {
        echo "Novo registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . $stmt->error;
    }
    
    // Fechando a declaração
    $stmt->close();
} else {
    echo "Erro: Todos os campos do formulário devem ser preenchidos.";
}

// Fechando a conexão
$conn->close();
?>
