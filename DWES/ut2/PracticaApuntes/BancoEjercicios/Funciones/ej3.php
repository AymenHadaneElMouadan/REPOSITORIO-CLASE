<?php

$factor = 3;

$doble = fn(int $n): int => $n * $factor;

// Se captura automaticamente el valor $factor

echo $doble(2);