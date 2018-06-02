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

When you register in the application, the user by the default is disabled, you need to change the row "is_active" in the table "app_users" to 1.

## Built With

* [Symfony 4](https://symfony.com/doc/current/index.html)
* [Bootstrap](https://getbootstrap.com/docs/4.1/getting-started/introduction/)

## Authors

* **VGzsysadm** - *https://sysadm.es* - [@VGzsysadm](https://github.com/VGzsysadm)


