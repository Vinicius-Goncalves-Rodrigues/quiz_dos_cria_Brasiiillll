<?php
include __DIR__."/config.php";
include __DIR__."/controller/QuizController.php";

$quizController = new QuizController($pdo);

if(isset($_POST['vez_do_time'])){
    $jogo_id = $_POST['jogo_id'];
    $vez_do_time = $_POST['vez_do_time'];
}
else{
    $todasPerguntas = $quizController->listarPerguntasId();
    shuffle($todasPerguntas);
    $perguntas_restantes = array_slice($todasPerguntas, 0, sizeof($todasPerguntas) - $_POST['total_perguntas']);
    $perguntaId = $perguntas_restantes[sizeof($perguntas_restantes)-1]['id'];

    $jogo_id = $quizController->criarJogo($_POST['total_perguntas'], $perguntaId, 0,0,$perguntas_restantes);
    $vez_do_time = 2;

}

$jogo_info = $quizController->listarJogoPorId($jogo_id);

$perguntaId = $jogo_info['pergunta_atual_id'];
$pergunta = $quizController->listarPerguntaPorId($jogo_info['pergunta_atual_id']);
$pontuacao_time_1 = $jogo_info['pontuacao_time_1'];
$pontuacao_time_2 = $jogo_info['pontuacao_time_2'];

switch($vez_do_time){
    case 1:
        $vez_do_time = 2;
        break;
    case 2:
        $vez_do_time = 1;
        break;
}
if(isset($_POST['pergunta_anterior_id'])){
    $pergunta_anterior = $quizController->listarJogoPorId($_POST['pergunta_anterior_id']);
    if (ucfirst($_POST['resposta_selecionada']) == $pergunta_anterior['resposta_certa']){
        switch($vez_do_time){
            case 1:
                $pontuacao_time_2 += 1;
                break;
            case 2:
                $pontuacao_time_1 += 1;
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interface</title>
    <link rel="stylesheet" href="inicial.css">
</head>

<body>
    <header>
        <p class="time um"><?="TIME 1: $pontuacao_time_1"?></p>
        <h3><?="VEZ DO TIME $vez_do_time"?></h3>
        <p class="time is"><?="TIME 2: $pontuacao_time_2"?></p>
    </header>
    <form method="POST" class="container-quiz"><h1>1-Quais são as cinco regiões do Brasil?</h1>
    <h4>perguntas restantes: <?=sizeof($perguntas_restantes)?></h4>

        <div><input type="radio" name="resposta_selecionada" value="A"><h1>A)</h1><?=$pergunta['opcao_1']?></div>
        <div><input type="radio" name="resposta_selecionada" value="B"><h1>B)</h1><?=$pergunta['opcao_2']?></div>
        <div><input type="radio" name="resposta_selecionada" value="C"><h1>C)</h1><?=$pergunta['opcao_3']?></div>
        <div><input type="radio" name="resposta_selecionada" value="D"><h1>D)</h1><?=$pergunta['opcao_4']?></div>

        <input type="hidden" name="jogo_id" value="<?=$jogo_id?>">
        <input type="hidden" name="vez_do_time" value="<?=$vez_do_time?>">
        <input type="hidden" name="pergunta_anterior_id" value="<?=$perguntaId?>">
        <button><strong>🔥ENVIAR🔥</strong></button>
    </form>
</body>

</html>