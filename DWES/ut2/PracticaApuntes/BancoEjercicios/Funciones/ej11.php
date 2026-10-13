<?php
$generos = ['terror', 'fantasía', 'ciencia ficción', 'novela negra', 'romántica'];

$clave = array_search(
    'terror',
    $generos,
    true,
);

if($clave !== false){
    echo $clave;
} else {
    echo 'No encontrado';
}