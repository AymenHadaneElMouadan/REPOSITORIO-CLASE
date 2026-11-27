<?php

declare(strict_types= 1);

namespace App\Controlador;

use App\Controlador\Controlador;
use DomainException;

use function App\Soporte\redirigir;
use function App\Soporte\soloMetodos;

final class LibroControlador extends Controlador{
    public function mostrar(): void
    {
        $error = null;
        if (soloMetodos(['GET', 'POST']) === 'POST') {
            $titulo = is_string($_POST['nombre'] ?? null) ? trim($_POST['nombre']) : '';
            if (
                $titulo === ''
            ) {
                $error = 'Error en titulo';
            } else {
                try {
                    $auth = new AuthService($this->app['usuarios']);
                    $auth->registrar($titulo);
                    $_SESSION['flash'] = 'Libro';
                    redirigir('index.php');
                } catch (DomainException $e) {
                    $error = $e->getMessage();
                }
            }
        }
        $this->vista('registro', compact('error'));
    }
}