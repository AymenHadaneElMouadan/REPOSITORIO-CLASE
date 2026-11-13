<?php

declare(strict_types=1);

use App\Modelo\Pelicula;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertSame;

final class CatalogoTest extends TestCase
{
    // COMPLETAR 8. Creación válida y estado del objeto.
    public function objetoComprobacion(){
        $p1 = new Pelicula(" Dune ", " Fenis Villeneuve ", 155, 'ciencia');


        assertSame($p1->titulo(), 'Dune');
        assertSame($p1->director(), 'Denis Villenevue');
        assertSame($p1->duracion(), 155);
        assertNull($p1->fechaEstreno());
    }
}
