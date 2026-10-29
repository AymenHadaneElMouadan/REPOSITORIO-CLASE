<?php

declare(strict_types= 1);

namespace Aymenhadane\Biblioteca\Modelo;


use Libro;
use Override;

class LibroDigital extends Libro{
    public function __construct(){}
    #[Override]
	public function costeResposicionesCentimos(): int
    {
        return $this->unidades() * 400;
    }
    public function getTipo() : string{
        return 'digital';
    }
}
