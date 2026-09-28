<?php
$libros = [
    [
        'titulo'=> 'La Casa De Bernarda Alba',
        'autor'=> 'Federico Garcia Lorca' ,
        'paginas'=> 213,
        'disponible'=> true,
    ],
    [
        'titulo'=>'El Cantar de Mio Cid',
        'autor'=>'Desconocido',
        'paginas'=> 426,
        'disponible'=> true,
    ],
    [
        'titulo'=> 'La Celestina',
        'autor'=> 'Fernando de Rojas' ,
        'paginas'=> 341,
        'disponible'=>false,
    ],
    [
        'titulo'=> 'Odisea',
        'autor'=> 'Homero',
        'paginas'=> 1230,
        'disponible'=> true,
    ],
];

foreach($libros as $libro){
    if($libro['paginas'] < 500 && $libro['disponible'] === true)
        echo $libro['titulo'].' : '.$libro['autor'];      
}