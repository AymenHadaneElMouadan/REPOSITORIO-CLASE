<?php

require_once __DIR__ . ('/../src/datos.php');

function buscarPorId(array $peliculas, int $id): ?array{
    foreach($peliculas as $pelicula){
        if($pelicula['id'] === $id){
           return $pelicula;
        }
    }
    return null;

}
function filtrarPorGenero (array $peliculas, string $genero): array{
    $peliculasGenero = [];
    foreach($peliculas as $pelicula){
        if(trim($pelicula['genero']) === trim($genero)){
            $peliculasGenero = $pelicula;           
        }
    }
    return $peliculasGenero;
    
}
function filtrarDisponibles(array $peliculas): array{
    $peliculasDisponibles = [];
    foreach($peliculas as $pelicula){
    if($pelicula['disponible'] === true){
            $peliculasDisponibles = $pelicula;           
        }
    }
    return $peliculasDisponibles;
    
}
function buscarPorTexto(array $peliculas, string $texto): array{


    
}
function calcularMediaDuracion(array $peliculas,): float{
    $aux = 0;
    $numPeliculas = count($peliculas);

    if($numPeliculas === 0){
        return 0.0;
    }

    foreach($peliculas as $pelicula){
        $aux += $pelicula['duracion'];
    }
    $media = $aux / $numPeliculas;
    return $media;

    
}
function obtenerPeliculaMasLarga(array $peliculas): ?array{
    
}
function contarPorGenero(array $peliculas): array{
    
}