<?php

declare(strict_types=1);

function limpiarEspacios(string $texto): string{
    // TODO 1: limpiar extremos y agrupar espacios consecutivos.
    return preg_replace('/\s+/u', ' ', trim($texto));
}

function normalizarBusqueda(string $texto): string{
    // REVISAR: ¿funciona con CÁMARA y ÓRBITA?
    return mb_strtolower(limpiarEspacios($texto), 'UTF-8');
}

function obtenerCategorias(array $equipos): array{
    // TODO 2: extraer categorías sin duplicados en orden de aparición.
    return array_values(array_unique(array_column($equipos, 'categoria')));
}

function categoriaValida(string $categoria, array $categorias): bool{
    return $categoria === '' || (bool) array_search($categoria, $categorias, true);
}

function unidadesPrestadas(array $prestamos, int $equipoId): int{
    $activos = array_filter(
        $prestamos,
        fn(array $p): bool =>
            $p['equipoId'] === $equipoId && $p['estado'] === 'activo'
    );
    return array_reduce(
        $activos,
        fn(int $carry, array $p): int => $carry + $p['unidades'],
        0
    );
}

// Función facilitada: añade los cálculos a una copia de cada equipo.
function prepararEquipos(array $equipos, array $prestamos): array
{
    return array_map(
        function (array $equipo) use ($prestamos): array {
            $equipo['prestadas'] = unidadesPrestadas($prestamos, $equipo['id']);
            $equipo['disponibles'] = $equipo['unidades'] - $equipo['prestadas'];

            return $equipo;
        },
        $equipos
    );
}

function filtrarEquipos(array $equipos ,string $texto 
                        , string $categoria, bool $soloDisponibles): array {
    $texto = normalizarBusqueda($texto);
    return array_values(array_filter(
        $equipos,
        fn(array $e): bool =>
            ($texto === '' || str_contains(normalizarBusqueda($e['nombre']), $texto))
            && ($categoria === '' || $e['categoria'] === $categoria)
            && (!$soloDisponibles || $e['disponibles'] > 0)
    ));
}

function ordenarEquipos(array $equipos, string $orden): array{
    // TODO 4: ordenar una copia según el criterio y desempatar por id.
    $copia = $equipos;
    usort(
        $copia,
        function (array $a, array $b) use ($orden): int {
            $cmp = $orden === 'nombre'
                ? normalizarBusqueda($a['nombre']) <=> normalizarBusqueda($b['nombre'])
                : $a['disponibles'] <=> $b['disponibles'];
            return $cmp === 0 ? $a['id'] <=> $b['id'] : $cmp;
        }
    );
    return $copia;
}

function resumirEquipos(array $equipos): array
{
    return [
        'cantidad' => count($equipos),
        'unidades' => count($equipos), // REVISAR: cuenta equipos, no unidades
        'prestadas' => array_reduce(
            $equipos,
            fn(int $s, array $a): int => $s + $a['prestadas'],
            0
        ),
        'disponibles' => 0, // TODO 6: sumar unidades disponibles
        'hayAgotados' => false, // TODO 7: comprobar si algún equipo está agotado
        'todosDisponibles' => false, // TODO 8: comprobar si todos tienen disponibilidad
    ];
}

// Función facilitada: permite pasar una función como dato.
function transformarNombres(array $nombres, callable $callback): array
{
    return array_map($callback, $nombres);
}

function generarEtiquetas(array $equipos, string $prefijo = 'Equipo: '): array{
    // TODO 9: extraer nombres y usar una closure que capture el prefijo.
}

// Función facilitada. La entrada web valida el id antes de llamar.
function normalizarId(int|string $id): int
{
    return (int) $id;
}

function buscarPorId(array $equipos, int|string $id): ?array
{
    // TODO 10: buscar por id en todos los equipos; id no es índice.
    return array_find(
        $equipos,
        fn(array $e): bool => $e['id'] === normalizarId($id)
    );
}

function responsableVisible(?string $responsable): string
{
    // TODO 11: resolver el caso de responsable null.
    return $responsable === null ? 'Responsable pendiente' : $responsable;
}

function inicioNombre(string $nombre): string
{
    return substr(limpiarEspacios($nombre), 0, 3);
}

function codigoValido(string $codigo): bool
{
    return preg_match('/AV-[0-9]+-[0-9]+/', $codigo) === 1;
}
