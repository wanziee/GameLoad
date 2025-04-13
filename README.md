# 🎮 Gameload - Website Top Up Game

**Gameload** adalah platform top up game online yang cepat, mudah, dan aman. Website ini memungkinkan pengguna untuk melakukan pembelian item atau koin dalam game favorit mereka secara instan dengan berbagai metode pembayaran.

## 🚀 Fitur Unggulan

-   ✅ Top up berbagai game populer seperti Mobile Legends, Free Fire, PUBG Mobile, dll.
-   🔐 Integrasi dengan [Midtrans](https://midtrans.com) sebagai payment gateway
-   ⚡ Data pembelian realtime via [Digiflazz](https://digiflazz.com) API
-   🧾 Riwayat transaksi pengguna
-   📦 Manajemen produk dan harga top up
-   📱 Responsif dan mobile-friendly

## 🛠️ Teknologi yang Digunakan

-   **Laravel** (Backend)
-   **Blade Template** (Frontend)
-   **MySQL** (Database)
-   **Midtrans API** (Pembayaran)
-   **Digiflazz API** (Top up game otomatis)

## 📸 Screenshot

## ⚙️ Instalasi

1. Clone project ini

```bash
git clone https://github.com/username/gameload.git
cd gameload
Install dependency Laravel
composer install
Copy file .env dan atur konfigurasi
cp .env.example .env
Generate key aplikasi
php artisan key:generate
Setup database & migrasi
php artisan migrate
Jalankan server lokal
php artisan serve
🔐 Konfigurasi API

Pastikan kamu memiliki API key dari:
Midtrans
Digiflazz
Lalu isi di file .env seperti:
MIDTRANS_SERVER_KEY=your_midtrans_key
DIGIFLAZZ_USERNAME=your_digiflazz_username
DIGIFLAZZ_API_KEY=your_digiflazz_key
🙌 Kontribusi

Pull request dan issue selalu terbuka!
Kalau kamu punya ide fitur baru atau menemukan bug, silakan kontribusi ke repo ini.
```
