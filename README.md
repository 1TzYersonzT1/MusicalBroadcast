# Como correr la app

Instale las dependencias ejectutando el comando
**composer install**

Luego ejecute 
**npm install**

Haga una copia del archivo .env.example hacia el archivo .env
**cp .env.example .env**

Genere la llave de acceso
**php artisan key:generate**

Realize las migraciones de la base de datos
**php artisan migrate**

Finalmente ponga en ejecución la app
**php artisan serve**

