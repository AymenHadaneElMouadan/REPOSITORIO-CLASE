<?php
declare(strict_types=1);

final class Libro
{
    // Fase 2: constructor con promoción de propiedades públicas tipadas.
    public function __construct(
        public int $id,
        public string $titulo,
        public int $paginas,
        public Autor $autor,
        public Categoria $categoria,
        public bool $disponible = true,
    ){
    // Fase 3: título sin espacios en los extremos y valores por defecto si no es válido o las páginas no son positivas.
        $tituloSinEspacios = trim($titulo);
        if($tituloSinEspacios === ''){
            $this->titulo = 'Sin Titulo';
        }else{
            $this->titulo = $tituloSinEspacios;
        }

        if($paginas <= 0){
            $this->paginas = 1;
        }
    }
    // Fase 5: prestar(), devolver() y ficha().
}
