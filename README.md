Buen dia o tarde, estimado lector, junto con saludarte te indico las instrucciones para la instalacion del proyecto en tu equipo:

Se necesita un servidor apache corriendo, junto con una BD en mysql (puede ser solucionado con XAMPP o LAMP)

Una vez descargado el repositorio, nos dirigimos a la carpeta "app" y ejecutamos el comando "php artisan serve" (con previa instalacion de composer obviamente)


Para la coneccion de la app con la BD se requiere que esta se encuentre en la misma ruta hacia la cual apunta el archivo .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bluecompany
DB_USERNAME=root
DB_PASSWORD=

NOTA: CREAR SCHEMA CON EL NOMBRE DEL PARAMETRO PARA DB_DATABASE

Cuando ya tengamos todo listo, corremos las migraciones con: "php artisan migrate"
Una vez listas las migraciones, iniciamos los seeders con los siguientes comandos :


php artisan db:seed --class CategoriaSeeder
php artisan db:seed --class ProductoSeeder
php artisan db:seed --class CategoriaSeeder


Con esto ya listo podemos registrarnos en el sistema y acceder a las funciones solicitadas  en el documento enviado por correo hacia mi.

las rutas estan en sus respectivas carpetas ("web" para la aplicacion y "api" para postman o cualquier servicio)


Nota: Tuve una pequeña complicacion al mostrar como se añaden multiples categorias a un producto (problemas con JS no funcionales)

