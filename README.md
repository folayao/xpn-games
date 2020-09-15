<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

##Como correr esta app

NOTA: Recordar instalar las dependencias sino la aplicación no correrá (composer install)

- Crear una base de datos en XAMPP o LAMPP llamda "xpn_games"
- Correr las Migraciones con "php artisan migrate"
- Utilizar Fakers para tener datos de prueba "php artisan db:seed"
- Dirigirse a la bd (roles) y crear un rol de admin (añadir en name y slug) con id = 1
- Iniciar la aplicacion "php artisan serve"
- Registrarse
- Dirigirse nuevamente a PhpMyAdmin y asignar un rol al usuario "user_roles" añadir y se asigna el     usuario registrado como el rol que tendra
- Utiliar la app :D
