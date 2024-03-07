# RumahSaladFaqiha

## Installation

1. Clone repository:

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

4. Copy `.env.example` ke `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate laravel application key:

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
7. Buka terminal 1, ketik:
    ```bash
    npm run dev
    ```
8. Buka terminal 2, ketik:
    ```bash
    php artisan serve
    ```

## Jangan langsung Push ke Branch "Main", tapi Bikin Branch Dulu:
1. Cara Bikin Branch, jalankan:
    ```bash
    git branch -b "nama_branch" (gausah tanda petik)
    ```
    <br />
2. Pastikan lagi branch kita saat ini: (biasanya auto switch setelah bikin branch) 
    ```bash
    git branch
    ```
    <br />
3. Setelah Bikin Branch, "Commit & Push" dulu perubahan yang udh dibuat: <br />
   ![Screenshot 2024-03-07 161022](https://github.com/AvanFabian/RumahSaladFaqiha/assets/113287159/f1eec7c9-e9e0-4506-b05b-0d7518750725) <br /> <br />

4. Setelah itu lakukan pull request, tapi sebelum itu pastikan halaman commit telah kosong <br /> <br />
   
5. Supaya lebih mudah "pull request", Download Ekstensi VsCode "Github Pull Request", Cara Instalasi: <br /> <br />
   A. Download Ekstensi: <br /> <br />
   ![Screenshot 2024-03-07 153919](https://github.com/AvanFabian/RumahSaladFaqiha/assets/113287159/fa32015b-4185-420e-8786-d4ef19a3a328) <br /> <br />
   B. Pastikan "halaman commit telah kosong" <br /> <br />
   C. Pencet Icon "Github Pull Request" di sebelah kiri dan Klik Tombol Create Pull Request: <br /> <br />
   ![Screenshot 2024-03-07 160511](https://github.com/AvanFabian/RumahSaladFaqiha/assets/113287159/9ae2cc7f-ed9c-4342-aa07-a58d575f230c) <br /> <br />
   D. Setelah itu akan muncul halaman Pull Request, Sebelum Klik "Create", Pastikan "Base" branch atau branch yang akan ditimpa oleh perubahan branch kalian saat ini, sudah di-switch ke main: <br />
   ![Screenshot 2024-03-07 160600](https://github.com/AvanFabian/RumahSaladFaqiha/assets/113287159/84df9f06-c967-4706-9c0d-304de8ab6d41) <br /> <br />
