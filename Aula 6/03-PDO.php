<?php
// Conexão com orientação a objetos
$servername = "localhost";
$username = "root";
$password = "";

try {
    // Criar uma conexão
    $conn = new PDO("mysql:host=$servername;dbname=sin143", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem sucedida.";
} catch(PDOException $e) {
    echo "Conxeão falhou: " . $e->getMessage();
}

$conn = null;
?>