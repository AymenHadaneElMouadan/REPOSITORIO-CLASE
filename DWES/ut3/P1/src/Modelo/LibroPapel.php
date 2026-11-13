<?php

declare(strict_types= 1);

namespace Aymenhadane\Biblioteca\Modelo;

use Aymenhadane\Biblioteca\Modelo\Libro;
use Override;

class LibroPapel extends Libro{
    public function costeResposicionesCentimos(): int
    {
        return $this->unidades() * 5 * $this->paginas();
    }
    public function getTipo() : string{
        return 'papel';
    }
}