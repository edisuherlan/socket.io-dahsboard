-- Membuat database untuk mengelola data mahasiswa
CREATE DATABASE IF NOT EXISTS mahasiswa_db;

-- Menggunakan database mahasiswa_db
USE mahasiswa_db;

-- Membuat tabel mahasiswa dengan 8 kolom
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    angkatan YEAR NOT NULL,
    email VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    no_hp VARCHAR(15) NOT NULL
);

-- Menambahkan dummy data sebanyak 20 mahasiswa
INSERT INTO mahasiswa (nama, nim, jurusan, angkatan, email, alamat, no_hp) VALUES
('Ahmad Fauzi', '1234567890', 'Teknik Informatika', 2019, 'ahmad.fauzi@example.com', 'Jl. Merdeka No. 1', '081234567890'),
('Budi Santoso', '1234567891', 'Sistem Informasi', 2018, 'budi.santoso@example.com', 'Jl. Sudirman No. 2', '081234567891'),
('Citra Dewi', '1234567892', 'Teknik Komputer', 2020, 'citra.dewi@example.com', 'Jl. Gatot Subroto No. 3', '081234567892'),
('Dedi Pratama', '1234567893', 'Teknik Informatika', 2019, 'dedi.pratama@example.com', 'Jl. Thamrin No. 4', '081234567893'),
('Eka Putri', '1234567894', 'Sistem Informasi', 2018, 'eka.putri@example.com', 'Jl. Ahmad Yani No. 5', '081234567894'),
('Fajar Hidayat', '1234567895', 'Teknik Komputer', 2020, 'fajar.hidayat@example.com', 'Jl. Diponegoro No. 6', '081234567895'),
('Gita Sari', '1234567896', 'Teknik Informatika', 2019, 'gita.sari@example.com', 'Jl. Sisingamangaraja No. 7', '081234567896'),
('Hadi Wijaya', '1234567897', 'Sistem Informasi', 2018, 'hadi.wijaya@example.com', 'Jl. Imam Bonjol No. 8', '081234567897'),
('Indah Lestari', '1234567898', 'Teknik Komputer', 2020, 'indah.lestari@example.com', 'Jl. Jenderal Sudirman No. 9', '081234567898'),
('Joko Susilo', '1234567899', 'Teknik Informatika', 2019, 'joko.susilo@example.com', 'Jl. Pahlawan No. 10', '081234567899'),
('Kiki Amalia', '1234567800', 'Sistem Informasi', 2018, 'kiki.amalia@example.com', 'Jl. Diponegoro No. 11', '081234567800'),
('Lukman Hakim', '1234567801', 'Teknik Komputer', 2020, 'lukman.hakim@example.com', 'Jl. Gatot Subroto No. 12', '081234567801'),
('Maya Sari', '1234567802', 'Teknik Informatika', 2019, 'maya.sari@example.com', 'Jl. Merdeka No. 13', '081234567802'),
('Nina Kurnia', '1234567803', 'Sistem Informasi', 2018, 'nina.kurnia@example.com', 'Jl. Sudirman No. 14', '081234567803'),
('Oka Pratama', '1234567804', 'Teknik Komputer', 2020, 'oka.pratama@example.com', 'Jl. Thamrin No. 15', '081234567804'),
('Putri Ayu', '1234567805', 'Teknik Informatika', 2019, 'putri.ayu@example.com', 'Jl. Ahmad Yani No. 16', '081234567805'),
('Qori Hidayat', '1234567806', 'Sistem Informasi', 2018, 'qori.hidayat@example.com', 'Jl. Diponegoro No. 17', '081234567806'),
('Rina Sari', '1234567807', 'Teknik Komputer', 2020, 'rina.sari@example.com', 'Jl. Sisingamangaraja No. 18', '081234567807'),
('Siti Nurhaliza', '1234567808', 'Teknik Informatika', 2019, 'siti.nurhaliza@example.com', 'Jl. Imam Bonjol No. 19', '081234567808'),
('Toni Wijaya', '1234567809', 'Sistem Informasi', 2018, 'toni.wijaya@example.com', 'Jl. Jenderal Sudirman No. 20', '081234567809');

