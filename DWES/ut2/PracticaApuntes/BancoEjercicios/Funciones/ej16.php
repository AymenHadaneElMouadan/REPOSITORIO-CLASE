<?php
$texto = 'Desarrollo Web con PHP';

$comprobacion = str_contains($texto, 'PHP');
var_dump($comprobacion);

$posicion = strpos($texto, 'PHP');
var_dump($posicion);


if (strpos($texto, 'Desarrollo') !== false){  
    echo 'Encontrado';
}