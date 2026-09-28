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
    [
        'titulo'=> 'Tehanu',
        'autor'=> 'Ursula K. Le Guin',
    ],
];

foreach($libros as $libro)
    if($libro['autor'] === 'Ursula K. Le Guin'){
        $libro['titulo'].'<br>';
    }
