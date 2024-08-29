<?php
require_once __DIR__."/config.php";
require_once __DIR__."/controller/QuizController.php";

$quizController = new QuizController($pdo);

$jogo = $quizController->listarResultadoPorId($quizController->getLatestResultadoId());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINAL DO JOGO!</title>
</head>
<body>
    <a href="index.html">< voltar</a>
    <?php
    switch($jogo[0]["vencedor"]){
        case "time_1":
            echo"<h1>TIME VERDE GANHOU!!!!!!!</h1>";
            break;
        case "time_2":
            echo"<h1>TIME VERDE GANHOU!!!!!!!</h1>";
            break;
        case "empate":
            echo "<h1>foi empate...</h1>";
            break;
    }
    ?>
    <h3>pontuação do time verde: <?=$jogo[0]["pontuacao_final_time_1"]?></h3>
    <h3>pontuação do time azul: <?=$jogo[0]["pontuacao_final_time_2"]?></h3>
    </body>
</html>