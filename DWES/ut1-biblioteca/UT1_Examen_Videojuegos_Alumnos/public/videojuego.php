<?php

require_once __DIR__ . ('/../src/funciones.php');
require_once __DIR__ . ('/../src/datos.php');

$id = $_GET['id'] ?? 0;
$id = (int) $id;


foreach ($videojuegos as $videojuego) {
    if ($videojuego === null) {
        // Completa el tratamiento del caso en el que el videojuego no existe.
?>
        <!doctype html>
        <html lang="es">

        <head>
            <meta charset="utf-8">
            <title>Videojuego no encontrado</title>
        </head>

        <body>
            <p>No existe ningun videojuego con id: <?= htmlspecialchars($id) ?></p>

            <a href='/../public/index.php'> Volver al Catálogo</a>
        </body>

        </html>
<?php
        exit;
    } else {
        buscarPorId($videojuegos, $id);
    }
}

// Prepara las fechas y los valores que necesita la ficha.
$fechaLanzamiento = new DateTimeImmutable($videojuego['fechaLanzamiento']->date_format('d/m/Y')); // De dónde saco la fecha??
$hoy = new DateTimeImmutable('today');
$diasTranscurridos = $hoy->diff($fechaLanzamiento); //0? Habrá que calcular algo, no?
$finNovedad = $fechaLanzamiento->modify('+30 days');
$estado = '';
if ($hoy > $finNovedad) {
    $estado = 'Catálogo';
} else {
    $estado = 'Novedad';
}
// COMPLETAR los cálculos anteriores utilizando los datos del videojuego.
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Ficha del videojuego</title>
</head>

<body>
    <h1><?= htmlspecialchars($videojuego['titulo'] ?? '') ?></h1>

    <dl>
        <dt>Estudio</dt>
        <dd><?= htmlspecialchars($videojuego['estudio'] ?? '') ?></dd>

        <dt>Género</dt>
        <dd><?= htmlspecialchars($videojuego['genero'] ?? '') ?></dd>

        <dt>Plataforma</dt>
        <dd><?= htmlspecialchars($videojuego['plataforma'] ?? '') ?></dd>

        <dt>Precio</dt>
        <dd>
            <?php if ($videojuego !== null): ?>
                <?= number_format($videojuego['precio'], 2, ',', '.') ?> €
            <?php endif; ?>
        </dd>

        <dt>Puntuación</dt>
        <dd><?= $videojuego['puntuacion'] ?? '' ?></dd>

        <dt>Fecha de lanzamiento</dt>
        <dd><?= htmlspecialchars($videojuego['fechaLanzamineto']) ?></dd>

        <dt>Días desde el lanzamiento</dt>
        <dd><?= htmlspecialchars($diasTranscurridos->format('d/m/Y')) ?></dd>

        <dt>Fin del periodo de novedad</dt>
        <dd><?= htmlspecialchars($finNovedad->format('d/m/Y')) ?></dd>

        <dt>Estado</dt>
        <dd><?= htmlspecialchars($estado) ?></dd>
    </dl>

    <p><a href="index.php">Volver al catálogo</a></p>
</body>

</html>