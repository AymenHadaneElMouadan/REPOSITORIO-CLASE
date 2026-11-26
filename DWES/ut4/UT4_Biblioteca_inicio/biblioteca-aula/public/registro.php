<?php

declare(strict_types= 1);
use App\Controlador\RegistroControlador;

$app = require dirname(__DIR__) ."/config/inicio.php";

(new App\Controlador\RegistroControlador($app))->mostrar();

