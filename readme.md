## Laravel 4.0.5 MicroBlog

### Installation

#### Clone this repo

    git clone https://github.com/steven-/LaravelMvc MicroBlogLaravel
    cd MicroBlogLaravel

### Install dependencies

    composer install

### Permissions 

Make the app/storage and public/avatars directories writable

    chmod -R o+w app/storage
    chmod -R o+w public/avatars


#### Create a database

    create database laravelMvc default character set utf8;

#### Migrate the db

    php artisan migrate:install
    php artisan migrate
    
#### Seed the db with sample data

    php artisan db:seed



### Enjoy

At last you can browse to the /public directory to see the app.
All users have the same password : "pass"