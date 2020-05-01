# Infyom startup

- clone repository
- create database
```console
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan vendor:publish 
    php artisan infyom.publish:generator-builder 
    php artisan serve
```
  - http://localhost:8000/generator_builder
