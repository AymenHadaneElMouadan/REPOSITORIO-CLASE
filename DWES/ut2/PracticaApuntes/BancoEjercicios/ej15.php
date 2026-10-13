<?php

$catalogo = [
    10 => ['titulo' => 'La Celestina', 'autor' => 'Lorca'],
    20 => ['titulo' => '1984', 'autor'=>'George Orwell'],
    30 => ['titulo' => 'Dune', 'autor' => 'Frank Herbert'],
];

$catalogoOrdenado = uasort(
    $catalogo, 
    fn(array $a, array $b): int =>
    $a['titulo'] <=> $b['titulo'],
);