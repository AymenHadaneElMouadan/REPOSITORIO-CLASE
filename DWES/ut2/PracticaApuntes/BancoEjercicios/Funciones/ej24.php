<?php

function normalizarId(int|string $id): int{
    return (int) $id;
}

function etiqueta(?string $titulo): string{
    return $titulo ?? 'No existe';
}

echo normalizarId(13)."\n";
echo normalizarId('13')."\n";

echo etiqueta("La Casa de Bernarnda Alba")."\n";
echo etiqueta(null);
