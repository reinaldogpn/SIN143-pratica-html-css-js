<html>
    <head>
        <meta charset="UTF-8">
        <title>Prática PHP-MySQL</title>
        <link rel="stylesheet" href="style-index.css">
        <script src="script.js"></script>
    </head>
    <body>
        <div class="formulario">
            <form name="inserir" id="inserir" action="process.php" method="post">

                <h3>Inserir novo registro:</h3>
                <label for="name">Nome:&nbsp;</label>
                <input type="text" name="name" id="name">
                <br><br>
                <label for="phone">Telefone:&nbsp;</label>
                <input type="text" name="phone" id="phone" class="telefone">
                <br><br>
                <label for="email">Email:&nbsp;</label>
                <input type="text" name="email" id="email">
                <br><br>
                <label for="street">Rua:&nbsp;</label>
                <input type="text" name="street" id="street">
                <br><br>
                <label for="number">Número:&nbsp;</label>
                <input type="text" name="number" id="number">
                <br><br>
                <label for="district">Bairro:&nbsp;</label>
                <input type="text" name="district" id="district">
                <br><br>
                <label for="city">Cidade:&nbsp;</label>
                <input type="text" name="city" id="city">
                <br><br>
                <label for="state">Estado:&nbsp;</label>
                <input type="text" name="state" id="state">

                <div class="insert-button">
                    <input class="botao" type="submit" value="Inserir" onclick="return validarFormulario();">
                </div>

            </form>
        </div>

        <div class="tabela">
            <h3>Últimos registros:</h3>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "universidade";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }
                
                $sql = "SELECT id, nome FROM aluno ORDER BY id DESC LIMIT 10";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Nome</th></tr>";
                
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "</tr>";
                    }
                
                    echo "</table>";
                } else {
                    echo "Nenhum registro encontrado.";
                }
                
                $conn->close();
            ?>
        </div>

        <div class="show-all-button">
            <a href="view.php" class="botao">Visualização completa</a>
        </div>

    </body>
</html>