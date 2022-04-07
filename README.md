<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

### Laverix

Aplicación web con Laravel 9 con las siguientes funcionalidades requeridas:
- Inicio de sesión
- Cerrar sesión
- Recuperación/Cambio de contraseña
- Gestión de Roles. (CRUD). Sólo para usuarios administradores
- Asignación de permisos
- Gestión completa de usuarios (CRUD). 
o Nombres
o Apellidos
o Teléfono
o Dirección
o Fecha de nacimiento
o Fecha de nacimiento
o Selección múltiple de Roles
- Mensaje de notificación de las acciones del CRUD vía email.
- Búsqueda de usuarios por nombres y/o apellidos.
- Incluir paginado de usuarios.
- Incluir un usuario administrador por defecto con permiso para gestionar todo.
- Realizar validaciones de los formularios en el backend

## Instalacion

- Requiere tener instalado xamp o laragon que soporte php 8.0 o superior
- Instalar composer
- Tener instalado nodeJS v14 o superior para correr comandos npm
- Crear la base de datos con el nombre de laverix en MySQL
- Para configurar correo con [Gmail](https://programacionymas.com/blog/como-enviar-mails-correos-desde-laravel#:~:text=Para%20dar%20la%20orden%20a,su%20orden%20ha%20sido%20enviada.).


- Configurar el archivo .env pueden usar siguiente guia

```sh
    APP_NAME=Laverix
	APP_ENV=local
	APP_KEY=base64:/miU/8FvQpxcF4oQTxtdvF4UEK45maVq758tE11ezSM=
	APP_DEBUG=true
	APP_URL=http://localhost

	LOG_CHANNEL=stack
	LOG_DEPRECATIONS_CHANNEL=null
	LOG_LEVEL=debug

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=laverix
	DB_USERNAME=root
	DB_PASSWORD=

	BROADCAST_DRIVER=log
	CACHE_DRIVER=file
	FILESYSTEM_DRIVER=local
	QUEUE_CONNECTION=sync
	SESSION_DRIVER=file
	SESSION_LIFETIME=120

	MEMCACHED_HOST=127.0.0.1

	REDIS_HOST=127.0.0.1
	REDIS_PASSWORD=null
	REDIS_PORT=6379

	MAIL_DRIVER=smtp
	MAIL_HOST=smtp.gmail.com
	MAIL_PORT=587
	MAIL_USERNAME=chisk9@gmail.com
	MAIL_PASSWORD=clave a generar en la configuracion de google
	MAIL_ENCRYPTION=tls
	MAIL_FROM_ADDRESS=chisk9@gmail.com //tu correo
	MAIL_FROM_NAME="${APP_NAME}"

	AWS_ACCESS_KEY_ID=
	AWS_SECRET_ACCESS_KEY=
	AWS_DEFAULT_REGION=us-east-1
	AWS_BUCKET=
	AWS_USE_PATH_STYLE_ENDPOINT=false

	PUSHER_APP_ID=
	PUSHER_APP_KEY=
	PUSHER_APP_SECRET=
	PUSHER_APP_CLUSTER=mt1

	MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
	MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

Deben ejecutar el comando dentro del proyecto por consola para la creacion de la base de datos y llenar con datos por defecto:

```sh
    composer install
	composer dump-autoload
	php artisan migrate:install
	php artisan migrate:fresh --seed
    usuario admin es: admin@gmail.com
    password: admin.2022
```
