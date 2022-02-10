# API REST Clientes - Avantika

API Rest desarrollada en Laravel para poder crear usuarios para uin sistema de Créditos

## Development Serve

Para correr el servidor usamos php artisan serve y tendremos un servidor local corriendo en el puerto 8000 'http:localhost:8000'
Este servidor solo cuenta con 2 rutas
* /api/register : Registrar un cliente
* /api/clientes : Ver lista de clientes

## DB

La base de datps donde se almacenas los cliente se llama creditos y corre en el puerto 3306 en mysql
El sistema cuenta con migracion para la tabla de cliente, es suficiente tener el puerto 3306 con mysql y una base llamada "creditos" para posteriormente ejecutar
php artisan migrate:fresh
