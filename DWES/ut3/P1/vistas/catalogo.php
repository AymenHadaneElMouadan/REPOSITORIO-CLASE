<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de la biblioteca</title>
</head>
<body>
    <h1>Catálogo de la biblioteca</h1>
    <form action="index.php" method="get">
    <!-- Añade aquí los controles y el botón Buscar. -->
    <p>
        <label for="q">Titulo o autor</label>
        <input type="text" id="q" name="q">
    </p>
    <p>
        <label for="genero">Genero</label>

        <select name="genero" id="genero">
            <option value="">Todos</option>
            <option value="ciencia">Ciencia</option>
            <option value="fantasia">Fantasia</option>
            <option value="terror">terror</option>
        </select>
    </p>
    <p>
        <label for="tipo">Tipo de Libro</label>
        <select name="tipo" id="tipo">
            <option value="">Todos</option>
            <option value="papel">Papel</option>
            <option value="digital">Digital</option>
        </select>        
    </p>

    <p>
        <label for="destacados">Solo destacados</label>
        <input type="checkbox" value="1" id="destacados" name="destacados">
    </p>
    <button type="submit">Enviar</button>
    </form>

    <?php if ($filas === []): ?>
        <p>No Hay Libros</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Tipo</th>
                    <th>Páginas</th>
                    <th>Unidades</th>
                    <th>Coste de reposición</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($filas === [])
                        echo "<p>No hay libros</p>";
                    else{
                        foreach($filas as $fila) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($fila["titulo"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ."</td>";
                            echo "<td>" . htmlspecialchars($fila["autor"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ."</td>";
                            echo "<td>" . htmlspecialchars($fila["genero"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ."</td>";
                            echo "<td>" . htmlspecialchars($fila["tipo"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ."</td>";
                            echo "<td>" . $fila["paginas"] ."</td>";
                            echo "<td>" . $fila["unidades"] ."</td>";
                            echo "<td>" . $fila["costeCentimos"] ."</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    <?php endif; ?>
    <h2>Resumen</h2>
    <h3>Número de títulos</h3>
    <p><?= $resumen['titulos'] ?></p>
    <h3>Unidades</h3>
    <p><?= $resumen['unidades']?></p>
    <h3>Paginas</h3>
    <p><?= $resumen['paginas']?></p>
    <h3>Coste Total</h3>
    <p><?= $resumen['costeCentimos']?></p>
</body>
</html>