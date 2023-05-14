<?php
// Conexão com orientação a objetos
$servername = "localhost";
$username = "root";
$password = "";

// Criar uma conexão

$conn = mysqli_connect($servername, $username, $password);

// Verificar a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

echo "Conexão bem sucedida!";

mysqli_close($conn);
?>