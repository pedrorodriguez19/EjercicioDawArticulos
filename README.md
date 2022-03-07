# PRÁCTICA MARKDOWN - DAW

## PEDRO RODRÍGUEZ

Esta es una práctica de Despliegue de Aplicaciones desarrollada en _Php_ con el framework _Symfony_ y como gestor de bases de datos _SQLite_.

Consiste en una aplicación web que permita a un periodista gestionar sus articulos permitiendole filtarlos por su categoría.

## Requisitos

| Tecnologías | Versión |
| ----------- | ------- |
| PHP         | 8.0     |
| Symfony     | 6       |
| SQLite      | 3       |

**Linux**

Se puede instalar con el siguiente comando:

`$ sudo apt install php8.0 libapache2-mod-php8.0 php-sqlite3`

y seguir los pasos de la página oficial de [symfony](https://symfony.com/doc/current/setup.html) para instalar composer y symfony cli.

**Windows**

Como todo en windows se instala con un par de clicks

Habrá que ir a la página oficial de [php](https://windows.php.net/download#php-8) y descargar la versión correspondiente, hacer lo mismo con el composer y symfony cli:

- [Composer](https://getcomposer.org/doc/00-intro.md#installation-windows)
- [Symfony Cli](https://symfony.com/download)

Para comprobar si todos los requisitos están instalados abrir una consola en la carpeta del proyecto y ejecutar:

`$ symfony check:requirements`

Cuando esté listo podrás ejecutar la aplicación con:

`$ symfony server:start` y abrir en el navegador [http://localhost:8000](http://localhost:8000)

# Licencia MIT

### En caso de querer contribuir al proyecto crear una rama en git
