<?php
$generosLiterarios = ['Historia', 'Fantasia', 'Terror', 'Aventura', 'Romance'];

$generosLiterarios[] = 'Psicologia'; 
$generosLiterarios[2] = 'Terror Psicológico';

unset($generosLiterarios[0]);

foreach ($generosLiterarios as $genero) {
    echo 'Genero: '.$genero;
}