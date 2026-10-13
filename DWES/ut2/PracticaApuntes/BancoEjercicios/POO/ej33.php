<?php
final class Libro{
    public function __construct(public string $titulo) {}
}

$original = new Libro('Dune');
$alias = $original;
$otro = new Libro('Dune');
$alias->titulo = 'Solaris';

echo $original->titulo . PHP_EOL; //Va a mostrar Dune (Fallada)
echo $otro->titulo . PHP_EOL; //Va a mostrar tambien Dune (Acertada)

var_dump($original === $alias);
var_dump($original === $otro);

// Al asignar el objeto a una variable, ambos estan apuntando al mismo modulo donde esta guardara la informacion del objeto, 
// al hacer algun cambio en la informacion de estos, los valores del objeto original cambian y con ello tambien todas las variables que apuntan a el.
// Por otro lado si creamos una nueva instancia, este problema no se genera ya que ambos objetos apuntas a cosas diferentes.
