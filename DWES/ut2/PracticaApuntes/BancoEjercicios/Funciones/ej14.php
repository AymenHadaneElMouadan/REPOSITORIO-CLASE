<?php
 require_once __DIR__ . '/../BancoEjercicios/datos.php';

$listaOrdenadaAsc = usort(
    $libros, 
    fn(array $a, array $b): int => $a['paginas'] <=> $b['paginas']
);