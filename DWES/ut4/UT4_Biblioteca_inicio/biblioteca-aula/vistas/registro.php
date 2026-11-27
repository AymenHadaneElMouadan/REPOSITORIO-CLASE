<?php

use function \App\Soporte\e; ?>

<h2>Crear Cuenta</h2>

<?php if ($error !==null) : ?>
    <p><?= e($error) ?></p>
<?php endif?>

<form method="post">
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" required>

    <label for="email">Correo</label>
    <input id="email" name="email" type="email" required>

    <label for="clave">Contraseña</label>
    <input id="clave" name="clave" type="password" minlength="8" maxlength="64" required>

    <button>Crear Cuenta</button>
</form>