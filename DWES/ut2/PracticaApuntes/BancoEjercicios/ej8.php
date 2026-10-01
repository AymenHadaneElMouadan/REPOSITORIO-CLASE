<?php

require_once __DIR__ . '/../BancoEjercicios/datos.php';

$libro = array_find(
    $libros,
    fn(array $libro): bool => $libro['id'] === 3,
);

echo $libro;