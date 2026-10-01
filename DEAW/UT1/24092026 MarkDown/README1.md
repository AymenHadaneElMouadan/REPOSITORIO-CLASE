# Tienda Online

## INDICE

- [1.Instalacion](#instalacion)
- [2.Configuracion de la base de datos](#configuracion-de-la-base-de-datos)
- [3.Enlaces de Interes](#enlaces-de-interes)
    - [3.1 Documentacion](#documentacion)
- [4.Variables de Entorno](#variables-de-entorno)

## Instalacion

Ejecuta el archivo *.exe* para que se inicie la instalacion.
**Recuerda ejecutar el archivo como administrador**

## Configuracion de la base de datos

Despliegue de contenedor mediante `docker run`
```bash
docker pull nombreImagen
docker run -d --name web -p 8080:80 mi-web:1.0
docker ps 
```

Despliegue de una aplicacion de apache
1. Comprobar version ejecutando `docker --version`
2. Contruir la imagen y arranque
    1. `docker build -t mi-apache:1.0 .`
    2. `docker run -d --name apache -p 8080:80 mi-apache:1.0`
3. Comprobar que responde con `docker ps`

### Enlaces de Interes

#### Documentacion
[NODE JS](https://nodejs.org/docs/latest/api/) <br>
![Logo NODEJS](data:image/png;base64,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)
<br> 
[GIT](https://git-scm.com/docs/git/es) <br>
![Logo GIT](imagen.png)

[1]: https://nodejs.org/docs/latest/api/
[2]: https://git-scm.com/docs/git/es

Si desea obtener mas informacion visita la documentacion oficial tanto de [NODEJS][1] como de [GIT][2]

### Variables de entorno 


| 3 tiendas de Ropa | Prendas Habituales |
| --- | --- |
| HYM | Pantalones |
| Pull y Bear | Sudaderas |
| Primark | Calcetines |


Advertencia de backups:
>Tener cuidado a la hora de manejar los archivos 


<!-- Comnetario oculto para el desarrollador -->


