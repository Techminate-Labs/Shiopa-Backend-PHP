# Shiopa, Open Source E-Commerce Solution
Shiopa is an open source e-commerce web application with a Laravel (PHP) backend.

Framework: Laravel

Packages: Sanctum

## Setup instructions 

1. Install xampp
2. then go to `xampp\htdocs`
3. fork this repository
4. clone the forked repository in the `xampp\htdocs` folder
5. launch xampp, start apache and mysql modules and go to `localhost/phpmyadmin`
5. create a database and add it to the database in env.example
6. copy env.example and name it .env
7. open terminal and run `composer install`
8. link to the database with `php artisan storage:link`
8. get the database migrations with `php artisan migrate:fresh`
8. get the database seeds `php artisan seed:db`
9. then run the backend with `php artisan serve`