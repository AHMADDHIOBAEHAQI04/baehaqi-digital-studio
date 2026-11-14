# Portofolio Ahmad Dhio Baehaqi

Portofolio profesional Laravel 12 dengan Blade, Vite, dan data JSON. Tidak memerlukan database. Konfigurasi Docker dan Render di repositori ini disiapkan untuk deployment; belum ada layanan atau repository jarak jauh yang dibuat.

## Menjalankan secara lokal

Persyaratan: PHP 8.2+, Composer 2, Node.js 22+, dan npm.

Di PowerShell pada direktori proyek:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
npm ci
```

Jalankan Laravel dan Vite pada dua terminal:

```powershell
php artisan serve
npm run dev
```

Buka `http://127.0.0.1:8000`. Untuk membuat aset Vite produksi, jalankan `npm run build`.

## Data dan aset

- Data profil, pendidikan, pengalaman, keahlian, proyek, dan kontak ada di `resources/data/portfolio.json`.
- Gambar yang digunakan situs tersimpan di `public/assets/`.
- Dokumen CV tidak disertakan dalam work copy, Git, atau Docker build context.
- Proyek tambahan tanpa screenshot atau detail produksi tetap ditampilkan tanpa aset rekaan.

## Deploy ke Render

1. Buat repository GitHub baru dari work copy ini saja. Jangan masukkan folder `backup`, `.env`, file PDF, database lokal, `vendor`, atau `node_modules`.
2. Di Render, pilih **New > Blueprint** dan tautkan repository tersebut. Render membaca `render.yaml` dan membuat Docker Web Service berplan Free.
3. Pastikan `APP_ENV=production`, `APP_DEBUG=false`, dan `APP_KEY` dibuat oleh Render sebagai environment variable rahasia. Jangan membuat atau menyalin production key ke Git/Dockerfile/laporan.
4. Tidak perlu database. Session memakai filesystem ephemeral, cache menggunakan array, queue sinkron, dan log menuju stderr.
5. Setelah deploy, ikuti pengujian pascadeploy pada `RENDER_DEPLOYMENT_READINESS.md`.

Render Free memakai filesystem ephemeral, dapat menghentikan service setelah idle, dan tidak menyediakan SLA atau persistent disk. File runtime/session hilang saat restart/redeploy; data portofolio dan aset statis tetap dibangun ke image. Free cocok untuk demonstrasi/hobi, bukan jaminan layanan produksi.

## Pemeriksaan lokal

```powershell
php artisan route:list
php artisan test
npm run build
```

Docker diperlukan untuk membangun dan menguji image. Jika Docker belum tersedia, pengujian image/runtime tetap belum terverifikasi.
