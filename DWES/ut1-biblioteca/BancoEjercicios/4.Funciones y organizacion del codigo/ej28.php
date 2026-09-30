<?php

function calcularMulta(int $dias, float $precioDia): float{
    $precioMulta = $dias * $precioDia;
    return $precioMulta;
}