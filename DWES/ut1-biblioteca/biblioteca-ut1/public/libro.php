<?php
    include './ut1-biblioteca/biblioteca-ut1/src/datos.php';


$id = $_GET['id'] ?? 0;

function buscarLibroPorId(array $libros, int $id){
    $fechaHoy = new DateTimeImmutable();
    foreach($libros as $libro){
        if($libro['if'] === $id){
            echo "El libro con id : $id existe en la lista";
            echo $libro;
        }
        if($libro['if'] === $id || $libro['disponible'] === true){            
            $nuevaFecha = $fechaHoy->modify('+15 days');
            echo "La fecha de devoucion es ".$nuevaFecha->format('d/m/y');

            $diferenciaFechas = $fechaHoy->diff($libro['fechaAlta']);
            echo "La diferencia de dias entre la fecha de alta y la de hoy es de : $diferenciaFechas";
        }
    }
}

