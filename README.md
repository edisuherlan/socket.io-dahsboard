# 📡 Realtime Mahasiswa Dashboard dengan Socket.io & MySQL

Proyek ini adalah **dashboard realtime** untuk menampilkan data mahasiswa dan total mahasiswa per prodi menggunakan **PHP native**, **Socket.io**, dan **MySQL**.

## 📥 Instalasi

### 1️⃣ **Clone Repository**
Jalankan perintah berikut di terminal atau Command Prompt:

git clone https://github.com/edisuherlan/socket.io-dahsboard.git
cd reponame


2️⃣ Setup Database
Buat database di MySQL dengan nama db_dashboard.
Import file database.sql yang terdapat dalam repositori ini ke dalam MySQL.

mysql -u root -p db_dashboard < database.sql

Sesuaikan root dengan username MySQL Anda.

Cek tabel mahasiswa setelah import, pastikan struktur sudah sesuai.
3️⃣ Konfigurasi Backend
Pastikan Anda memiliki PHP dan MySQL terinstal.
Jalankan server PHP dengan Laragon atau menggunakan terminal:

php -S localhost:8000 -t public

4️⃣ Menjalankan Server WebSocket
Pastikan Anda memiliki Node.js (Cek dengan node -v di terminal).
Install dependencies dengan perintah berikut:

npm install

Jalankan server WebSocket:

node server.js

Server akan berjalan di http://localhost:3000

🚀 Menjalankan Aplikasi
Pastikan PHP server dan WebSocket server berjalan.
Buka browser dan akses:

http://localhost/yourdirectory/public/

Fitur Realtime:
Tambah data mahasiswa → akan langsung diperbarui di semua client.
Hapus mahasiswa → data diperbarui otomatis.
Total Mahasiswa per Prodi ditampilkan secara real-time.
📌 Fitur
✅ CRUD Mahasiswa (Create, Read, Delete)
✅ Realtime Total Mahasiswa per Prodi
✅ WebSocket dengan Socket.io
✅ Backend PHP + MySQL
