<?php
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $formOk = true;

    if (trim($nome) == "" || trim($idade) == "") {
        $formOk = false;
    }
?>

<html>
    <head>
        <title>Aula de PHP</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="resposta">
            <?php
                if ($formOk == true) { 
                    echo "Olá $nome, feliz $idade anos!";
                } else {
                    echo "Parece que você esqueceu algum campo, retorne e preencha corretamente.";
                }
                echo "<br><a href='index.html'>Retornar a página anterior.</a>";
            ?>
        </div>
    </body>
</html>