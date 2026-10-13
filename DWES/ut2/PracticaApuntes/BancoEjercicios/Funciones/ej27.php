<?php

$libros = [
 ['id' => 1, 'titulo' => 'Dune', 'paginas' => 412],
 ['id' => 2, 'titulo' => 'It', 'paginas' => 1504],
];
$textoBusqueda= 'Dune';

$busqueda = mb_strtolower(trim($textoBusqueda), 'UTF-8');
$visibles = array_filter(
    $libros, fn (array $l): bool => str_contains(
    mb_strtolower(($l['titulo']), 'UTF-8'), $busqueda
 )
);
usort($libros, fn (array $a, array $b): int => $a['paginas'] <=> $b['paginas']);
$titulos = array_column($libros, 'titulo');
$etiquetas = array_map(fn (string $t): string => "Libro: $t", $titulos);


$libro = array_find(
    $libros,
    fn(array $libros): bool => $libros['id'] === 2
);

echo $libro['titulo'];