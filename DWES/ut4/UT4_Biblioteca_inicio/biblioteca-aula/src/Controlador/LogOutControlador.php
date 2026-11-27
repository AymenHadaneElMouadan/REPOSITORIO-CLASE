<?php

declare(strict_types=1);

namespace App\Controlador;

use function App\Soporte\cerrarSession;
use function App\Soporte\redirigir;
use function App\Soporte\soloMetodos;

final class LogOutControlador extends Controlador
{
    public function ejecutar():void
    {
        soloMetodos(['POST']);
        $this->exigirUsuario();
        cerrarSession();
        redirigir('index.php');
    }
}