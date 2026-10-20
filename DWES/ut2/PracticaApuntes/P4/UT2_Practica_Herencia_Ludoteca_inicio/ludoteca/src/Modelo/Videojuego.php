<?php
declare(strict_types=1);

// TODO M6. Especializa Videojuego con su constructor, plazo y ficha.
final class Videojuego extends Juego{

    private string $plataforma;

    public function __construct(int $id, string $nombre, string $plataforma)
    {
        parent::__construct($id, $nombre);
        if(trim($plataforma) === ''){
            throw new InvalidArgumentException('Nombre de plataforma no valido');
        }else{
            $this->plataforma = trim($plataforma);
        }
    }
    public function plataforma(): string{
        return $this->plataforma;
    }


    #[Override]
    public function plazoMaximo(): int
    {
        $plazoMaximo = 7;
        return $plazoMaximo;
    }

    #[Override]
    public function ficha(): string
    {
        return parent::ficha().' · Plataforma: '.$this->plataforma;
    }

}