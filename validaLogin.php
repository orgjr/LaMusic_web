<?php

include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? null;
    $senha = $_POST['senha'] ?? null;

    if (!$email || !$senha) {
        echo "Por favor, preencha todos os campos.";
        exit();
    }

    include("conexao.php");

    // Prepara e executa a consulta no banco
    $sql = "SELECT * FROM clientes WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Verifica a senha usando password_verify
        if (password_verify($senha, $row['senha'])) {
            echo "Login bem sucedido!";
            header("Location: pagamento.php");
            exit();
        } else {
            echo "Email ou senha incorretos.";
        }
    } else {
        echo "Email ou senha incorretos.";
    }

    // Fechar conexão com o banco de dados
    $conn = null;
}
?>