<?php
 
declare(strict_types= 1);

namespace App\Repository;

use \App\Model\Libro;

interface LibroRespositorio{
    public function siguienteId(): int;
    public function crear(string $titulo): Libro;
    public function guardar(Libro $usuario): void;
}