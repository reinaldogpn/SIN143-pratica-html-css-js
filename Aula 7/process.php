<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universidade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$name = $_POST["name"];
$telefone = $_POST["phone"];
$email = $_POST["email"];
$rua = $_POST["street"];
$numero = $_POST["number"];
$bairro = $_POST["district"];
$cidade = $_POST["city"];
$estado = $_POST["state"];

// Insere o endereço na tabela "endereco"
$stmt = $conn->prepare("INSERT INTO endereco (cidade, estado, bairro, rua, numero) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $cidade, $estado, $bairro, $rua, $numero);
$stmt->execute();

// Obtém o ID do endereço que acabou de ser inserido
$endereco_id = $stmt->insert_id;

// Insere o aluno na tabela "aluno"
$stmt = $conn->prepare("INSERT INTO aluno (nome, telefone, email, endereco) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $name, $telefone, $email, $endereco_id);
$stmt->execute();

// Fecha a conexão com o banco de dados
$conn->close();

// Redireciona para a página de confirmação
header("Location: index.php");
exit;
?>