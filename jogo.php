<?php
include __DIR__."/config.php";
include __DIR__."/controller/QuizController.php";

$quizController = new QuizController($pdo);

// checar se a pagina é redirecionada do propio jogo ou da pagina de inicio
if(isset($_POST['vez_do_time'])){
    $jogo_id = $_POST['jogo_id'];
    $vez_do_time = $_POST['vez_do_time'];
    $repassou = $_POST['repassou'];
}
else{
    $todasPerguntas = $quizController->listarPerguntasId();
    shuffle($todasPerguntas);
    $perguntas_restantes = array_slice($todasPerguntas, 0, ($_POST['total_perguntas']*2) - sizeof($todasPerguntas) );
    $perguntaId = $perguntas_restantes[sizeof($perguntas_restantes)-1]['id'];

    $jogo_id = $quizController->criarJogo(($_POST['total_perguntas']*2), $perguntaId, 0,0,$perguntas_restantes);
    $vez_do_time = 2;
    $repassou = 0;
}

// pegar info sobre o jogo da tabela quiz
$jogo_info = $quizController->listarJogoPorId($jogo_id);

$pontuacao_time_1 = $jogo_info['pontuacao_time_1'];
$pontuacao_time_2 = $jogo_info['pontuacao_time_2'];

$acabo_o_jogo = false;
// regressar na lista se o jogo foi redirecionado da pagina jogo.php
if(isset($_POST['vez_do_time'])){
    if($repassou < 1){
        $perguntas_restantes = $jogo_info['perguntas_restantes'];
        $perguntas_restantes = array_slice($perguntas_restantes, 0, sizeof($perguntas_restantes)-1);
        if(sizeof($perguntas_restantes) != 0){
            $perguntaId = $perguntas_restantes[sizeof($perguntas_restantes)-1]['id'];
        }else{
            $acabo_o_jogo = true;
        }
        $repassou = 0;
    }else{
        $repassou += 1;
        $perguntas_restantes = $jogo_info['perguntas_restantes'];
        $perguntaId = $perguntas_restantes[sizeof($perguntas_restantes)-1]['id'];
    }
}else{
    $perguntaId = $jogo_info['pergunta_atual_id'];
    $perguntas_restantes = $jogo_info['perguntas_restantes'];
}
// checa se o jogo ja acabou, se nao, executa o codigo da pagina de término
if(!$acabo_o_jogo){
    $pergunta = $quizController->listarPerguntaPorId($perguntaId);

    // trocar a vez do time 
    switch($vez_do_time){
        case 1:
            $vez_do_time = 2;
            break;
        case 2:
            $vez_do_time = 1;
            break;
    }
    // adicionar pontos se o time acertou a pergunta
    $acertou = false;
    if(isset($_POST['pergunta_anterior_id']) && isset($_POST['resposta_selecionada'])){
        $pergunta_anterior = $quizController->listarPerguntaPorId($_POST['pergunta_anterior_id']);
        if (ucfirst($_POST['resposta_selecionada']) == ucfirst($pergunta_anterior['resposta_certa'])){
            switch($vez_do_time){
                case 1:
                    $pontuacao_time_2 += 1;
                    $acertou = true;
                    break;
                case 2:
                    $pontuacao_time_1 += 1;
                    $acertou = true;
                    break;
            }
        }
    }

    //salvar as informações para a tabela do jogo.
    if(isset($_POST['vez_do_time'])){
        $quizController->atualizarJogo($jogo_id, $perguntaId, $pontuacao_time_1, $pontuacao_time_2, $perguntas_restantes);
    }
}else{
    // adicionar pontos se o time acertou a pergunta
    $acertou = false;
    if(isset($_POST['pergunta_anterior_id'])){
        $pergunta_anterior = $quizController->listarPerguntaPorId($_POST['pergunta_anterior_id']);
        if (ucfirst($_POST['resposta_selecionada']) == ucfirst($pergunta_anterior['resposta_certa'])){
            switch($vez_do_time){
                case 1:
                    $pontuacao_time_2 += 1;
                    $acertou = true;
                    break;
                case 2:
                    $pontuacao_time_1 += 1;
                    $acertou = true;
                    break;
            }
        }
    }
    $vencedor = "empate";
    if($pontuacao_time_1 == $pontuacao_time_2){
        $vencedor = "empate";
    }else{
        if($pontuacao_time_1 > $pontuacao_time_2){
            $vencedor = "time_1";
        }else{
            $vencedor = "time_2";
        }
    }
    $quizController->criarResultado($vencedor,$pontuacao_time_1, $pontuacao_time_2);

    header('Location: final.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interface</title>
    <link rel="stylesheet" href="assets/css/jogo.css">
</head>

<body>
    <header>
        <p class="time um"><?="TIME VERDE: $pontuacao_time_1"?></p>
        <h3 class="<?php if($vez_do_time == 1){echo"um";}else{echo"is";}?>">VEZ DO TIME: <strong><?php if($vez_do_time == 1){echo"VERDE";}else{echo"AZUL";}?></strong></h3>
        <p class="time is"><?="TIME AZUL: $pontuacao_time_2"?></p>
    </header>
    <h2 class="<?php
    //checa se é o primeiro turno de todos
    if(!isset($_POST['total_perguntas'])){
        if($vez_do_time == 1){
            echo"is";
        }else{
            echo"um";
        }
    }
    ?>">
    <?php
    $timestring = "VERDE";
    if($vez_do_time == 1){
        $timestring = "AZUL";
    }else{
        $timestring = "VERDE";
    }
    if($acertou){
        echo"TIME $timestring <p>ACERTOU!!!</p>";
    }else{
        echo"TIME $timestring <p class='errou'>ERROU!!!</p>";
    }
    ?>    
    </h2>
    <div class="container-quiz">
        <form method="POST">
            <h1><?=$pergunta["texto_pergunta"]?></h1>
            <h4>perguntas restantes: <?=sizeof($perguntas_restantes)?></h4>

            <div><input type="radio" name="resposta_selecionada" value="A" required><h1>A)</h1><?=$pergunta['opcao_1']?></div>
            <div><input type="radio" name="resposta_selecionada" value="B"><h1>B)</h1><?=$pergunta['opcao_2']?></div>
            <div><input type="radio" name="resposta_selecionada" value="C"><h1>C)</h1><?=$pergunta['opcao_3']?></div>
            <div><input type="radio" name="resposta_selecionada" value="D"><h1>D)</h1><?=$pergunta['opcao_4']?></div>

            <input type="hidden" name="repassou" value="0">
            <input type="hidden" name="jogo_id" value="<?=$jogo_id?>">
            <input type="hidden" name="vez_do_time" value="<?=$vez_do_time?>">
            <input type="hidden" name="pergunta_anterior_id" value="<?=$perguntaId?>">
            <button><strong>ENVIAR RESPOSTA</strong></button>
        </form>
        <form method="POST">
            <input type="hidden" name="eu_repassei" value="1">
            <input type="hidden" name="repassou" value="<?=$repassou+1?>">
            <input type="hidden" name="jogo_id" value="<?=$jogo_id?>">
            <input type="hidden" name="vez_do_time" value="<?=$vez_do_time?>">
            <input type="hidden" name="pergunta_anterior_id" value="<?=$perguntaId?>">
            <button class="repassar" <?php if($repassou>=3){echo"disabled";} ?> ><strong>REPASSAR</strong></button>
        </form>
    </div>
</body>

</html>