#Crear un proyecto por comandos en Laravel.
1. Para crear el proyecto con Laravel, utilizamos el siguiente comando: `composer create-project laravel/laravel example-app`. donde 'example-app' lo cambiamos por el nombre que queramos para nuestra aplicación.
2. Abrimos el proyecto y ejecutamos `npm install` para tener las dependencias de Node.js actualizadas.
3. Si queremos utilizar el server de Laravel, utilizamos el comando `php artisan server` , pero puedes utilizar el que prefieras.
4. Para controlar el registro de usuario, necesitamos una Base de Datos con los usuarios que inician sesión. Configuramos el archivo que cuelga de la carpeta raiz `.env` y ejecutamos el siguiente comando para crearla: `php artisan migrate` ó el comando `php artisan migrate:refresh` para borrar la que uses con anterioridad y volver a crearla.

5. Para instalar Breeze debemos completar los siguientes puntos:
- Ejecutar el comando para intalar el paquete: `composer require laravel/breeze --dev`
- Instalamos breeze: `php artisan breeze:install`
- Para terminar, instalamos los paquetes de Node.js necesarios con : `npm install && npm run dev`.

6. Crear ruta.... 
7. Modificar navbar ... en las rutas se pone SIEMPRE EL NOMBRE !!!
8. Para crear un controlador, utilizamos el comando: `php artisan make:controller nombreController --invokable ` donde 'nombreController' se cambia por el nombre que queramos. Podemos quitar el '--invokable' si no queremos que cree el invocador por defecto. Para crear el controlador con las clases precreadas, utilizamos la extensión `--resource`.
9. Para crear un middleware, utilizamos el comado: `php artisan make:middleware NameMiddleware`. Los middleware se guardan en http->Controllers->Middleware.
10. Una vez creado y configurado nuestro middleware, debemos añadirlo en el kernel de la aplicación que se encuentra en la ruta: `\app\Http\Request\Kernel.php`


## Request
Para crear nuestras request, utilizamos el siguiente comando:
1. `php artisan make:request ValidationFormRequest`
2. Entramos en el archivo que se a creado dentro de `\app\Http\Request\ValidationFormRequest` y cambiamos la autorización a 'true'.
