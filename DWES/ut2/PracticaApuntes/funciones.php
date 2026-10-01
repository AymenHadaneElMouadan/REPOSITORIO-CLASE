<?php
function triple(int $n){
    return $n * 3;
}
function doble(int $n){
    return $n * 2;
}
function aplicar(int $n, callable $callback){
    return $callback($n);
}

$resultado = aplicar(5, 'doble');
echo $resultado;


$iva = 0.21;
$f = function(float $p) use ($iva): float {
    return $p * (1 + $iva);
    };

$total = $f(100.0);

echo $total; // 121
