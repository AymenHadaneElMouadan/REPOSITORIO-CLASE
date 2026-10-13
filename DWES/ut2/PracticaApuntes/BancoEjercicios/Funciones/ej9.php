<?php
$libros = [
    "Cien años de soledad"     => 5,
    "Don Quijote de la Mancha" => 3,
    "1984"                     => 0,
    "El principito"            => 0,
    "La sombra del viento"     => 4,
];

$clave = array_find_key(
    $libros,
    fn(int $n): bool =>$n === 0
);

echo $clave;