<?php

final class Libro{
    public string $titulo;
    public Autor $autor;
    public Categoria $categoria;
}

final class Autor{
    public string $nombre;
    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }
}

final class Categoria{
    public string $nombre;
    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }
}