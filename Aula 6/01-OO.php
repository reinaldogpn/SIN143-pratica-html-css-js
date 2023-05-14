<?php
// Conexão com orientação a objetos
$servername = "localhost";
$username = "root";
$password = "";

// Criar uma conexão

$conn = new mysqli($servername, $username, $password);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

echo "Conexão bem sucedida!";

$conn->close();
?>