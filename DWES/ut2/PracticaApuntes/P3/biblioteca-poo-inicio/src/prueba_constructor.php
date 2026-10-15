<?php
declare(strict_types=1);

require_once __DIR__ . '/Autor.php';
require_once __DIR__ . '/Categoria.php';
require_once __DIR__ . '/Libro.php';

// Fase 2.1: crea aquí un Autor y una Categoria y muestra sus nombres.
$autor1 = new Autor('Frank Herbert');
$categoria1 = new Categoria('Ciencia Ficcion');

echo "Nombre del autor 1 : $autor1->nombre. \n";
echo "Categoria 1 : $categoria1->nombre";




// Fase 2.2: cuando completes Libro.php, añade su require_once arriba.
// Después crea los dos libros y muestra su disponibilidad.

    /* $libro1 = new Libro(10, 'Dune', 412, $autor1, $categoria1);

    echo "Libro 1 esta disponible?: $libro1->disponible";

    $libro2 = new Libro(10, 'Dune', 412, $autor1, $categoria1, false);

    echo "Libro 2 esta disponible?: $libro2->disponible"; */

$libro1 = new Libro(10, 'Dune', 412, $autor1, $categoria1);

echo "Titulo del libro $this->titulo";
echo "Numero de paginas $this->paginas";


// Fase 3.2: sustituye las pruebas anteriores por un Libro construido
// con las variables $titulo y $paginas. Muestra ambas propiedades.
