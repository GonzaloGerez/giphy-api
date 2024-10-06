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

# Diagrama de Casos de Uso

![Use Case Diagram](https://app.diagrams.net/#G1jyEItYIM788mauATujv3pixphryrNbm1#%7B%22pageId%22%3A%22b5b7bab2-c9e2-2cf4-8b2a-24fd1a2a6d21%22%7D)

# Diagrama de Clases

![Class Diagram](https://app.diagrams.net/?libs=general;uml#G19EmWR3_QktYGQCPS7XfZDpwxv71F9ItO#%7B%22pageId%22%3A%22C5RBs43oDa-KdzZeNtuy%22%7D)

# Diagrama de secuencia

![Secuence Diagram](https://app.diagrams.net/#G1imIz0ERaGiODGkl-xrzXtj0lKjfc8LpN#%7B%22pageId%22%3A%222YBvvXClWsGukQMizWep%22%7D)

# Diagrama entidad relación

![DER](https://app.diagrams.net/?libs=general;er#G1MoyVhIlcksrmJrSUHUtJZj9VaXI82uOP#%7B%22pageId%22%3A%22R2lEEEUBdFMjLlhIrx00%22%7D)