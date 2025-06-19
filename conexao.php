<?php

$runDbScript;
$conn;

$runDbScript = __DIR__ . '/create-db.py';
$output = shell_exec("python3 $runDbScript");

try {
$conn = new PDO('sqlite:' . __DIR__ . '/db/myappdb.db');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
// captura e exibe o erro
echo "Erro: " . $e->getMessage();
}

return $conn;

?>