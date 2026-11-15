<?php

declare(strict_types=1);
require_once __DIR__ . '/../src/archivos.php';
$nombre = cartelServible($_GET['nombre'] ?? null);
if ($nombre === null) {
    http_response_code(404);
    exit;
}
$ruta = directorioCarteles() . '/' . $nombre;
$mime = mimeDetectado($ruta);
if ($mime === false || !isset(mimesPermitidos()[$mime])) {
    http_response_code(404);
    exit;
}
header('Content-Type: ' . $mime);
header('X-Content-Type-Options: nosniff');
readfile($ruta);
exit;
