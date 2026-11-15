<?php

declare(strict_types=1);
require_once __DIR__ . '/../src/archivos.php';
$entradaAnterior = array_key_exists('anterior', $_GET) ? $_GET['anterior'] : null;
$esSustitucion = $entradaAnterior !== null;
$anterior = null;
$noEncontrado = false;
if ($esSustitucion) {
    $anterior = cartelServible($entradaAnterior);
    if ($anterior === null) {
        $noEncontrado = true;
        http_response_code(404);
    }
}
$errores = [];
$mensaje = null;
$imagenConfirmada = null;
$mostrarFormulario = !$noEncontrado;
$metodo = $_SERVER['REQUEST_METHOD'] ?? 'GET';
if ($metodo === 'POST' && !$noEncontrado) {
    if (envioSuperaLimitePost()) {
        $errores['imagen'] = 'Se ha superado el límite del envío.';
    } else {
        $recepcion = validarRecepcionImagen($_FILES['imagen'] ?? null, !$esSustitucion);
        if ($recepcion['sinCambio']) {
            $mensaje = 'No se ha cambiado el cartel.';
        } elseif ($recepcion['error'] !== null) {
            $errores['imagen'] = $recepcion['error'];
        } elseif (!is_array($recepcion['archivo']) || !is_string($recepcion['extension'])) {
            $errores['imagen'] = 'Error de recepción.';
        } else {
            $guardado = guardarCartelSubido($recepcion['archivo'], $recepcion['extension'], $anterior);
            if ($guardado['error'] !== null || !is_string($guardado['nombre'])) {
                $errores['imagen'] = $guardado['error'] ?? 'No se ha podido guardar el cartel.';
            } elseif ($esSustitucion && is_string($anterior)) {
                $sustitucion = completarSustitucion($anterior, $guardado['nombre']);
                $mensaje = $sustitucion['mensaje'];
                if ($sustitucion['ok']) {
                    $imagenConfirmada = $guardado['nombre'];
                    $mostrarFormulario = false;
                    $anterior = null;
                }
            } else {
                $mensaje = 'El cartel se ha guardado.';
                $imagenConfirmada = $guardado['nombre'];
            }
        }
    }
}
$action = 'subir.php';
if ($anterior !== null) {
    $action .= '?anterior=' . rawurlencode($anterior);
}
if ($noEncontrado) {
    $titulo = 'Cartel no encontrado';
} elseif ($esSustitucion) {
    $titulo = 'Sustituir cartel';
} else {
    $titulo = 'Subir cartel';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?= e($titulo) ?></title>
</head>

<body>
    <h1><?= e($titulo) ?></h1>
    <?php if ($noEncontrado): ?>
        <p>No se encuentra el cartel.</p>
    <?php else: ?>
        <?php if ($mensaje !== null): ?>
            <p><?= e($mensaje) ?></p>
        <?php endif; ?>
        <?php if ($imagenConfirmada !== null): ?>
            <p><img src="imagen.php?nombre=<?= e($imagenConfirmada) ?>" alt="Cartel guardado"></p>
        <?php elseif ($anterior !== null): ?>
            <p>Cartel actual</p>
            <p><img src="imagen.php?nombre=<?= e($anterior) ?>" alt="Cartel actual"></p>
        <?php endif; ?>
        <?php if ($mostrarFormulario): ?>
            <form method="post" action="<?= e($action) ?>" enctype="multipart/form-data">
                <p>
                    <label for="imagen">Imagen</label>
                    <input id="imagen" name="imagen" type="file" accept="image/jpeg,image/png,image/webp">
                </p>
                <?php if (isset($errores['imagen'])): ?>
                    <p><?= e($errores['imagen']) ?></p>
                <?php endif; ?>
                <p><button type="submit">Guardar</button></p>
            </form>
        <?php endif; ?>
    <?php endif; ?>
    <p><a href="index.php">Volver a la galería</a></p>
</body>

</html>