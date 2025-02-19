# Dashboard Realtime dengan PHP Native & Socket.io

## 📌 Deskripsi Proyek
Proyek ini adalah aplikasi menampilkan data berupa tabel dan dashboard berbasis web menggunakan **PHP Native** dan **Socket.io**. Aplikasi ini memungkinkan data dari database dapat secara real-time ditampilkan tanpa perlu melakukan refresh halaman.

## 🚀 Fitur
- Kenampilkan data dengan WebSocket
- Komunikasi real-time menggunakan **Socket.io**
- Interface sederhana berbasis **HTML, CSS, dan JavaScript**
- Backend menggunakan **PHP Native**

## 🛠️ Teknologi yang Digunakan
- **PHP** (Backend)
- **Node.js & Express.js** (WebSocket Server)
- **Socket.io** (Real-time communication)
- **MySQL** (Database, digunakan untuk menyimpan database)
- **Bootstrap** (UI Framework)

## 📂 Struktur Folder
```
dashboard/
│-- public/
│   │-- index.php  # Halaman utama dashboard
│-- server/
│   │-- db.php  # Koneksi database
│   │-- delete.php  # Halaman hapus data
│   │-- insert.php  # Halaman tambah data
│   │-- fetch.php  # Query data ke json
│-- ws-server/
│   │-- server.js  # Server socket.io
│-- README.md  # Dokumentasi proyek
```

## 🔧 Cara Instalasi dan Menjalankan

### 1️⃣ **Clone Repository**
```bash
git clone https://github.com/edisuherlan/socket.io-dahsboard.git
cd dashboard
```

### 2️⃣ **Setup Backend (PHP & MySQL)**
- Pastikan **Apache & MySQL** berjalan (gunakan **XAMPP/Laragon** jika lokal).
- Buat database baru di **phpMyAdmin**.
- Impor `database/db.sql` ke MySQL.
- Sesuaikan konfigurasi database di file `server/insert.php` dan `server/fetch.php`.

### 3️⃣ **Menjalankan Server WebSocket (Node.js)**
- Install **Node.js** jika belum terpasang.
- Jalankan perintah berikut di terminal:
```bash
cd server
masuk ke direktori dashbaord/ws-server/
npm init -y
npm install express socket.io mysql2 cors
node server.js
```

> Server akan berjalan di `http://localhost:3000`

### 4️⃣ **Jalankan Aplikasi Dashboard**
- Akses `http://localhost/dashboard/public/` di browser.
- Buka beberapa tab untuk menguji tampilan dashboard secara real-time.

## 🎯 Cara Menggunakan
1. Buka aplikasi di browser.
2. Tambahkan/Hapus data mahasiswa dan lihat perubahan realtime yang terjadi.
3. Cobalah membuka aplikasi di dua atau lebih tab/browser untuk melihat komunikasi real-time.

## 📜 Lisensi
Proyek ini bersifat open-source dan dapat digunakan serta dimodifikasi sesuai kebutuhan.

---
**🚀 Selamat mencoba! Jika ada pertanyaan, jangan ragu untuk bertanya!**

