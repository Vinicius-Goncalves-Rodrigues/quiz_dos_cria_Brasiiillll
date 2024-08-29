<?php



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
        <p><?="TIME 1: $pontos_time1"?></p>
        <h3><?="VEZ DO TIME $vez_do_time"?></h3>
        <p><?="TIME 2: $pontos_time2"?></p>
    </header>
    <form method="POST" class="container-quiz"><h1>1-Quais são as cinco regiões do Brasil?</h1>

        <div><input type="radio" name="resposta_selecionada" value="A"><h1>A)</h1>NORTE, NORDESTE, CENTRO OESTE, SUDESTE, SUL.</div>
        <div><input type="radio" name="resposta_selecionada" value="B"><h1>B)</h1>NORTE, NORDESTE, LESTE, CENTRO-OESTE, SUL</div>
        <div><input type="radio" name="resposta_selecionada" value="C"><h1>C)</h1>NORTE, OESTE, NORDESTE,SUL, CENTRO-OESTE</div>
        <div><input type="radio" name="resposta_selecionada" value="D"><h1>D)</h1>SUL, LESTE, CENTRO-OESTE, NORDESTE, NORTE</div>

        <button><strong>🔥ENVIAR🔥</strong></button>
    </form>
</body>

</html>