<?php use function App\Soporte\e; ?>
<h2>Catálogo</h2>

<form method="post" action="preferencias.php">
    <label for="tema">Tema</label>
    <select name="tema" id="tema">
        <option value="claro">Claro</option>
        <option value="oscuro">Oscuro</option>
    </select>
    <button type="submit">Guardar Tema</button>
</form>

<form method="post" action="preferencias.php">
    <label for="formato">Formato</label>
    <select name="formato" id="formato">
        <option value="compacto">Compacto</option>
        <option value="amplio">Amplio</option>
    </select>
    <button type="submit">Guardar Formato</button>
</form>

<form method="get" action="index.php">
    <label for="q">Buscar por título</label>
    <input id="q" name="q" value="<?= e($q) ?>">
    <button>Buscar</button>
    <a href="index.php">Ver todos</a>
</form>
<?php if ($libros === []): ?>
    <p>Sin resultados.</p>
<?php else: ?>
    <ul class="libros">
        <?php foreach ($libros as $libro): ?>
            <?php if($favoritos !== null && in_array($libro->id, $favoritos, true)): ?>
                <li><?= e($libro->titulo)?></li>
                <p>Favorito</p>
                <form method="post" action="add-favs.php">
                    <input type="hidden" name="id" value="<?= $libro->id?>">
                    <button>Quitar a favoritos</button>
                </form>
            <?php else: ?>
                <li><?= e($libro->titulo)?></li>
                <p>No favorito</p>
                <form method="post" action="add-favs.php">
                    <input type="hidden" name="id" value="<?= $libro->id?>">
                    <button>Añadir a favoritos</button>
                </form>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
