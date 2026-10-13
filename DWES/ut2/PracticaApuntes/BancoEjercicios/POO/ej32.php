<?php

final class Libro{
    public string $titulo;
    public int $paginas;

    public function __construct(string $titulo, int $paginas)
    {
        $this->titulo = $titulo;
        $this->paginas = $paginas;
    } 
    public function ficha(): string{
        $textoConFromato = "$this->titulo - $this->paginas";
        return $textoConFromato;
    }

    public function mostrarFicha(string $fichaCompleta): void{
        echo $fichaCompleta;
    }
}

$dune = new Libro('Dune', 412);
$fichaCompleta = $dune->ficha();
$dune->mostrarFicha($fichaCompleta);

//Return permite guardar el texto dentro de una variable para luego volver a utilizarla