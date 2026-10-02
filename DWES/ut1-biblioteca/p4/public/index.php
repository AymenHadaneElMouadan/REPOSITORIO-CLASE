<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/datos.php';
require_once __DIR__ . '/../src/funciones.php';

date_default_timezone_set('Europe/Madrid');


$genero = trim($_GET['genero'] ?? '');
$soloDisponibles = ($_GET['disponible'] ?? '') === '1';

$resultados = $libros;

if ($genero !== '') {
    $resultados = filtrarPorGenero($resultados, $genero);
}
if ($soloDisponibles) {
    $resultados = filtrarDisponibles($resultados);
}

$total = count($resultados);
$media = calcularMediaPaginas($resultados);
$masLargo = obtenerLibroMasLargo($resultados);

$ahora = new DateTimeImmutable('now');
$hoy = new DateTimeImmutable('today');
$fechaRevision = $ahora->modify('+30 days');

function esc(string $texto){
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE , 'UTF-8'  );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Libros</h1>
    <h2>RESUMEN:</h2>
    <p>Resultados: <?= $total ?></p>
    <p>Media de páginas: <?= $media ?></p>

    <p>Libro con más páginas:
        <?php if ($masLargo !== null): ?>
            <?= esc($masLargo['titulo']) ?>
            (<?= esc($masLargo['autor']) ?>, <?= $masLargo['paginas'] ?> páginas)
        <?php endif; ?>
    </p>

    <h2>Listado de Libros:</h2>
    <ul>
        <?php foreach ($resultados as $libro): ?>
            <?php $alta = new DateTimeImmutable($libro['fechaAlta']); ?>
            <li>
                <?= esc($libro['titulo']) ?>
                <?= esc($libro['autor']) ?>
                <?= esc($libro['genero']) ?>
                <?= $libro['paginas'] ?> páginas
                <?= $libro['disponible']?>
                
                <br>
                Se ha dado de Alta el : <?= $alta->format('d/m/Y') ?>
                hace <?= $alta->diff($hoy)->days ?> días
            </li>

        <?php endforeach; ?>
    </ul>
    <p>
        Revision del catalogo :
        <?= esc($fechaRevision->format('d/m/Y H:i')) ?>
    </p>
</body>
</html>