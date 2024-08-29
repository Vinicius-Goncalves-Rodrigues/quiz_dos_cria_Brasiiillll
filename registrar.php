<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pergunta</title>
</head>

<body>
<a href="index.html">< Voltar</a>

    <center>
        <h1>Cadastrar pergunta</h1>
        <form method="POST" function="#">
            <input type="text" placeholder="texto da pergunta" name="texto_pergunta" />
            <br>
            <select name="resposta_correta">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
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
require_once __DIR__.'/config.php';
require_once __DIR__.'/controller/QuizController.php';
if(isset($_POST["opcao_4"])){
    $esporteController = new QuizController($pdo);

    $esporteController->criarPergunta($_POST['texto_pergunta'],$_POST['resposta_correta'],$_POST['opcao_1'],$_POST['opcao_2'],$_POST['opcao_3'],$_POST['opcao_4']);
}