# Inventory app

Application for manage your computer inventory - incidents & more ( working on ).

### Prerequisites

* PHP 7.2
* Mysql
* Composer

## Getting Started

Clone the project

```
git clone https://github.com/VGzsysadm/Inventory-app.git
```
### Installing

Install dependencies

```
cd Inventory-app
composer install
```
### Launch test server

Modify .env file with your database information.

Create the database and tables:

```
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

Turn on the dev server:

```
php -S 127.0.0.1:8000 -t public
```

First of all, execute the script at [https:\\127.0.0.1:8000\configure.php](https://github.com/VGzsysadm/Inventory-app/blob/master/public/configure.php)

An admin user will be created with the user: admin and the password: admin.

Please remove script after the execution.

## Built With

* [Symfony 4](https://symfony.com/doc/current/index.html)
* [Bootstrap](https://getbootstrap.com/docs/4.1/getting-started/introduction/)

## Third party apps

* [FileSaver.js](https://github.com/clarketm/FileSaver.js/)

## Authors

* **VGzsysadm** - *https://sysadm.es* - [@VGzsysadm](https://github.com/VGzsysadm)


