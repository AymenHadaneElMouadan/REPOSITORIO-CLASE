<?php
$libro = 24.90;
$descuento = 15;
$iva = 4;

$precioLibroConDecuento = $libro *(1-($descuento/100));

$precioFinalConIva = $precioLibroConDecuento + ($precioLibroConDecuento *($iva/100));


echo 'Precio Original -n'.$libro;
echo 'Precio del libro con el descuento'.$precioLibroConDecuento;
echo 'Precio final con el IVA'.$precioFinalConIva;