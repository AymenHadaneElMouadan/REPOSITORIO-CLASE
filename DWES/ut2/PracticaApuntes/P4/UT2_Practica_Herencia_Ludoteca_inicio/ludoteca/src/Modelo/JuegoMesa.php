<?php
declare(strict_types=1);

// TODO M5. Especializa JuegoMesa con su constructor, plazo y ficha.

final class JuegoMesa extends Juego{

    private int $jugadores;

    #[Override]
    public function __construct(int $id, string $nombre, int $jugadores)
    {
        $this->jugadores = $jugadores;
        return parent::__construct($id, $nombre);
    }
    #[Override]
    public function plazoMaximo(): int
    {
        throw new \Exception('Not implemented');
    }

}