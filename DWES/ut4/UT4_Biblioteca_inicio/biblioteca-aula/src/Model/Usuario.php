<?php

declare(strict_types= 1);

namespace App\Model;

final class Usuario{
    public function __construct(
        private int $id,
        private string $nombre,
        private string $correo,
        private string $passwordhash,
        private string $rol,
    ){
        
    }
}