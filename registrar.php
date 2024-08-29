<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pergunta</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
<a href="../../index.php">< Voltar</a>

    <center>
        <h1>Cadastrar pergunta</h1>
        <form method="POST" function="#">
            <input type="text" placeholder="texto da pergunta" name="texto_pergunta" />
            <br>
            <input type="text" placeholder="resposta certa (tem que ser em letra maiuscula)" name="resposta_correta" maxlength="1" required/>
            <br>
            <input type="text" placeholder="opção 1" name="opcao_1" required/>
            <br>
            <input type="text" placeholder="opção 2" name="opcao_2" required/>
            <br>
            <input type="text" placeholder="opção 3" name="opcao_3" required/>
            <br>
            <input type="text" placeholder="opção 4" name="opcao_4" required/>
            <br>
            <button type="submit">Cadastrar Pergunta</button>
        </form>
    </center>
</body>
</html>
<?php
require_once __DIR__.'/../../config.php';
require_once __DIR__.'/../../controller/QuizController.php';
if(isset($_POST)){
    $esporteController = new QuizController($pdo);

    $esporteController->criarPergunta($_POST['texto_pergunta'],$_POST['resposta_correta'],$_POST['opcao_1'],$_POST['opcao_2'],$_POST['opcao_3'],$_POST['opcao_4']);
}