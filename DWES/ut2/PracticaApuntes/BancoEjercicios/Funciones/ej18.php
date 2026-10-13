<?php

$texto = ' DRÁCULA ';

$texto = trim($texto);

echo "$texto \n";

$texto = mb_strtolower($texto, 'UTF-8');

echo "$texto \n";

$longitud = mb_strlen($texto, 'UTF-8');

echo $longitud;