<?php
$titulos = ['Diccionario', 'El Cid', 'La Odisea', 'La Casa de Bernarnda Alba'];?>

<ul>
    <?php foreach ($titulos as $titulo):?>
        <li>
            <?=  htmlspecialchars($titulo) ?>
        </li>
    <?php endforeach; ?>
</ul>