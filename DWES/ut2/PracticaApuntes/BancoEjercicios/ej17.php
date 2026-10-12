<?php

$codigo = 'LIB-2026-0042';

$inicio = substr($codigo, 0, 3);

$digitos = substr(10, 13);

echo "Inicio: $inicio Digitos: $digitos \n";


$dracula = 'Drácula';

$caracteres = mb_substr($dracula, 0, 3, 'UTF-8');

echo "3 primeros caracteres $caracteres";

// Es preferible la version mb_ ya que en casos donde se 
// utlicen caracteres unicos del español (en este caso la tilde en la primera a)
// no ocurrira ningun error.

