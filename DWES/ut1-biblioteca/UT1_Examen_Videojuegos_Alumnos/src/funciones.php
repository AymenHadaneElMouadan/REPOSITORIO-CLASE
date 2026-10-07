<?php

declare(strict_types=1);

function normalizarTexto(string $texto): string
{
    // Una línea
    $textoNormalizado = strtolower(trim($texto));
    return $textoNormalizado;
}

function buscarPorId(array $videojuegos, int $id): ?array
{
    // $videojuegoPorId = null;
    foreach ($videojuegos as $videojuego) {
        if ($videojuego['id'] === $id) {
            return $videojuego;
        }
    }
    // No hace falta acceder al primero, devuelves null
    return $videojuegosPorId[0] ?? null;
}

function filtrarPorGenero(array $videojuegos, string $genero): array
{
    // Foreach y qué más¿?
    $resultado = [];
    foreach ($videojuegos as $videojuego) {
        // COMPLETAR
        if(strtolower($videojuego['genero']) === strtolower($genero)){
            // Cuidado con los nombres
            $resultado[] = $videojuego;           
        }
    }

    return $resultado;
}

function filtrarPorPlataforma(array $videojuegos, string $plataforma): array
{
    $resultado = [];
    foreach ($videojuegos as $videojuego) {
        if(strtolower($videojuego['plataforma']) === strtolower($plataforma)){
            // Aquí igual
            $resultado[] = $videojuego;           
        }
    }
    return $resultado;
}

function buscarPorTexto(array $videojuegos, string $texto): array
{
    $resultado = [];
    $texto = normalizarTexto($texto);

    // El emoji sobra
    if ($texto === '') {
        return $videojuegos;
    }

    foreach ($videojuegos as $videojuego) {
        $titulo = normalizarTexto($videojuego['titulo']);
        $estudio = normalizarTexto($videojuego['estudio']);
       
        if (str_contains($titulo, $texto) || str_contains($estudio, $texto)) {
            $resultado[] = $videojuego;
        }
    }

    return $resultado;
}

// Terminar
function ordenarVideojuegos(array $videojuegos, string $criterio): array
{
    $criterio = normalizarTexto($criterio);
    $cantidad = count($videojuegos);

    for ($i = 0; $i < $cantidad; $i++) {
        for ($j = 0; $j < $cantidad; $j++) {
            $actual = $videojuegos[$j];
            $siguiente = $videojuegos[$j + 1];

            $intercambiar = match($criterio){
                'precio' => $actual['precio'] > $siguiente['precio'],
                'puntuacion' => $actual['puntuacion'] < $siguiente['puntuacion'],
                default => $actual['titulo'] > $siguiente['titulo']
            };

            if ($intercambiar) {
                $temporal = $videojuegos[$j];
                $videojuegos[$j] = $videojuegos[$j + 1];
                $videojuegos[$j + 1] = $temporal;
            }
        }
    }

    return $videojuegos;
}
