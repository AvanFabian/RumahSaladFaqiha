# RumahSaladFaqiha

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/AvanFabian/RumahSaladFaqiha.git
    ```

2. Navigate to the project directory:

    ```bash
    cd RumahSaladFaqiha
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Copy `.env.example` file ke `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Migrasi database (satu-satu):

    ```bash
    php artisan migrate --path=/database/migrations/2024_02_27_142451_create_produks_table.php 
    php artisan migrate --path=/database/migrations/2024_02_27_142438_create_opsiproduks_table.php 
    php artisan migrate --path=/database/migrations/2014_10_12_000000_create_users_table.php 
    php artisan migrate --path=/database/migrations/2024_02_27_142444_create_orders_table.php 
    php artisan migrate  
    ```

7. Buka terminal, ketik:

    ```bash
    php artisan serve
    ```
 
