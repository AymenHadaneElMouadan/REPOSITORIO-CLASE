<?php
$libros = [
    [
        'titulo'=> 'La Casa De Bernarda Alba',
        'autor'=> 'Federico Garcia Lorca' ,
    ],
    [
        'titulo'=>'El Cantar de Mio Cid',
        'autor'=>'Desconocido',
    ],
    [
        'titulo'=> 'La Celestina',
        'autor'=> 'Fernando de Rojas' ,
    ],
    [
        'titulo'=> 'Odisea',
        'autor'=> 'Homero',
    ],
];

foreach($libros as $libro){
    echo $libro['titulo'].' '.$libro['autor'].'<br>';
}