<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sei lá</title>
    <link rel="stylesheet" href="assets/css/testenoiteedia.css">
</head>
<body>
    <header>
        <a href="indexplay.html">< voltar</a>
        <div>
            <h3>vez do:</h3>
            <h1>TIME SOL</h1>
        </div>
    </header>
    <?php
    // pode ter tres valores, sunToMoon, moonToSun, ou startSun.
    if(isset($_GET["transition"])){
        include "assets/"/$_GET["transition"].".html";
    }else{
        include "assets/startSun.html";
    }
    ?>
</body>
</html>