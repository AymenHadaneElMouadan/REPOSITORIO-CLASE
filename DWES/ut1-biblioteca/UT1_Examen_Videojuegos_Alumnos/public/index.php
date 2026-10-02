<?php

declare(strict_types=1);


// Importar librerías
require_once __DIR__ . ('/../src/funciones.php');
require_once __DIR__ . ('/../src/datos.php');
// Poner la zona horaria

date_default_timezone_set('Europe/Madrid');

// 3.1. Leer parámetros

$genero = _GET('genero') ?? '';
$id = _GET('id')?? null;
$plataforma = _GET('plataforma') ?? '';
$orden = _GET('orden') ?? '';


// 3.2. Normalizar y comprobar que los valores recibidos estén dentro de los esperados
if($genero === null){

}


// 3.3. Filtros
$resultados = $videojuegos;

// Aplica sobre $resultados los filtros, la búsqueda y la ordenación solicitados.
$busqueda = ' ';

// 3.5. Ordenar salida

$plataformasOrdenadas = [];

$ventasOrdenadas = [];

// Ordena las dos colecciones anteriores manteniendo la relación entre claves y valores.
$timestampConsulta = time();
$fechaHoy = date('d/m/Y');
$fechaConsulta = " $fechaHoy $timestampConsulta"; // COMPLETAR
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Catálogo de videojuegos</title>
</head>
<body>
    <h1>Catálogo de videojuegos</h1>

    <form method="get">
        <label>
            Género:
            <input type="text" name="genero" value="<?= htmlspecialchars($genero) ?>">
        </label>

        <label>
            Plataforma:
            <select name="plataforma">
                <option value="todas">Todas</option>
                <?php foreach ($plataformas as $codigo => $nombre): ?>
                    <option value="<?= htmlspecialchars($codigo) ?>">
                        <?= htmlspecialchars($nombre) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>
            Buscar:
            <input type="text" name="q" value="<?= $busqueda ?>">
        </label>

        <label>
            Orden:
            <select name="orden">
                <option value="titulo">Título</option>
                <option value="precio">Precio</option>
                <option value="puntuacion">Puntuación</option>
            </select>
        </label>

        <button type="submit">Aplicar</button>
    </form>

    <p>Resultados: <?= count($resultados); ?></p>

    <ul>
        <?php foreach ($resultados as $videojuego): ?>
            <li>
                <!-- Construye aquí el enlace a videojuego.php enviando su id. -->
                <p href= '/../public/videojuegos.php?id='<?=$videojuego['id']?>><?= htmlspecialchars($videojuego['titulo']) ?></p>
                · <?= number_format($videojuego['precio'], 2, ',', '.') ?> €
                · <?= $videojuego['puntuacion'] ?>/10
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Plataformas por código</h2>
    <ul>
        <?php foreach ($plataformasOrdenadas as $codigo => $nombre): ?>
            <li><?= htmlspecialchars((string) $codigo) ?>: <?= htmlspecialchars((string) $nombre) ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Ventas de la semana</h2>
    <ul>
        <?php foreach ($ventasOrdenadas as $codigo => $ventas): ?>
            <li><?= htmlspecialchars((string) $codigo) ?>: <?= $ventas ?></li>
        <?php endforeach; ?>
    </ul>

    <p>Consulta generada: <?= htmlspecialchars($fechaConsulta) ?></p>
</body>
</html>
