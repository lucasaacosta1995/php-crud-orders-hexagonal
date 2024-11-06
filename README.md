# Proyecto 4: Sistema de Gestión de Pedidos (Arquitectura Hexagonal)

## Descripción:
Este proyecto es un ejemplo de cómo aplicar la arquitectura hexagonal en PHP para un sistema de gestión de pedidos. Permite crear y consultar pedidos, utilizando la separación de capas para facilitar el mantenimiento y la escalabilidad.

## Tecnologías Usadas:
  - PHP 8.0+
  - illuminate/database: Eloquent ORM para interactuar con la base de datos.
  - PHPUnit: Framework de pruebas unitarias.
  - monolog/monolog: Librería para registro de logs.

## Requisitos:
  - PHP 8.0 o superior.
  - Composer.
  - Base de datos MySQL o SQLite (configurable).

## Instalación:
  1. Clona el repositorio:

     ```bash
     git clone https://github.com/lucasaacosta1995/php-crud-orders-hexagonal.git
     cd php-crud-orders-hexagonal
     ```

  2. Instala las dependencias con Composer:

     ```bash
     composer install
     ```

  3. Configura la base de datos en el archivo `config/database.php`.


  4. Ejecuta el servidor PHP para el entorno de desarrollo:

     ```bash
     php -S localhost:8000 -t public
     ```

## Estructura del Proyecto:

```bash
.
├── src/
│   ├── Application/
│   │   └── OrderService.php
│   ├── Domain/
│   │   └── Order.php
│   ├── Infrastructure/
│   │   └── DatabaseConnection.php
├── tests/
│   └── OrderServiceTest.php
├── public/
│   └── index.php
└── config/
    └── database.php
```

## Descripción de Directorios y Archivos:
    - /src: Contiene las clases que implementan la lógica de negocio y servicios de pedidos.
    - /tests: Contiene las pruebas unitarias para el servicio de gestión de pedidos.
    - /public: Entrada pública de la aplicación.
    - /config: Configuración de la base de datos.

## Funcionalidades:
    - Crear y consultar pedidos.
    - Almacenamiento de pedidos en base de datos.
    - Uso de arquitectura hexagonal para separar la lógica de dominio, aplicación e infraestructura.

## Configuración:
    - Configura tu entorno:
        - Asegúrate de tener configurada la base de datos en el archivo config/database.php.
        - Crea una base de datos y tablas necesarias.

## Ejecución de Pruebas:
```bash
./vendor/bin/phpunit --testdox
```