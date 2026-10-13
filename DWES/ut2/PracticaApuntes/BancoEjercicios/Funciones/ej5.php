<?php

require_once __DIR__ . '/../BancoEjercicios/datos.php';

$descripciones = array_map(
    fn (array $libros): string => "{$libros['titulo']} - {$libros['paginas']}",
    $libros,
);

foreach($descripciones as $descripcion){
    echo $descripcion;
}

$nuevos = array_map(
        fn(array $libros): array =>[
        ...$libros,
        'descripcion' => $descripciones
        ],
        $libros,
);


