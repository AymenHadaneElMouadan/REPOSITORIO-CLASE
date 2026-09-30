<?php
$titulo = " El nombre del viento ";
$tituloSinEspacios = trim($titulo);

$numeroDeLetras = strlen($tituloSinEspacios);

if (str_contains($titulo, 'viento')){
    $titul= str_replace('viento', 'fuego', $titulo);

    $titulo = explode(" ", $titulo);
}