<?php

declare(strict_types=1);

use App\Repository\{ArchivoJson, Catalogo, JsonUsuarioRepository};

require dirname(__DIR__) . '/vendor/autoload.php';

\App\Soporte\iniciarSesion();

$catalogo = new Catalogo(new ArchivoJson(dirname(__DIR__) . '/var/libros.json'));

$usuarios = new JsonUsuarioRepository(new ArchivoJson(dirname(__DIR__) . '/var/usuarios.json'));

$usuarioID = $_SESSION['usuario_id'] ?? null;
$usuarioActual = is_int($usuarioID) ? $usuarios->buscarPorId($usuarioId) : null;

return compact('catalogo', 'usuarios', 'usuarioActual');