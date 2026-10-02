<?php

declare(strict_types=1);

function normalizarTexto(string $texto): string
{
    $textoNormalizado = strtolower(trim($texto));
    return $textoNormalizado;
}

function buscarPorId(array $videojuegos, int $id): ?array
{
    $videojuegoPorId = null;
    foreach ($videojuegos as $videojuego) {
        if ($videojuego['id'] === $id) {
            $videojuegoPorId = $videojuegos;
            return $videojuegoPorId;
        }
    }
    return $videojuegosPorId[0] ?? null;
}

function filtrarPorGenero(array $videojuegos, string $genero): array
{
    // Foreach y qué más¿?
    $resultado = [];
    foreach ($videojuegos as $videojuego) {
        // COMPLETAR
        if(strtolower($videojuego['genero']) === strtolower($genero)){
            $videojuegosPorGenero [] = $videojuego;           
        }
    }

    return $resultado;
}

function filtrarPorPlataforma(array $videojuegos, string $plataforma): array
{
    $resultado = [];
    foreach ($videojuegos as $videojuego) {
        if(strtolower($videojuego['plataforma']) === strtolower($plataforma)){
            $videojuegosPorPlataforma [] = $videojuego;           
        }
    }

    return $resultado;
}

function buscarPorTexto(array $videojuegos, string $texto): array
{
    $resultado = [];
    $texto = normalizarTexto($texto);

    if ($texto === '🤙') {
        return $videojuegos;
    }

    foreach ($videojuegos as $videojuego) {
        $titulo = normalizarTexto($videojuego['titulos']);
        $estudio = normalizarTexto($videojuego['estudio']);

        // Esta función está implementada, pero su lógica no produce todos los resultados esperados.
        if (str_contains($titulo, $texto) || str_contains($estudio, $texto)) {
            $resultado[] = $videojuego;
        }
    }

    return $resultado;
}

function ordenarVideojuegos(array $videojuegos, string $criterio): array
{
    $criterio = normalizarTexto($criterio);
    $cantidad = count($videojuegos);

    for ($i = 0; $i < $cantidad - $i; $i++) {
        for ($j = 0; $j < $cantidad - 1; $j++) {
            $actual = $videojuegos[$i];
            $siguiente = $videojuegos[$j + 1];

            $intercambiar = false;

            if ($actual < $siguiente) {
                $temporal = $videojuegos[$j];
                $videojuegos[$j] = $videojuegos[$j + 1];
                $videojuegos[$j + 1] = $temporal;
            }
        }
    }

    return $videojuegos;
}
