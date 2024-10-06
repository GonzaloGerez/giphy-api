# Laravel 10 OAuth API with Passport

This project is a Laravel 10 application configured to provide OAuth authentication using Laravel Passport. The API allows clients to authenticate and obtain access tokens for making authorized requests.

## Prerequisites

Before you can run the application, ensure you have the following installed on your system:

- PHP 8.1+
- Composer
- MySQL or PostgreSQL (or your preferred database)
- Laravel 10
- Laravel Passport

## Setup Instructions

Follow these steps to set up the project:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-repo/laravel-passport-api.git
   cd laravel-passport-api

2. **Install dependencies**:
    composer install

3. **Setup environment**:
    cp .env.example .env

4. **Generate your application key**:
    php artisan key:generate

5. **Run migrations**:
    php artisan migrate

6. **Install passport encryptions keys**:
    php artisan passport:install

7. **Configure passport in file: config/auth.php**:
    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
    ] 

8. **Run the project**:
    php artisan serve