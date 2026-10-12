<?php

$texto = 'E j           
e        mp l

o';

$normalizacion = preg_replace('/\s+/',' ',$texto);

echo "$normalizacion";