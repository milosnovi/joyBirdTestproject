

## Installation

git clone git@github.com:milosnovi/joyBirdTestproject.git .


## Start local environment

Open the project root folder and run the following commands:

```
cp .env.example .env
composer install
php artisan key:generate
php artisan serve --port=8081
```

Local website is now running on: http://localhost:8081

## run tests

To run tests, execute the phpunit command from your terminal:

```
phpunit
```
