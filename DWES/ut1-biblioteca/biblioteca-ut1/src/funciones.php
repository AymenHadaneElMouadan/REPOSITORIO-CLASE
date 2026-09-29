<?php
declare(strict_types=1);
include './ut1-biblioteca/biblioteca-ut1/src/datos.php';

function buscarPorId(array $libros, int $id): string{
    foreach ($libros as $libro){
        if ($libro['id'] === $id){
            return "El libro con id : $id es {$libro['titulo']}";
        } 
    }
    return '' ;
}
function filtrarPorGenero(array $libros, string $genero) :string{
    foreach($libros as $libro){
        if ($libro['genero'] === $genero){
           return "El libro {$libro['titulo']} existe en la base de datos";
        }  
    }
    return '';
}

function filtrarDisponibles(array $libros): string{
    foreach($libros as $libro){
        if ($libro['disponible'] === true){
           return "El libro {$libro['titulo']} existe en la base de datos y esta disponible";
        }  
    }
    return '';
}
function calcularMedia(array $libros) : float{
    $sumaPaginas = 0;
    $numLibros = count($libros);
    foreach($libros as $libro){
        $sumaPaginas += $libro['paginas'];
    }
    $media = $sumaPaginas / $numLibros;
    return $media;
}

function libroMasLargo(array $libros): string{
    foreach($libros as $libro){
        $libroMasLargo = [];
        if($libro['paginas'] > $libroMasLargo['paginas'])
            $libroMasLargo = $libro;
    }
    return $libroMasLargo;
}

