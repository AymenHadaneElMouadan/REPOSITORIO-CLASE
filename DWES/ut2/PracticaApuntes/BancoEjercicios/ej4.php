<?php

require_once __DIR__ . '/../BancoEjercicios/datos.php';



$disponibles = array_filter(
    $libros,
    fn (array $libros):bool => $libros['disponible'] === true,
);

