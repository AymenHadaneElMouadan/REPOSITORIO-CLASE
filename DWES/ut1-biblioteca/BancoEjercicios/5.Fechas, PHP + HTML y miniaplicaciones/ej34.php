<?php 

    date_default_timezone_set('Europe/Madrid');

    $fechaHoy = new DateTimeImmutable();

    $libros = [
        [
            'id' => 1,
            'titulo' => 'La Casa De Bernanrda Alba',
            'autor' => 'Federico Garcia Lorca',
            'genero' => 'drama'
        ],
        [
            'id' => 2,
            'titulo' => 'La Celestina',
            'autor' => 'Fernando de Rojas',
            'genero' => 'comedia humanistica'
        ],
        [
            'id' => 3,
            'titulo' => 'Odisea',
            'autor' => 'Homero',
            'genero' => 'epico'
        ],
        [
            'id' => 4,
            'titulo' => 'Fuenteovejuna',
            'autor' => 'Lope de Vega',
            'genero' => 'drama'
        ],
        [
            'id' => 5,
            'titulo' => 'La vida es sueño',
            'autor' => 'Pedro Calderón de la Barca',
            'genero' => 'drama' 
        ],
        [
            'id' => 6,
            'titulo' => 'Cantar del Mio Cid',
            'autor' => 'Desconocido',
            'genero' => 'epico'
        ],
    ];
  
    function genero(array $libros, string $genero)
    {
        $resultado = [];
        foreach ($libros as $libro) {
            if ($libro['genero'] === $genero) {
                $resultado[] = $libro;
            }           
        }
        return $resultado;
    }
    $resultados = genero($libros, 'drama');
    $resultadosOrden = $resultados;
    
    foreach ($resultadosOrden as $resultado){
        echo $resultado['titulo'].'<br>';
    }
    echo 'Hay: '.count($resultados).' peliculas <br>';

    
    genero($libros, 'epico');

    $nuevaFecha = $fechaHoy->modify('+30 days');

    echo 'Fecha de revision del catálogo : '.$nuevaFecha->format('d/m/y');
?>

 