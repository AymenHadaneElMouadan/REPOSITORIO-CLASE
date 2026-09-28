<?php
function buscarPorId(array $libros, int $id){
    foreach ($libros as $libro){
        if ($libro['id'] === $id){
            echo "El libro con id : $id es {$libro['titulo']}";
        }
    }
}
function filtrarPorGenero(array $libros, string $genero){
    foreach($libros as $libro){
        if ($libro['genero'] === $genero){
            echo "El libro {$libro['titulo']} existe en la bsae de datos";
        }  
    }
}

function filtrarDisponibles(array $libros){
    foreach($libros as $libro){
        if ($libro['disponible'] === true){
            echo "El libro {$libro['titulo']} existe en la base de datos y esta disponible";
        }  
    }
}

function calcularMediaPaginas(array $libros) : float{
    $sumaPaginas = 0;
    $numLibros = 0;
    foreach($libros as $libro){
        $sumaPaginas += $libro['paginas'];
        $numLibros ++;
    }
    $media = $sumaPaginas / $numLibros;

    return $media;
}

function obtenerLibroMasLargo(array $libros){
    foreach($libros as $libro){
        
    }
}