<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="alta.php" method="post">

        <p>
            <label for="tipo">Tipo de Libro</label>
            <select name="tipo" id="tipo">
                <option value="papel">Papel</option>
                <option value="digital">digital</option>
            </select>
        </p>

        <p>
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" maxlength="120">
        </p>

        <p>
            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" maxlength="100">
        </p>

        <p>
            <label for="paginas">Paginas</label>
            <input type="number" id="paginas" name="paginas" max="3000">
        </p>

        <p>
            <label for="genero">Género</label>

            <select name="genero" id="genero">
                <option value=""></option>
            </select>
        </p>

        <p>
            <label for="unidades">Unidades</label>
            <input type="number" id="unidades" name="unidades" maxlength="3000">
        </p>

        <p>
            <label for="unidades">Unidades</label>
            <input type="number" id="unidades" name="unidades" maxlength="3000">
        </p>

    </form>
    
</body>
</html>