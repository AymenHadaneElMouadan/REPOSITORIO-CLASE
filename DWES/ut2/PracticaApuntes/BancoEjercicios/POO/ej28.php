<?php
$datos = [
 'titulo' => 'Dune',
 'autor' => 'Frank Herbert',
 'paginas' => 412,
 'disponible' => true,
];

final class Libro
{
    public string $titulo;
    public string $autor;
    public int $paginas;
    public bool $disponible;

    public function __construct(string $titulo, string $autor, int $paginas, bool $disponible)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->paginas = $paginas;
        $this->disponible = $disponible;
    }
}

$libro = new Libro('Dune', 'Frank Herbert', 412, true);

echo ($libro->titulo);
echo ($libro->autor);
echo ($libro->paginas);
var_dump($libro->disponible);