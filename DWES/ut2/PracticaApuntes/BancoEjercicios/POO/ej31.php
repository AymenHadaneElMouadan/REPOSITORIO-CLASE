<?php
final class Libro
{
    public function __construct(
    public string $titulo,
    public bool $disponible = true,
    ) {}
    public function prestar(): void{
        $this->disponible = false;
    }
    public function devolver(): void{
        $this->disponible = true;
    }
}

$dune = new Libro('Dune');
$solaris = new Libro('Solaris');

$dune->prestar();
var_dump($dune->disponible);
var_dump($solaris->disponible);

$dune->devolver();
var_dump($dune->disponible);

//No cambia el otro ya que son objetos distintos, que apesar de pertenecer e la misma clase y requerir el mismo tipo de arguementos,
//estan guardados en sitios diferentes




