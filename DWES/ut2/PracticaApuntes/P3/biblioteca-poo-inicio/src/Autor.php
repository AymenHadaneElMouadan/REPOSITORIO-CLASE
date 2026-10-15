<?php
declare(strict_types=1);

// Ejemplo guiado: promoción de una propiedad pública.
final class Autor
{
    public string $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }
}
