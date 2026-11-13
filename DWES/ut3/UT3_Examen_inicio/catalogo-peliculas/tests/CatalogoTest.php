<?php

declare(strict_types=1);

use App\Modelo\Pelicula;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertSame;

final class CatalogoTest extends TestCase
{
    // COMPLETAR 8. Creación válida y estado del objeto.
    public function objetoComprobacion()
    {
        $p1 = new Pelicula(" Dune ", " Denis Villeneuve ", 155, 'ciencia');

        assertSame('Dune', $p1->titulo());
        assertSame('Denis Villenevue', $p1->director());
        assertSame(155, $p1->duracion());
        assertNull($p1->fechaEstreno());
    }
}
