<?php
// http://localhost:8000/?tipo=alumno&dias=8&renovacion=si

$prestamo = [
];
$tipo = $_GET['tipo'] ?? 'externo';
$dias = $_GET['dias'] ?? 0;
$dias = (int) $dias;
$renovacion = $_GET['renovacion'] ?? 'no';

$diasMax = match ($tipo) {
    'alumno' => 15,
    'profesor' => 30,
    'default' => 7 
};

if ($renovacion === 'si'){
    $dias = $dias + 7;
};

$diasRenovacion = ($diasMax - $dias);

if($diasRenovacion > 1){
    echo 'Correcto';
} else if ($diasRenovacion === 1){
    echo 'Ultimo Dia';
} else if ($diasRenovacion <= -5){
    echo 'Restraso leve';
} else {
    echo 'Restraso grave';
}