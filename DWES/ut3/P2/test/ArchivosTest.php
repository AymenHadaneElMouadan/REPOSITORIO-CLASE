<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ArchivosTest extends TestCase
{
    /** @var list<string> */
    private array $temporales = [];

    protected function tearDown(): void
    {
        foreach ($this->temporales as $temporal) {
            if (is_file($temporal)) {
                unlink($temporal);
            }
        }
    }

    public static function tamanosCartel(): array
    {
        return [
            'vacío' => [0, false],
            'mínimo' => [1, true],
            'máximo' => [2097152, true],
            'superior' => [2097153, false],
        ];
    }

    #[DataProvider('tamanosCartel')]
    public function testTamanoCartel(int $bytes, bool $permitido): void
    {
        $this->assertSame($permitido, tamanoCartelPermitido($bytes));
    }

    public static function nombresCartel(): array
    {
        $valido = str_repeat('a', 32);

        return [
            'png' => [$valido . '.png', true],
            'jpg' => [$valido . '.jpg', true],
            'webp' => [$valido . '.webp', true],
            'mayúsculas' => [str_repeat('A', 32) . '.png', false],
            'corto' => [str_repeat('a', 31) . '.png', false],
            'jpeg' => [$valido . '.jpeg', false],
            'ruta' => ['../archivo', false],
            'vacío' => ['', false],
            'array' => [['x'], false],
        ];
    }

    #[DataProvider('nombresCartel')]
    public function testNombreCartel(mixed $nombre, bool $valido): void
    {
        $this->assertSame($valido, esNombreCartel($nombre));
    }

    public function testEntradaMultipleEsErrorDeEstructura(): void
    {
        $archivo = [
            'name' => ['cartel.png'],
            'type' => ['image/png'],
            'tmp_name' => ['C:\\temporal'],
            'error' => [UPLOAD_ERR_OK],
            'size' => [10],
        ];

        $resultado = validarRecepcionImagen($archivo, true);

        $this->assertSame('Error de estructura.', $resultado['error']);
        $this->assertFalse($resultado['sinCambio']);
    }

    public function testAltaSinArchivoPideImagen(): void
    {
        $ausente = validarRecepcionImagen(null, true);
        $sinArchivo = validarRecepcionImagen([
            'name' => '',
            'type' => '',
            'tmp_name' => '',
            'error' => UPLOAD_ERR_NO_FILE,
            'size' => 0,
        ], true);

        $this->assertSame('Selecciona una imagen.', $ausente['error']);
        $this->assertSame('Selecciona una imagen.', $sinArchivo['error']);
    }

    public function testSustitucionSinArchivoNoEsError(): void
    {
        $resultado = validarRecepcionImagen([
            'name' => '',
            'type' => '',
            'tmp_name' => '',
            'error' => UPLOAD_ERR_NO_FILE,
            'size' => 0,
        ], false);

        $this->assertNull($resultado['error']);
        $this->assertTrue($resultado['sinCambio']);
    }

    public function testDistingueErroresDeRecepcion(): void
    {
        $this->assertSame(
            'Se ha superado el límite de recepción.',
            mensajeErrorRecepcion(UPLOAD_ERR_INI_SIZE)
        );
        $this->assertSame(
            'La recepción ha sido parcial.',
            mensajeErrorRecepcion(UPLOAD_ERR_PARTIAL)
        );
        $this->assertSame(
            'No se ha podido escribir el archivo.',
            mensajeErrorRecepcion(UPLOAD_ERR_CANT_WRITE)
        );
        $this->assertSame(
            'Error de recepción.',
            mensajeErrorRecepcion(UPLOAD_ERR_EXTENSION)
        );
    }

    public function testTamanoInvalidoNoConsultaElTemporal(): void
    {
        $resultado = validarRecepcionImagen([
            'name' => 'vacio.png',
            'type' => 'image/png',
            'tmp_name' => 'C:\\no-existe',
            'error' => UPLOAD_ERR_OK,
            'size' => 0,
        ], true);

        $this->assertSame('Error de tamaño.', $resultado['error']);
    }

    public function testDetectaLimiteDelPost(): void
    {
        $anterior = $_SERVER['CONTENT_LENGTH'] ?? null;
        try {
            $_SERVER['CONTENT_LENGTH'] = (string) (LIMITE_POST_BYTES + 1);
            $this->assertTrue(envioSuperaLimitePost());
            $_SERVER['CONTENT_LENGTH'] = (string) LIMITE_POST_BYTES;
            $this->assertFalse(envioSuperaLimitePost());
        } finally {
            if ($anterior === null) {
                unset($_SERVER['CONTENT_LENGTH']);
            } else {
                $_SERVER['CONTENT_LENGTH'] = $anterior;
            }
        }
    }

    public function testElMimeDecideLaExtension(): void
    {
        $png = base64_decode(
            'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg==',
            true
        );
        $this->assertIsString($png);

        $this->assertSame('png', extensionPorContenido($this->temporal($png, '.txt')));
        $this->assertNull(extensionPorContenido($this->temporal('esto no es una imagen', '.jpg')));
    }

    private function temporal(string $contenido, string $sufijo): string
    {
        $ruta = tempnam(sys_get_temp_dir(), 'cartel');
        if ($ruta === false) {
            $this->fail('No se pudo crear el temporal.');
        }

        $destino = $ruta . $sufijo;
        if (!rename($ruta, $destino)) {
            $this->fail('No se pudo preparar el temporal.');
        }
        if (file_put_contents($destino, $contenido) === false) {
            $this->fail('No se pudo escribir el temporal.');
        }

        $this->temporales[] = $destino;

        return $destino;
    }
}
