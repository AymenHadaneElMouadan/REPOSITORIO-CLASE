<?php
    use function App\Soporte\e;
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Catálogo de la biblioteca</title></head>
<body>
<h1>Catálogo de la biblioteca</h1>
<p><a href="alta.php">Dar de alta un libro</a></p>
<!-- Bloque de errores proporcionado. Cada entrada identifica el campo y su mensaje. -->
<?php if ($errores !== []): ?>
    <ul role="alert">
        <?php foreach ($errores as $campo => $mensaje): ?>
            <li><?= e($campo) ?>: <?= e($mensaje) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<!-- COMPLETAR 1. Formulario GET con controles HTML estáticos. -->
<form action="/index.php" method="get">
    <label for="q">Autor</label>
    <input id="q" name="q" type="text" value="">
    <br><br>

    <label for="genero">Genero</label>
    <select name="genero" id="genero">
        <option value="">Todos</option>
        <option value="ciencia">Ciencia</option>
        <option value="fantasia">Fantasia</option>
        <option value="terror">Terror</option>
    </select>
    <br><br>

    <button type="submit">Buscar</button>
</form>

<?php if ($errores === []): ?>
    <!-- COMPLETAR 3. Tabla de libros o mensaje si no hay coincidencias. -->
    <?php if ($libro === []): ?>
        <div>No hay libros que coincidan</div>
    <?php else: ?>    
        <?php foreach($libros as $libro): ?>
            <tr>
                <td>Titulo: <?= e($libro->titulo()) ?></td> <br>
                <td>Autor: <?= e($libro->autor()) ?></td> <br>
                <td>Paginas: <?= $libro->paginas() ?></td> <br>
                <td>Genero: <?= e($libro->genero()) ?></td> <br>
                <td>Fecha de alta: <?=e($libro->fechaAlta()?->format('Y-m-d') ?? 'Sin fecha')?></td> <br><br><br>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>
<p><a href="index.php">Limpiar filtros</a></p>
</body>
</html>
