<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# CAISSE DU JOUR

## Installation

###### Cloner dépôt
```
git clone git@github.com:humblo/caisse-du-jour.git
```

## Configuration

###### Installation dependances
````
yarn install
````


###### Installation dépendances
```
composer install
```
###### Key
```
php artisan key:generate
```

###### Env [configuration base de donnée]
```
cp .env.example .env
```

###### Migration tables
```
php artisan migrate
```
###### Seeder bdd
```
php artisan db:seed
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=TypeOperationSeeder
```
###### Lancement : localhost:8000
```
php artisan serve
```
###### Login & mot de passe
```
admin@example.com / admin
```
