<?php

$genero = 'F';

switch($genero){
    case 'F':
        echo 'Fantasia';
    case 'CD':
        echo 'Ciencia Ficcion';
    case 'T':
        echo 'Terror';
}


$generoNombre = match($genero) {
    'F' => 'Fantasia',
    'CD' => 'Ciencia Ficcion',
    'T' => 'Terror'
};

echo $generoNombre;