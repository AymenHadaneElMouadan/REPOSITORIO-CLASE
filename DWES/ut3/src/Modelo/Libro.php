<?php

declare(strict_types=1);

namespace Aymenhadane\Biblioteca\Modelo;

use DateTimeImmutable;
use InvalidArgumentException;

abstract class Libro {
    public function __construct(   
        private string $titulo,
        private string $autor,
        private int $paginas,
        private string $genero,
        private int $unidades,
        private DateTimeImmutable $fechaAlta,
        private bool $destacado,
        private string $observaciones)
    {
        $this->titulo = self::normalizar($this->titulo);
        $this->autor = self::normalizar($this->autor);
        $this->genero = mb_strtolower(self::normalizar($this->genero), 'UTF-8');
        $this->observaciones = self::normalizar($this->observaciones);

        if ($this->titulo === '' || $this->autor === ''|| $this->genero === ''){
            throw new InvalidArgumentException('Argumnetos vacios');
        }

        if(mb_strlen($this->titulo, 'UTF-8')> 120 || mb_strlen($this->autor, 'UTF-8')){
            throw new InvalidArgumentException('Tamaños incorrectos');
        }
        if($this->paginas < 1 || $this-> paginas > 3000){
            throw new InvalidArgumentException();
        }
        if(!in_array($this->genero, ['ciencia', 'fantasi', 'terror'])){
            throw new InvalidArgumentException();
        }
        if($this->unidades < 1 || $this->unidades > 50){
            throw new InvalidArgumentException();
        }
        if (mb_strlen($this->observaciones, 'UTF-8') > 300){
            throw new InvalidArgumentException();
        }
    }
    private static function normalizar(string $texto): string{
        return trim($texto);
    }

    public function titulo(): string {return $this->titulo;}
    public function autor(): string {return $this->autor;}
    public function genero(): string {return $this->genero;}
    public function observaciones(): string {return $this->observaciones;}
    public function paginas(): int {return $this->paginas;}
    public function unidades(): int {return $this->unidades;}
    public function fechaAlta(): DateTimeImmutable {return $this->fechaAlta;}
    public function destacado(): bool {return $this->destacado;}


    public abstract function getTipo() : string;
    public abstract function costeResposicionesCentimos(): int;
}