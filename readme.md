## Laravel 4.0.5 MicroBlog

### Installation

##### Clone this repo

    git clone https://github.com/steven-/LaravelMvc MicroBlogLaravel4
    cd MicroBlogLaravel4

##### Install dependencies

    php composer.phar install

##### Permissions 

Make the app/storage and public/avatars directories writable

    chmod -R o+w app/storage public/avatars


##### Create a database

MySQL :

    create database microblog_laravel4 default character set utf8 collate utf8_general_ci;

##### Migrate the db

    php artisan migrate:install
    php artisan migrate
    
##### Seed the db with sample data

    php artisan db:seed



### Enjoy

At last you can browse to the /public directory to see the app.
All users have the same password : "pass"