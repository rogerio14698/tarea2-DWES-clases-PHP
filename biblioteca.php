<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <style>
    .nav,
    a {
        text-decoration: none;
        font-size: 20px;
        padding: 10px
    }

    .table {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;

    }

    .table th,
    td {
        border: 1px solid black;
        padding: 5px;
    }
    </style>
</head>

<body>
    <h1>Biblioteca</h1>
    <nav class="nav">
        <a href="biblioteca.php">Biblioteca</a>
        <a href="index.php">Index</a>
        <a href="triangle.php">Generador de Triangulo</a>
    </nav>

    <?php 
    $libros = [
        "libro1" => [
            "titulo" => "PHP para Principiantes",
            "autor" => "Carlos Ruiz",
            "precio" => 19.99,
            "categoria" => "Desarrollo web"
        ],
        "libro2" => [
            "titulo" => "JavaScript Avanzado",
            "autor" => "Laura García",
            "precio" => 25.99,
            "categoria" => "Desarrollo web"
        ],
        "libro3" => [
            "titulo" => "Algoritmos en Python",
            "autor" => "Miguel Fernández",
            "precio" => 29.99,
            "categoria" => "Algoritmos"
        ],

    ]; ?>
    <h2>Información de los libros</h2>
    <table class="table">
        <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Precio</th>
            <th>Categoria</th>
        </tr>
        <?php foreach($libros as $libro): ?>
        <tr>
            <!--Esto es un array de arrays, no es un objeto que se hace una arrowfunction-->
            <td><?= $libro ["titulo"] ?></td>
            <td><?= $libro ["autor"] ?></td>
            <td><?= $libro ["precio"] ?></td>
            <td><?= $libro ["categoria"] ?></td>
        </tr>

        <?php endforeach; ?>
    </table>

    <h2>Libros perteneciendo a la categoria 'Desarrollo Web'</h2>

    <ol>
        <?php foreach($libros as $libro){
        if ($libro["categoria"] === "Desarrollo web"){
            echo "<li>{$libro["titulo"]}</li>";
        }
    } ?>
    </ol>


</body>

</html>