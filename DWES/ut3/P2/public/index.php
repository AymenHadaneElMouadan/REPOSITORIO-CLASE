<?php

declare(strict_types=1);
require_once __DIR__ . '/../src/archivos.php';
$listado = listarCarteles();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Galería de carteles</title>
</head>

<body>
    <h1>Galería de carteles</h1>
    <p><a href="subir.php">Subir cartel</a></p>
    <?php if (!$listado['ok']): ?>
        <p>No se ha podido consultar la galería.</p>
    <?php elseif ($listado['nombres'] === []): ?>
        <p>Todavía no hay carteles.</p>
    <?php else: ?>
        <?php foreach ($listado['nombres'] as $nombre): ?>
            <p>
                <img src="imagen.php?nombre=<?= e($nombre) ?>" alt="Cartel">
                <br>
                <?= e($nombre) ?>
                <br>
                <a href="subir.php?anterior=<?= e(rawurlencode($nombre)) ?>">Sustituir</a>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>