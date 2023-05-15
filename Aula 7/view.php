<html>
    <head>
        <meta charset="UTF-8">
        <title>Visualização completa</title>
        <link rel="stylesheet" href="style-view.css">
    </head>
    <body>
        <h3>Registros no banco de dados:</h3>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "universidade";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            $sql = "SELECT id, nome, telefone, email, cidade, estado, bairro, rua, numero
                    FROM aluno JOIN endereco ON aluno.endereco = endereco.endereco_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Exibe os registros em uma tabela
                echo "<table>";
                echo "<tr><th>ID</th><th>Nome</th><th>Telefone</th><th>Email</th><th>Endereço</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["telefone"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["rua"] . ", " . $row["numero"] . ", " . $row["bairro"] . ", " . $row["cidade"] . " - " . $row["estado"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

            } else {
                echo "Nenhum registro encontrado.";
            }

            $conn->close();
        ?>

        <a href="index.php">Página inicial</a>
    </body>
</html>