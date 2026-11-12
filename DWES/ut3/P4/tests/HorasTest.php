<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use function App\Soporte\validarVideojuego;

final class HorasTest extends TestCase
{
    // COMPLETAR 9. Proveedor y prueba de los cinco valores de horas.
    public static function casosHoras(): array{
        return [
            'mínimo' => ['1', true],
            'máximo' => ['300', true],
            'por debajo' => ['0', false],
            'por encima' => ['301', false],
            'formato' => ['12abc', false],
        ];
    }
    #[DataProvider('casosHoras')]
    public function testHoras(string $horas, bool $valida): void{
        $post = $this->datosValidos();
        $post['horas'] = $horas;
        $resultado = validarVideojuego($post);
        $this->assertSame($valida, !isset($resultado['errores']['horas']));
        if ($valida) {
            $this->assertIsInt($resultado['datos']['horas']);
            $this->assertSame((int) $horas, $resultado['datos']['horas']);
        } else {
            $this->assertNull($resultado['datos']);
        }
    }

    // Proporcionado. Datos válidos sobre los que varías solo horas.
    private function datosValidos(): array
    {
        return [
            'titulo' => 'Islas de cristal',
            'estudio' => 'Nébula Studio',
            'horas' => '35',
            'genero' => 'aventura',
            'fechaLanzamiento' => '',
        ];
    }
}
