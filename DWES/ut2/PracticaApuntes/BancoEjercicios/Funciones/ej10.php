<?php
$paginas = [412, 1504, 328, 96, 864];

$hayMuchasPaginas = array_any(
    $paginas,
    fn(int $p): bool => $p > 1000,
);

echo $hayMuchasPaginas;


$todosMasQueCero = array_all(
    $paginas,
    fn(int $p) : bool => $p > 0,
);

echo $todosMasQueCero;