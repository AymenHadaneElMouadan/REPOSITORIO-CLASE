<?php

$codigo1 = 'LIB-2026-0042';

$validez = preg_match(
    '/^LIB-\d{4}-\d{4}$/',
    $codigo1,
);

var_dump($validez);


$codigo2 = 'LIB-20326-0042';

$validez = preg_match(
    '/^LIB-\d{4}-\d{4}$/',
    $codigo2,
);

var_dump($validez);


$codigo3 = 'LIB-2026-00442';

$validez = preg_match(
    '/^LIB-\d{4}-\d{4}$/',
    $codigo3,
);

var_dump($validez);