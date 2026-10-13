<?php
$generos = ['terror','fantasia','terror','fantasia'];

$unicos = array_unique($generos);

foreach($unicos as $unico){
    echo "[$unico] ";
}

echo " ";

$claves = ['titulo', 'autor'];
$valores = ['La Celestina', 'Lorca'];

$arrayCombinado = array_combine($claves, $valores);

foreach($arrayCombinado as $ar){
    echo "[$ar]";
}
