# UT1 · Práctica de repaso: Videoclub en PHP

**TAREA GENERADA CON CLAUDE**

**Fundamentos de PHP, arrays, funciones, `require_once` y fechas** Desarrollo Web en Entorno Servidor · 2.º DAW

No se permite POO, base de datos ni formularios POST.

---

## 1. Estructura mínima

```
videoclub-ut1/
├── public/
│   ├── index.php
│   ├── pelicula.php
│   ├── alquiler.php
│   └── estadisticas.php
└── src/
    ├── datos.php        (ya proporcionado)
    └── funciones.php
```

Todos los archivos PHP deben empezar con:

```php
<?php
declare(strict_types=1);
```

## 2. Catálogo

El catálogo está en `src/datos.php` y contiene 12 películas. Cada una tiene las claves:

`id`, `titulo`, `director`, `genero`, `duracion` (en minutos), `disponible`, `fechaAlta`

Los datos se almacenan únicamente en arrays. No modifiques el archivo.

## 3. funciones.php

Como mínimo deben existir estas funciones propias, con parámetros y retornos tipados:

```
buscarPorId(array $peliculas, int $id): ?array
filtrarPorGenero(array $peliculas, string $genero): array
filtrarDisponibles(array $peliculas): array
buscarPorTexto(array $peliculas, string $texto): array
calcularMediaDuracion(array $peliculas): float
obtenerPeliculaMasLarga(array $peliculas): ?array
contarPorGenero(array $peliculas): array
```

No uses `array_filter`, `array_map` ni `array_reduce`. Resuelve los recorridos mediante `foreach`.

## 4. index.php

1. Incluye los archivos mediante `require_once`.
2. Lista todas las películas.
3. Permite filtrar por género mediante `?genero=`.
4. Permite filtrar por disponibilidad mediante `?disponible=1`.
5. Permite buscar texto en `titulo` o `director` mediante `?q=` (sin distinguir mayúsculas de minúsculas).
6. Permite ordenar mediante `?orden=titulo` o `?orden=duracion`. Puedes usar las funciones de ordenación vistas en UT1 o una solución manual coherente.
7. Los filtros deben poder combinarse entre sí.
8. Muestra el número de resultados.
9. Todos los textos externos o procedentes de la URL se escapan con `htmlspecialchars`.

## 5. pelicula.php

1. Lee `id` mediante GET (con `??`) y conviértelo a `int`.
2. Busca la película mediante una función propia.
3. Si no existe, muestra un mensaje claro.
4. Si existe, muestra todos sus datos.
5. Si está disponible, calcula una fecha de devolución simulada 5 días después de hoy mediante `DateTimeImmutable`.
6. Muestra cuántos días han pasado desde `fechaAlta`.

## 6. alquiler.php

Calcula las condiciones de un alquiler a partir de parámetros GET. Ejemplo:

```
/alquiler.php?id=1&tipo=socio&dias=7&renovacion=si
```

| Parámetro | Valores previstos | Valor por defecto |
| --- | --- | --- |
| `id` | entero | 0 |
| `tipo` | `premium` · `socio` · `ocasional` | `ocasional` |
| `dias` | entero >= 0 | 0 |
| `renovacion` | `si` · `no` | `no` |

Requisitos:

1. Lee los parámetros utilizando `$_GET` y `??`.
2. Convierte `id` y `dias` a `int`.
3. Busca la película con tu función `buscarPorId`. Si no existe, muestra un mensaje claro. Si existe pero no está disponible, muestra un mensaje indicando que no se puede alquilar.
4. Usa `match` para asignar el máximo de días de alquiler: `premium` 10, `socio` 5, `ocasional` 2. Cualquier valor no previsto se trata como `ocasional`.
5. Si `renovacion` es `si`, añade 3 días al límite excepto para usuarios `ocasional`.
6. Clasifica la situación como «correcta», «último día», «retraso leve» o «retraso grave». Usa estos límites y déjalos visibles como constantes: **retraso leve de 1 a 3 días, retraso grave de 4 días o más**.
7. Calcula una penalización de 0,75 € por cada día de retraso (también como constante). Muéstrala con dos decimales y coma decimal.
8. Muestra una frase completa usando interpolación o concatenación.
9. Genera con un bucle una lista con los días de retraso, pero no muestres más de 10 líneas. Si hay más retraso, añade «…» al final.
10. Muestra el valor de `tipo` recibido por URL. Escapa cualquier texto procedente de la URL antes de incluirlo en HTML.

## 7. estadisticas.php

1. Número total de películas.
2. Número de disponibles y no disponibles.
3. Duración media.
4. Película más larga.
5. Número de películas por género.
6. Fecha y hora en que se generó el informe.
7. Fecha de la próxima revisión del catálogo, 30 días después del momento actual.

---

## 8. URLs de prueba

Se asume el servidor en `http://localhost:8000/` (por ejemplo, `php -S localhost:8000 -t public`).

### index.php

| URL | Resultado esperado |
| --- | --- |
| `/` | 12 películas. |
| `/?genero=accion` | 4 películas: Mad Max, John Wick, Gladiator, Los siete samuráis. |
| `/?genero=comedia` | 3 películas. |
| `/?genero=terror` | 2 películas. |
| `/?genero=animacion` | 3 películas. |
| `/?genero=western` | 0 resultados (sin errores en pantalla). |
| `/?disponible=1` | 8 películas disponibles. |
| `/?genero=accion&disponible=1` | 3 resultados: Mad Max, Gladiator, Los siete samuráis. |
| `/?genero=comedia&disponible=1` | 2 resultados: Resacón en Las Vegas, El gran Lebowski. |
| `/?q=wick` | 1 resultado: John Wick. |
| `/?q=kubrick` | 1 resultado: El resplandor (búsqueda por director). |
| `/?q=up` | 2 resultados: Superbad y Up (coincidencia parcial, sin distinguir mayúsculas). |
| `/?q=UP` | Los mismos 2 resultados. |
| `/?q=zzz` | 0 resultados. |
| `/?orden=duracion` | 81, 96, 100, 101, 113, 117, 120, 125, 127, 144, 155, 207. |
| `/?orden=titulo` | El gran Lebowski, El resplandor, El viaje de Chihiro, Gladiator, Hereditary, John Wick, Los siete samuráis, Mad Max: Furia en la carretera, Resacón en Las Vegas, Superbad, Toy Story, Up. |
| `/?genero=animacion&orden=duracion` | Toy Story (81), Up (96), El viaje de Chihiro (125). |
| `/?q=%3Cscript%3Ealert(1)%3C%2Fscript%3E` | 0 resultados. El texto buscado se muestra como texto, sin ejecutarse ningún script. |

### pelicula.php

| URL | Resultado esperado |
| --- | --- |
| `/pelicula.php?id=1` | Mad Max. Disponible, fecha de devolución simulada 5 días después de hoy. Días desde `2025-01-10` hasta hoy (el 1 de octubre de 2026 serían 629). |
| `/pelicula.php?id=2` | John Wick. No disponible, no se muestra fecha de devolución. |
| `/pelicula.php?id=999` | Mensaje de película no encontrada. |
| `/pelicula.php` | Mensaje de película no encontrada (id por defecto). |
| `/pelicula.php?id=abc` | Mensaje de película no encontrada. |

### alquiler.php

Todas con la película 1 (Mad Max, disponible) salvo que se indique otra cosa.

| URL | Resultado esperado |
| --- | --- |
| `/alquiler.php?id=1&tipo=socio&dias=3&renovacion=no` | Límite 5. **Correcta**. Retraso 0, penalización 0,00 €. Sin lista. |
| `/alquiler.php?id=1&tipo=socio&dias=5&renovacion=no` | Límite 5. **Último día**. Retraso 0, penalización 0,00 €. |
| `/alquiler.php?id=1&tipo=socio&dias=7&renovacion=no` | Límite 5. **Retraso leve**. Retraso 2, penalización 1,50 €. Lista de 2 líneas. |
| `/alquiler.php?id=1&tipo=socio&dias=7&renovacion=si` | Límite 8. **Correcta**. Retraso 0, penalización 0,00 €. |
| `/alquiler.php?id=1&tipo=premium&dias=20&renovacion=no` | Límite 10. **Retraso grave**. Retraso 10, penalización 7,50 €. Lista de 10 líneas, sin «…». |
| `/alquiler.php?id=1&tipo=premium&dias=25&renovacion=si` | Límite 13. **Retraso grave**. Retraso 12, penalización 9,00 €. Lista de 10 líneas y «…» al final. |
| `/alquiler.php?id=1&tipo=ocasional&dias=4&renovacion=si` | Límite 2 (los ocasionales no renuevan). **Retraso leve**. Retraso 2, penalización 1,50 €. |
| `/alquiler.php?id=1&tipo=ocasional&dias=6&renovacion=no` | Límite 2. **Retraso grave**. Retraso 4, penalización 3,00 €. |
| `/alquiler.php?id=1&tipo=vip&dias=3&renovacion=no` | `vip` no es un valor previsto, se trata como ocasional. Límite 2. **Retraso leve**. Retraso 1, penalización 0,75 €. |
| `/alquiler.php?id=1&tipo=socio&dias=abc` | `dias` se convierte a 0. Límite 5. **Correcta**. |
| `/alquiler.php?id=1` | Valores por defecto (ocasional, 0 días, sin renovación). **Correcta**. |
| `/alquiler.php?id=1&tipo=%3Cscript%3Ealert(1)%3C%2Fscript%3E` | El tipo recibido se muestra escapado como texto. Se trata como ocasional. |
| `/alquiler.php?id=2&tipo=socio&dias=3` | Mensaje: la película no está disponible para alquilar. |
| `/alquiler.php?id=999&tipo=socio&dias=3` | Mensaje de película no encontrada. |

### estadisticas.php

| URL | Resultado esperado |
| --- | --- |
| `/estadisticas.php` | Total: 12. Disponibles: 8. No disponibles: 4. Duración media: 123,83 min. Más larga: Los siete samuráis, 207 min. Por género: accion 4, comedia 3, terror 2, animacion 3. Fecha y hora de generación y fecha de revisión a 30 días vista. |

---

## 9. Criterios de autocomprobación

- Todos los archivos empiezan con `declare(strict_types=1);`.
- Las rutas de `require_once` funcionan desde `public/`.
- Ninguna función usa `array_filter`, `array_map` ni `array_reduce`.
- Ningún texto procedente de la URL llega al HTML sin pasar por `htmlspecialchars`.
- Los límites de retraso y la penalización están en constantes, no escritos a mano dentro de las condiciones.
- Una URL sin parámetros o con parámetros erróneos nunca muestra errores ni *warnings* de PHP.