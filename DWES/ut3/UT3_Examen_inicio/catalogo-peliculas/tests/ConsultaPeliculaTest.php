<?php

declare(strict_types=1);

use App\Contrato\PeliculaRepository;
use App\Modelo\Pelicula;
use App\Servicio\ConsultaPelicula;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\TestCase;

final class ConsultaPeliculaTest extends TestCase
{
    // COMPLETAR 11. Película ausente con un stub.
    public function peliculaAusente(){
    }

    // COMPLETAR 12. Consulta única del identificador con un mock.
    public function peliculaId(){
        $pelicula = new Pelicula('Dune','Denis Villenevue',155,'2026-30-11');



    }
}
