<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $numbers = $_POST["numbers"];
        $numCount = count($numbers);
        $total = 0;

        foreach ($numbers as $number) {
            // Verifica se o valor é numérico antes de somar
            if (is_numeric($number)) {
                $total += $number;
            } else {
                echo "Por favor, digite apenas valores numéricos válidos.";
                return;
            }
        }

        $media = $total / $numCount;
        echo "A média é: " . $media;
    } 
?>
