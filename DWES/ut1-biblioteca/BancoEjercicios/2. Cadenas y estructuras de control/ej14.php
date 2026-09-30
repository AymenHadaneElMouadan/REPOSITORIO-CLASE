<?php
$texto = "PHP";
$i = 0;
    while ($i < strlen($texto)) {
        if ($i === 1) {
            echo "-";
        }
        echo $texto[$i];
        $i++;
}
// Lo que hace el codigo es que mientras i sea menor que el numero de letras en 
// $texto lo que va seguir entrando en el bucle y dentro del bucle se va a hacer primero una
// comprobacion con if y esque si i es igual a 1 se muestra un guin, luego de eso
// se muestra la letra que se encuentra en la posicion igual al numero i,
// y por ultimo i se suma 1.

