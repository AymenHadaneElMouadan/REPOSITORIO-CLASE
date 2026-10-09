<?php
require_once __DIR__ . '/../BancoEjercicios/datos.php';

$titulos = array_column($libros,'titulo');

$ids = array_column($libros, null, 'id');

foreach($titulos as $titulo){
    echo "[$titulo] " ;
}


