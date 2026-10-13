<?php
function sumarPaginas(int ...$paginas): int{
    return array_sum($paginas);
}

$paginas = [333, 444, 555];

echo sumarPaginas(...$paginas)."\n";

echo sumarPaginas(333, 444, 555);