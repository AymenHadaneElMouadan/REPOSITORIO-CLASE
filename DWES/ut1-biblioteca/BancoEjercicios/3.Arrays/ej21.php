<?php
$nov1 = [10, 11, 5, 12, 32];
$nov2 = [41, 66, 32, 53, 87];

$numeros = array_merge($nov1, $nov2);

foreach($numeros as $numero){
    echo $numero.'<br>';
}