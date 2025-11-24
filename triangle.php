<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generagor del triangulo</title>
    <link rel="stylesheet" href="css.css">

</head>

<body>
    <h1>Generador de Triangulo</h1>
    <nav class="nav">
        <a href="biblioteca.php">Biblioteca</a>
        <a href="index.php">Index</a>
        <a href="triangle.php">Generador de Triangulo</a>
    </nav>

</body>
<?php require("clases/TriangleGenerator.php"); ?>
<h1>Generador de Triangulo</h1>
<p>Introduce un numero mayor que 0, caso contrario no va a aparecer nada.</p>
<form method="post">
    <label for="altura">Altura del Triangulo</label>
    <input type="number" id="altura" name="altura">
    <button type="submit">Generar</button>

    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $altura = intval($_POST['altura']);

        $triangulo = generateTriangle($altura);

        echo '<br>';
        echo '<div class="triangle">';
        echo $triangulo;
        echo '</div>';
    }

    ?>



</form>


</html>