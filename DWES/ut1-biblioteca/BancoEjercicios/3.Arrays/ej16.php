<?php

$libro = [
    'id' => 0002,
    'titulo' => 'Don Quijote',
    'autor' => 'Cervantes',
    'paginas' => 222,
    'disponible' => false,
];
$libro['disponible'] = 'true';

foreach($libro as $campo => $valor){
    echo "$campo: $valor<br>";
}