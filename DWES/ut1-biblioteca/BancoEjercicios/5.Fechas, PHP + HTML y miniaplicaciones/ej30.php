<?php

date_default_timezone_set('Europe/Madrid');

$fechaHoy = new DateTimeImmutable();

echo $fechaHoy->format('d/m/y H:i');