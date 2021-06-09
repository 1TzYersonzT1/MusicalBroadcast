## Como correr la app

* ### Pre requisitos

Para hacer uso de las instrucciones que aparecen listadas debajo, consideré tener instalado en su computadora
estos programas.

1. [XAMPP](https://www.apachefriends.org/es/index.html)
2. [Composer](https://getcomposer.org/)
3. [NodeJS](https://nodejs.org/en/)
4. Terminal/Consola de comandos.

* ### Instalación

Haciendo uso de su terminal o consola de comandos...

Instale las dependencias de laravel via composer

```html
composer install
```

Luego, instale los paquetes npm

```html
npm install
```
Haga una copia del archivo de variables de entorno

```html
copy .env.example .env
```

Genere la llave de acceso
```html
php artisan key:generate
```
#### Consideraciones adicionales

Para hacer uso de la base de datos es importante modificar el archivo .env con los valores que 
correspondan a su configuración Mysql
```html
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ejemplo
DB_USERNAME=usuario_1
DB_PASSWORD=password_1
```

Realize las migraciones de la base de datos para crear las tablas
```html
php artisan migrate
```

Ejecute el siguiente comando para poblar la base de datos con información.
```html
php artisan db:seed
```
* ### Ejecutar.

Desde este instante ya es posible conectarse a la aplicación, para ello ejecute en su terminal o consola

```html
php artisan serve
```
Y luego dirijase a su navegador de internet e ingrese la dirección ip junto al puerto definido en xampp

Ejemplo:
```html
localhost:8000/
```


