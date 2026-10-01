<?php
    
require_once __DIR__ . '/../src/datos.php';
require_once __DIR__ . '/../src/funciones.php';

foreach($libros as $libro){
    echo $libro;
}

$genero = $_GET['genero'] ?? ' ';
$disponible = $_GET['disponible'] ?? true;

$titulo = $_GET['titulo'] ?? ' ';
$autor = $_GET['autor'] ?? ' ';





?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

    
</body>
</html>