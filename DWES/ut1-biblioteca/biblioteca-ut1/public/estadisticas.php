<?php
    
    include './ut1-biblioteca/biblioteca-ut1/src/datos.php';
    include './ut1-biblioteca/biblioteca-ut1/src/funciones.php';
    $numLibros = count($libros);
    echo "Hay $numLibros en total";


    $numDisponibles = 0;
    foreach($libros as $dato){
        if($libros['disponible'] === true){
            $numDisponibles ++;
        }
    }
    $numNoDisponibles = $numLibros - $numDisponibles;
    echo "Hay $numDisponibles libros disponible y $numNoDisponibles no disponibles";


    echo "La media de paginas de los libros es de ".calcularMedia($libros);

    
    echo "El libro con mas paginas es :".libroMasLargo($libros);


    date_default_timezone_set('Europe/Madrid');
    $fechaHoy = new DateTimeImmutable();
    echo $fechaHoy->format('d/m/y H:i');
