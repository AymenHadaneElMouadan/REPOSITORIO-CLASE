<?php

$iva = 0.21;

$f = function(float $precio) use ($iva): float{

return ($precio) + ($precio * $iva);
};

$total = $f(100);

echo $total;