<?php
function aplicar (int $n, callable $callback) : int{
    return $callback($n);
}

function doble (int $n): int{
    return $n * 2;
}

function cuadrado (int $n):int  {
    return $n ** 2;
}

$resultadoDoble = aplicar(2, 'doble');

echo "Resultado doble:$resultadoDoble \n";

$resultadoCuadrado = aplicar(5, 'cuadrado');

echo "Resultado cuadrado:$resultadoCuadrado";