# ![Laravel Example App](logo.png)

----------

# Getting started

## Installation

Clone the repository

    git clone https://github.com/Tamara-5/test_project.git

Switch to the repo folder

    cd test_project

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Middleware` - Contains the auth middleware
- `app/Http/Controller` - Contains the auth controllers
- `app/Http/Requests` - Contains all form requests
- `config` - Contains all the application configuration files
- `app/Model` - Contains all form models
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all routes of application

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.
