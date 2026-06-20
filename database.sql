-- SQL Database untuk Desa Wisata Tempurejo
-- Database Name: desa_wisata_tempurejo

CREATE DATABASE IF NOT EXISTS `desa_wisata_tempurejo`;
USE `desa_wisata_tempurejo`;

-- 1. Table Users (Admin)
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `fullname` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Password default: admin123 (di-hash menggunakan PASSWORD_DEFAULT)
INSERT INTO `users` (`username`, `password`, `email`, `fullname`) 
VALUES ('admin', '$2y$10$wzN4d2j0G5wzZ8EUpH55De8eLgU.Wv4lA12j8J5t13tTq9D7tEweG', 'admin@tempurejo.desa.id', 'Administrator PortalRejo')
ON DUPLICATE KEY UPDATE `username`=`username`;

-- 2. Table Mitra
CREATE TABLE IF NOT EXISTS `mitra` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `deskripsi` TEXT,
  `logo` VARCHAR(255),
  `link` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `mitra` (`nama`, `deskripsi`, `logo`, `link`) VALUES
('UNP KEDIRI', 'Universitas Nusantara PGRI Kediri yang aktif mendukung pengabdian masyarakat dan pengembangan desa binaan.', 'unp_logo.png', 'https://unpkediri.ac.id'),
('PPKO 2026 HimaBio Helianthus', 'Program Penguatan Kapasitas Organisasi Kemahasiswaan Himpunan Mahasiswa Biologi Helianthus UNP Kediri.', 'himabio_logo.png', '#');

-- 3. Table Paket Wisata
CREATE TABLE IF NOT EXISTS `paket_wisata` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `deskripsi` TEXT NOT NULL,
  `harga` DECIMAL(10, 2) NOT NULL,
  `fasilitas` TEXT NOT NULL,
  `gambar` VARCHAR(255),
  `whatsapp_link` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `paket_wisata` (`nama`, `deskripsi`, `harga`, `fasilitas`, `gambar`, `whatsapp_link`) VALUES
('Paket Jelajah Alas Karet (Alaska)', 'Petualangan asri menyusuri hutan karet Alaska Desa Tempurejo yang rindang. Menikmati suasana sejuk, menyusuri aliran sungai jernih, dan menikmati hidangan lokal di bawah naungan pohon karet.', 75000.00, 'Pemandu Lokal, Makan Siang Lesehan, Air Mineral, Tiket Masuk Alaska, Dokumentasi', 'paket_edukasi.jpg', 'https://wa.me/6281234567890?text=Halo%20Desa%20Wisata%20Tempurejo%2C%20saya%20tertarik%20memesan%20Paket%20Jelajah%20Alas%20Karet%20(Alaska).'),
('Paket Rekreasi Wisata Jembangan', 'Nikmati kesegaran mata air alami di Jembangan. Sangat cocok untuk wisata keluarga dengan kolam pemandian yang jernih, terapi ikan alami, dan gazebo teduh untuk berkumpul.', 90000.00, 'Tiket Masuk Jembangan, Gazebo Eksklusif, Makan Siang Prasmanan Khas Desa, Terapi Ikan, Pemandu Wisata', 'paket_jelajah.jpg', 'https://wa.me/6281234567890?text=Halo%20Desa%20Wisata%20Tempurejo%2C%20saya%20tertarik%20memesan%20Paket%20Rekreasi%20Wisata%20Jembangan.'),
('Paket Terusan Alaska - Jembangan', 'Paket petualangan lengkap satu hari penuh. Menjelajahi keasrian hutan karet Alaska di pagi hari, disusul makan siang bersama, dan relaksasi menyegarkan di kolam pemandian Jembangan pada sore hari.', 150000.00, 'Pemandu Seharian, Tiket Masuk Alaska & Jembangan, Makan Siang, Snack Box, Souvenir Kerajinan Tangan', 'paket_budaya.jpg', 'https://wa.me/6281234567890?text=Halo%20Desa%20Wisata%20Tempurejo%2C%20saya%20tertarik%20memesan%20Paket%20Terusan%20Alaska%20-%20Jembangan.');

-- 4. Table Fasilitas
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `deskripsi` TEXT NOT NULL,
  `ikon` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `fasilitas` (`nama`, `deskripsi`, `ikon`) VALUES
('Homestay Tradisional Tempurejo', 'Rumah joglo kayu yang nyaman dengan sentuhan modern, menyajikan suasana asri khas pedesaan di sekitar kawasan wisata.', 'fa-home'),
('Outbound Area Alaska', 'Lapangan rumput hijau luas di bawah keteduhan pohon karet Alaska, sangat pas untuk camping dan outbound gathering.', 'fa-campground'),
('Gazebo Teduh Jembangan', 'Gazebo-gazebo kayu di tepian kolam mata air Jembangan untuk tempat bersantai bersama rombongan keluarga.', 'fa-landmark'),
('Pemandu Lokal Berlisensi', 'Pemuda karang taruna Desa Tempurejo yang ramah dan terlatih membimbing rute penjelajahan Alaska dan Jembangan.', 'fa-users'),
('Sentra Kuliner Alas Karet', 'Warung-warung kuliner tradisional yang menjajakan makanan khas pedesaan di lokasi Wisata Alaska.', 'fa-store');

-- 5. Table Artikel
CREATE TABLE IF NOT EXISTS `artikel` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `judul` VARCHAR(150) NOT NULL,
  `slug` VARCHAR(150) NOT NULL UNIQUE,
  `konten` TEXT NOT NULL,
  `gambar` VARCHAR(255),
  `penulis` VARCHAR(100) DEFAULT 'Admin',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `artikel` (`judul`, `slug`, `konten`, `gambar`, `penulis`) VALUES
('PPK Ormawa HimaBio Helianthus 2026 Kembangkan Digitalisasi Desa Wisata Tempurejo', 'ppko-himabio-helianthus-digitalisasi-desa-tempurejo', '<p>Desa Tempurejo kini melangkah maju menuju desa wisata digital. Tim PPK Ormawa HimaBio Helianthus UNP Kediri berkolaborasi dengan perangkat desa meluncurkan platform PortalRejo untuk mempromosikan destinasi unggulan desa.</p><p>Melalui sistem portal informasi ini, wisatawan luar kota dapat dengan mudah menemukan letak Wisata Alaska, melakukan reservasi homestay, memesan paket wisata Jembangan, dan berbelanja produk lokal Tempurejo.</p>', 'artikel_launching.jpg', 'Tim Dokumentasi PPKO'),
('Menyusuri Keindahan Hutan Karet Alaska Tempurejo yang Sejuk', 'menyusuri-keindahan-hutan-karet-alaska-tempurejo', '<p>Wisata Alaska (Alas Karet) menjadi ikon wisata alam unggulan di Desa Tempurejo. Menawarkan keindahan barisan pohon karet yang rindang dan estetik, tempat ini sangat digemari oleh pemburu foto instagramable.</p><p>Selain berswafoto, para pengunjung juga dapat menikmati terapi berjalan kaki di sepanjang jalur sungai dangkal berbatu yang berair sangat jernih dan menyegarkan.</p>', 'artikel_pesona_alam.jpg', 'Admin Desa'),
('Merasakan Kesegaran Mata Air Alami di Wisata Jembangan Tempurejo', 'kesegaran-mata-air-alami-wisata-jembangan-tempurejo', '<p>Wisata Jembangan Tempurejo merupakan destinasi wisata pemandian keluarga yang airnya berasal langsung dari sumber mata air bawah tanah desa Tempurejo.</p><p>Kolam renang yang dikelilingi rindangnya pepohonan membuat suasana berenang terasa sangat asri. Pengelola juga menyediakan kolam terapi ikan yang bermanfaat bagi kesehatan sirkulasi darah pengunjung.</p>', 'artikel_tempe_sagu.jpg', 'Pokja Wisata Jembangan');

-- 6. Table Galeri (Foto Gallery)
CREATE TABLE IF NOT EXISTS `galeri` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `judul` VARCHAR(100) NOT NULL,
  `nama_file` VARCHAR(255) NOT NULL,
  `kategori` VARCHAR(50) NOT NULL, -- 'Alam', 'Kegiatan', 'Budaya'
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `galeri` (`judul`, `nama_file`, `kategori`) VALUES
('Pepohonan Karet Rindang Wisata Alaska', 'galeri_alam_1.jpg', 'Alam'),
('Jernihnya Kolam Mata Air Jembangan', 'galeri_alam_2.jpg', 'Alam'),
('Keseruan Outbound PPKO di Alaska', 'galeri_kegiatan_1.jpg', 'Kegiatan'),
('Kegiatan Pembersihan Sungai Bersama Warga', 'galeri_kegiatan_2.jpg', 'Kegiatan'),
('Batik Tulis Bunga Helianthus Khas Tempurejo', 'galeri_budaya_1.jpg', 'Budaya'),
('Sajian Kuliner Tradisional Lesehan Jembangan', 'galeri_budaya_2.jpg', 'Budaya');

-- 7. Table Produk (UMKM)
CREATE TABLE IF NOT EXISTS `produk` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `deskripsi` TEXT NOT NULL,
  `harga` DECIMAL(10, 2) NOT NULL,
  `gambar` VARCHAR(255),
  `kontak_wa` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produk` (`nama`, `deskripsi`, `harga`, `gambar`, `kontak_wa`) VALUES
('Keripik Tempe Sagu Tempurejo', 'Keripik tempe sagu premium renyah buatan ibu-ibu PKK Desa Tempurejo. Tanpa bahan pengawet dan dikemas secara higienis.', 15000.00, 'produk_tempe.jpg', '6281234567890'),
('Batik Helianthus Motif Tempurejo', 'Batik tulis buatan perajin lokal dengan perpaduan motif daun karet Alaska dan bunga matahari Helianthus yang melambangkan kemakmuran.', 180000.00, 'produk_batik.jpg', '6281234567890'),
('Madu Asli Hutan Alaska', 'Madu murni yang dipanen langsung dari peternakan lebah hutan di kawasan perkebunan Alas Karet (Alaska) Tempurejo.', 65000.00, 'produk_madu.jpg', '6281234567890');

-- 8. Table Poster
CREATE TABLE IF NOT EXISTS `poster` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `judul` VARCHAR(100) NOT NULL,
  `nama_file` VARCHAR(255) NOT NULL,
  `deskripsi` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `poster` (`judul`, `nama_file`, `deskripsi`) VALUES
('Poster Panduan Wisata Alaska & Jembangan', 'poster_launching.jpg', 'Infografis panduan rute perjalanan, tiket masuk, serta peta wisata Alaska & Jembangan Desa Tempurejo.'),
('Poster Program PPKO HimaBio UNP Kediri 2026', 'poster_panduan_wisata.jpg', 'Poster dokumentasi visual pelaksanaan program pengabdian masyarakat di Desa Tempurejo.');

-- 9. Table Kontak (Pesan)
CREATE TABLE IF NOT EXISTS `kontak` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `subjek` VARCHAR(150) NOT NULL,
  `pesan` TEXT NOT NULL,
  `tanggal` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
