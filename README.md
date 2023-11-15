# Bacaan Developer Platform

Platform menulis dengan backend dibuat dari Filament dan Frontend Livewire.

## Menginstal Proyek

- Clone proyek ini
- Jalankan `composer install`
- Salin `.env.example` ke `.env`
- Jalankan `php artisan key:generate`
- Jalankan `php artisan migrate --seed`, sebelumnya pastikan sudah sesuaikan `.env` untuk database
- Jalankan `npm install`
- Jalankan `npm run dev` untuk development, `npm run build` untuk production
- Untuk login `http://localhost:8000/admin` credential bisa dilihat pada `database/seeds/UserSeeder.php`
