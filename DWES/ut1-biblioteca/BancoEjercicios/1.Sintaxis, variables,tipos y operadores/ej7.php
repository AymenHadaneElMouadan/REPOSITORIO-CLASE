<?php
//$Titulo = "Dune" Aqui el error se observa en que no hay ;
$Titulo = "Dune";
//$paginas  "412"; En este se esta guardando un valor numerico como string ;
$paginas = 412;
//const max_prestamos = 3; Aqui no veo el error
//$disponible = TRUE De nuevo falta el ;
$disponible = TRUE;
//Echo "Libro: " + $Titulo; Para concatenar no se utiliza el mas si no el .
Echo "Libro: ".$Titulo;
//$puede = $paginas > 400 && $disponible = true; En php un solo = asigna el valor lo correcta seria poner 2 o 3 segun lo que se pretenda
$puede = $paginas > 400 && $disponible === true; 