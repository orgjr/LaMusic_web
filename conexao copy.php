<?php

// Configurações de conexão com o banco de dados
$servername = "devweb8sql.mysql.dbaas.com.br";
$username = "devweb8sql";
$password = "m2023FaTEC#321";
$database = "devweb8sql";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>