<?php

require_once __DIR__ . '/../BancoEjercicios/datos.php';

$clave = array_search(
    'ciencia ficción',
    $libros = array_column($libros, 'genero'),
    true,
    );

echo $clave;