<?php

declare(strict_types=1);

const TAMANO_MINIMO_CARTEL = 1;
const TAMANO_MAXIMO_CARTEL = 2097152;
const LIMITE_POST_BYTES = 8 * 1024 * 1024;

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function directorioCarteles(): string
{
    return __DIR__ . '/../storage/carteles';
}

/**
 * @return array<string, string>
 */
function mimesPermitidos(): array
{
    return [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
    ];
}

function tamanoCartelPermitido(int $bytes): bool
{
    return $bytes >= TAMANO_MINIMO_CARTEL && $bytes <= TAMANO_MAXIMO_CARTEL;
}

function esNombreCartel(mixed $nombre): bool
{
    return is_string($nombre)
        && preg_match('/\A[a-f0-9]{32}\.(jpg|png|webp)\z/', $nombre) === 1;
}

function envioSuperaLimitePost(): bool
{
    $longitud = $_SERVER['CONTENT_LENGTH'] ?? null;
    if (is_int($longitud)) {
        return $longitud > LIMITE_POST_BYTES;
    }
    if (!is_string($longitud) || preg_match('/\A[0-9]+\z/', $longitud) !== 1) {
        return false;
    }

    return (int) $longitud > LIMITE_POST_BYTES;
}

function estructuraArchivoValida(mixed $archivo): bool
{
    return is_array($archivo)
        && isset($archivo['error'], $archivo['size'])
        && is_int($archivo['error'])
        && is_int($archivo['size'])
        && isset($archivo['tmp_name'])
        && is_string($archivo['tmp_name']);
}

function mensajeErrorRecepcion(int $codigo): string
{
    return match ($codigo) {
        UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'Se ha superado el límite de recepción.',
        UPLOAD_ERR_PARTIAL => 'La recepción ha sido parcial.',
        UPLOAD_ERR_NO_TMP_DIR, UPLOAD_ERR_CANT_WRITE => 'No se ha podido escribir el archivo.',
        default => 'Error de recepción.',
    };
}

function mimeDetectado(string $ruta): string|false
{
    if (!is_file($ruta) || !is_readable($ruta)) {
        return false;
    }

    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($ruta);

    return is_string($mime) ? $mime : false;
}

function extensionPorContenido(string $ruta): ?string
{
    $mime = mimeDetectado($ruta);
    if ($mime === false) {
        return null;
    }

    return mimesPermitidos()[$mime] ?? null;
}

function cartelServible(mixed $nombre): ?string
{
    if (!esNombreCartel($nombre)) {
        return null;
    }

    if (extensionPorContenido(directorioCarteles() . '/' . $nombre) === null) {
        return null;
    }

    return $nombre;
}

/**
 * @return array{ok: bool, nombres: list<string>}
 */
function listarCarteles(): array
{
    $rutas = glob(directorioCarteles() . '/*');
    if ($rutas === false) {
        return ['ok' => false, 'nombres' => []];
    }

    $nombres = [];
    foreach ($rutas as $ruta) {
        $nombre = cartelServible(basename($ruta));
        if ($nombre !== null) {
            $nombres[] = $nombre;
        }
    }

    sort($nombres, SORT_STRING);

    return ['ok' => true, 'nombres' => $nombres];
}

/**
 * @return array{error: ?string, archivo: ?array, extension: ?string, sinCambio: bool}
 */
function validarRecepcionImagen(mixed $archivo, bool $obligatoria): array
{
    $resultado = [
        'error' => null,
        'archivo' => null,
        'extension' => null,
        'sinCambio' => false,
    ];

    if ($archivo === null) {
        if ($obligatoria) {
            $resultado['error'] = 'Selecciona una imagen.';
            return $resultado;
        }
        $resultado['sinCambio'] = true;
        return $resultado;
    }

    if (!estructuraArchivoValida($archivo)) {
        $resultado['error'] = 'Error de estructura.';
        return $resultado;
    }

    if ($archivo['error'] === UPLOAD_ERR_NO_FILE) {
        if ($obligatoria) {
            $resultado['error'] = 'Selecciona una imagen.';
            return $resultado;
        }
        $resultado['sinCambio'] = true;
        return $resultado;
    }

    if ($archivo['error'] !== UPLOAD_ERR_OK) {
        $resultado['error'] = mensajeErrorRecepcion($archivo['error']);
        return $resultado;
    }

    if (!tamanoCartelPermitido($archivo['size'])) {
        $resultado['error'] = 'Error de tamaño.';
        return $resultado;
    }

    if (
        !is_file($archivo['tmp_name'])
        || !is_readable($archivo['tmp_name'])
        || !is_uploaded_file($archivo['tmp_name'])
    ) {
        $resultado['error'] = 'No se puede leer el archivo recibido.';
        return $resultado;
    }

    $extension = extensionPorContenido($archivo['tmp_name']);
    if ($extension === null) {
        $resultado['error'] = 'Error de formato.';
        return $resultado;
    }

    $resultado['archivo'] = $archivo;
    $resultado['extension'] = $extension;

    return $resultado;
}

/**
 * @param array{tmp_name?: mixed} $archivo
 * @return array{nombre: ?string, error: ?string}
 */
function guardarCartelSubido(array $archivo, string $extension, ?string $distintoDe = null): array
{
    if (!in_array($extension, mimesPermitidos(), true)) {
        return ['nombre' => null, 'error' => 'Error de formato.'];
    }

    $directorio = directorioCarteles();
    if (!is_dir($directorio) || !is_writable($directorio)) {
        return ['nombre' => null, 'error' => 'El almacenamiento no está disponible.'];
    }

    if (!isset($archivo['tmp_name']) || !is_string($archivo['tmp_name'])) {
        return ['nombre' => null, 'error' => 'Error de estructura.'];
    }

    $nombre = null;
    $destino = null;
    for ($intento = 0; $intento < 5; $intento++) {
        try {
            $candidato = bin2hex(random_bytes(16)) . '.' . $extension;
        } catch (Random\RandomException) {
            return ['nombre' => null, 'error' => 'No se ha podido preparar el archivo.'];
        }

        if (($distintoDe !== null && $candidato === $distintoDe) || !esNombreCartel($candidato)) {
            continue;
        }

        $ruta = $directorio . '/' . $candidato;
        if (!file_exists($ruta)) {
            $nombre = $candidato;
            $destino = $ruta;
            break;
        }
    }

    if ($nombre === null || $destino === null) {
        return ['nombre' => null, 'error' => 'No se ha podido preparar el archivo.'];
    }

    if (move_uploaded_file($archivo['tmp_name'], $destino) !== true) {
        return ['nombre' => null, 'error' => 'No se ha podido guardar el cartel.'];
    }

    return ['nombre' => $nombre, 'error' => null];
}

/**
 * @return array{ok: bool, mensaje: string}
 */
function completarSustitucion(string $anterior, string $nuevo): array
{
    if (!esNombreCartel($anterior) || !esNombreCartel($nuevo) || $anterior === $nuevo) {
        return ['ok' => false, 'mensaje' => 'No se ha podido sustituir el cartel.'];
    }

    $directorio = directorioCarteles();
    $rutaAnterior = $directorio . '/' . $anterior;
    $rutaNueva = $directorio . '/' . $nuevo;
    $retirado = is_file($rutaAnterior) && unlink($rutaAnterior);

    if ($retirado) {
        return ['ok' => true, 'mensaje' => 'El cartel se ha sustituido.'];
    }

    if (is_file($rutaNueva) && !unlink($rutaNueva)) {
        error_log('No se pudo retirar el cartel nuevo.');

        return ['ok' => false, 'mensaje' => 'No se ha podido retirar el cartel anterior.'];
    }

    return [
        'ok' => false,
        'mensaje' => 'No se ha podido retirar el cartel anterior. Se ha retirado la imagen nueva.',
    ];
}
