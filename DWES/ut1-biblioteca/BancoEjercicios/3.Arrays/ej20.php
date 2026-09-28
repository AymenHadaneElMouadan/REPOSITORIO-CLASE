<?php
$paginas = [312, 153, 786, 982, 1266, 2313, 3256, 912];

sort($paginas);

$numLibros = count($paginas);

echo 'Minimo: '.$paginas[0];

echo 'Máximo: '.$paginas[$numLibros - 1];

$aux = 0;
$media = 0;

foreach($paginas as $pagina){
    $aux += $pagina;
};

$media = $aux/$numLibros;

$mediaRedondeada = round($media);
    
echo 'La media de paginas del catálogo de libros es de: '.$mediaRedondeada;