<?php
declare(strict_types=1);

function buscarPorId(array $libros, int $id): ?array{
    foreach ($libros as $libro){
        if ($libro['id'] === $id){
            return $libro;
        }
    }
    return null;
}

function filtrarPorGenero(array $libros, string $genero): array{
    $resultado = [];
    foreach($libros as $libro){
        if (mb_strtolower($libro['genero']) === mb_strtolower($genero)){
            $resultado[] = $libro;
        }  
    }
    return $resultado;
}

function filtrarDisponibles(array $libros): array{
    $resultado = [];
    foreach($libros as $libro){
        if ($libro['disponible'] === true){
            $resultado[] = $libro;
        }  
    }
    return $resultado;
}

function calcularMediaPaginas(array $libros) : float{
    $sumaPaginas = 0;
    $numLibros = 0;
    foreach($libros as $libro){
        $sumaPaginas += $libro['paginas'];
        $numLibros ++;
    }
    if ($numLibros === 0){
        return 0.0;
    }
    $media = $sumaPaginas / $numLibros;

    return $media;
}

function obtenerLibroMasLargo(array $libros): ?array{

    $libroMasLargo = null;

    foreach($libros as $libro){
        if($libroMasLargo === null || $libro['paginas'] > $libroMasLargo['paginas']){
            $libroMasLargo = $libro;
        }
    }
    return $libroMasLargo;
}