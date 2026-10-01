<?php

require_once __DIR__ . '/../BancoEjercicios/datos.php';

$suma = array_reduce(
    $libros, 
    fn(array $libros, int $total): int => $total + $libros['paginas'] , 0,
);