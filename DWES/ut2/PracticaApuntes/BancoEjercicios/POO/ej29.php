<?php
final class Libro2
{
    public string $titulo; //Al no estar inicializada, si se quisiera leer el titulo justo despues de crear el objeto saltaria un error.
    public int $paginas = 0; //Variable incializada
    public bool $disponible = true; //Variable inicializada
    
}
$libro = new Libro2('Solaris', 216);

//Una clase hija que use extends Libro seria rechazada debido a que la clase es final

