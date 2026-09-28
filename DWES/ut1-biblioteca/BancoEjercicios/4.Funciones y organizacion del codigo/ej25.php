<?php
function duplicarValor($n)
{
    $n *= 2;
}
function duplicarReferencia(&$n)
{
    $n *= 2;
}
$a = 5;
$b = 5;
duplicarValor($a);
duplicarReferencia($b);
echo "$a - $b";

//Lo que sucedera es que en el caso de la variable a su valor original no sufrirá ningun cambio, se mantendra en 5,
//si quisieramos guardar el nuevo valor de a que obtenemos como resultado de la funcion, tendriamos que guardarlo en otra variable, 
//mientras que en el caso de b, gracias a la funcion que ejecutamos, la variable original si que cambiara y se duplicara , 
//por lo que ahora b pasa a valer 10.
//Teniendo esto en cuenta, el resultado con certeza que obtendriamos de la resta es de -5
