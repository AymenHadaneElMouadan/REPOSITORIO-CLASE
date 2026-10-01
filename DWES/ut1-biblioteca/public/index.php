<?php

require_once __DIR__ . '/../public/datos.php';

$libro = array_find(
    $libros,
    fn(array $l): bool => $l['id'] === 3,
);

echo $libro;