<?php
final class Libro
{
    public string $titulo;
    public bool $disponible;
    public function __construct(
    string $titulo, bool $disponible = true
    ) {
        $this->titulo = $titulo;
        $this->disponible = $disponible;
    }
}

$dune = new Libro('Dune'); //Este objeto es el que esta utilizando el valor por defecto de disponible.

$solaris = new Libro ('Solaris', false);

//Si se instancia un libro que no contenga un titulo, se produciria el error (ArgumentCountError), debido a que no se estan instanciando los valores necesarios para el objeto.
