<?php

use function \App\Soporte\e; ?>

<h2>Crear Cuenta</h2>

<?php if ($error !==null) : ?>
    <p><?= $error ?></p>
<?php endif?>

<form method="post">
    <label id="nombre">Nombre</label>
    <input type="nombre" names="nombre">

    <label id="email">Correo</label>
    <input type="email" names="email">

    <label id="clave">Contraseña</label>
    <input type="clave" names="clave" type="password">
    
    <button>Crear Cuenta</button>
</form>