# Laravel-API

Technical test

## Configuration

### SQL
```sql
-- drop the database but does not fail if it does not exists
DROP DATABASE IF EXISTS `laravel_api`;
-- create the database with multibyte string encoding support
CREATE DATABASE `laravel_api`
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;
-- create the user for the project
CREATE USER 'laravel_api'@'localhost' IDENTIFIED BY '';
-- grant all privileges for the user on our database's project only
GRANT ALL PRIVILEGES on `laravel_api`.* TO 'laravel_api'@'localhost';
-- flush privileges to save any changes
FLUSH PRIVILEGES;
```

### Git installation

#### HTTPS
```shell
git clone https://github.com/Tenebrisse/laravel-api.git
```

#### SSH
```shell
git clone git@github.com:Tenebrisse/laravel-api
```

### Install PHP dependencies
⚠️ This will fail if you skipped the SQL steps ⚠️
```shell
composer install
```

### Create table in database with test data
```shell
php artisan migrate:fresh --seed
```

### Launch server
```shell
php artisan serve
```

### URL for swagger
```
http://127.0.0.1:8000/api/documentation
```

### Regenerate swagger documentation
```shell
php artisan l5-swagger:generate
```
