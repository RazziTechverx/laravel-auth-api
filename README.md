# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone git@github.com:RazziTechverx/laravel-auth-api.git

Switch to the repo folder

    cd laravel-auth-api

Install all the dependencies using composer

    composer install

Setup your local database with these credentials

    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=api-portal-test
    DB_USERNAME=root
    DB_PASSWORD=123

Run the database migrations and seeder (Set the database connection in .env before migrating)

    php artisan migrate --seed

Install the passport for OAuth2

    php artisan passport:install

Run the command to clear cache

    php artisan cache:clear

Start the local development server

    php -S localhost:8000 -t public

You can now access the server at http://127.0.0.1:8000
