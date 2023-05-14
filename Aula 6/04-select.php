<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sin143";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

/*
// Insert
$sql = "INSERT INTO aluno (Nome, Telefone, Email) VALUES 
        ('Princesa Padme', '(77)77777-7777', 'padme@ufv.br')";
if ($conn->query($sql) === TRUE) {
    echo "Novo registro criado com sucesso.<br>";
} else {
    echo "Erro: $sql<br>".$conn->error."<br>";
}
*/

/*
// Delete
$sql = "DELETE FROM aluno WHERE ID = 11";

if ($conn->query($sql) === TRUE) {
    echo "Registro apagado com sucesso.<br>";
} else {
    echo "Erro ao apagar um registro: $sql<br>".$conn->error."<br>";
}
*/

/*
// Update
$sql = "UPDATE aluno SET Nome = 'Jar Jar Binks', Email = 'messalikeit@gmail.com'
        WHERE ID=1";
if ($conn->query($sql) === TRUE) {
    echo "Registro atualizado com sucesso.<br>";
} else {
    echo "Erro: $sql<br>".$conn->error."<br>";
}
*/

// Select e imprime
$sql = "SELECT * FROM aluno";
$result = $conn->query($sql);

#echo "<pre>";
#var_dump($result);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: ". $row['ID']." - Name: ".$row['Nome'].
        " - Phone: ".$row['Telefone']." - Email: ".$row['Email']."<br>";
    }
} else {
    echo "0 resultados.";
}

$conn->close();
?>