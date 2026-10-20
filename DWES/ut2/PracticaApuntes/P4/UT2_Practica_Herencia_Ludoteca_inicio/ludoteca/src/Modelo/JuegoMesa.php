<?php
declare(strict_types=1);

// TODO M5. Especializa JuegoMesa con su constructor, plazo y ficha.

final class JuegoMesa extends Juego{

    private int $jugadores;

    public function __construct(int $id, string $nombre, int $jugadores)
    {
        parent::__construct($id, $nombre);
        $this->jugadores = $jugadores;
        if($jugadores <= 0){
            throw new InvalidArgumentException('Numero de jugadores no valido');
        }
    }


    #[Override]
    public function plazoMaximo(): int
    {
        $plazoMaximo = 14;
        return $plazoMaximo;
    }

    #[Override]
    public function ficha(): string
    {
        return parent::ficha().' · '.$this->jugadores.' jugadores';
    }

}