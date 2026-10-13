<?php

function ficha(string $titulo, string $autor): string{
    return "$titulo $autor";
}

$argumento = ficha(
    autor: 'Lorca',
    titulo: 'La Casa De Bernarda Alba',
);

echo $argumento;