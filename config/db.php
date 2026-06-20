<?php
// config/db.php
// Konfigurasi Database dengan Fallback Mock Data jika koneksi gagal

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'desa_wisata_tempurejo'; // Updated database name for Tempurejo

$pdo = null;
$db_connected = false;

try {
    // Mencoba melakukan koneksi ke database
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
    $db_connected = true;
} catch (PDOException $e) {
    // Jika koneksi gagal, sistem akan menggunakan mock data agar website tetap bisa berjalan secara visual
    $db_connected = false;
}

// 1. Ambil Data Mitra
function get_mitra() {
    global $pdo, $db_connected;
    if ($db_connected) {
        try {
            $stmt = $pdo->query("SELECT * FROM mitra ORDER BY id ASC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // fallback
        }
    }
    return [
        [
            'id' => 1,
            'nama' => 'UNP KEDIRI',
            'deskripsi' => 'Universitas Nusantara PGRI Kediri yang aktif mendukung pengabdian masyarakat dan pengembangan desa binaan.',
            'logo' => 'unp_logo.png',
            'link' => 'https://unpkediri.ac.id'
        ],
        [
            'id' => 2,
            'nama' => 'PPKO 2026 HimaBio Helianthus',
            'deskripsi' => 'Program Penguatan Kapasitas Organisasi Kemahasiswaan Himpunan Mahasiswa Biologi Helianthus UNP Kediri.',
            'logo' => 'himabio_logo.png',
            'link' => '#'
        ]
    ];
}

// 2. Ambil Paket Wisata
function get_paket_wisata() {
    global $pdo, $db_connected;
    if ($db_connected) {
        try {
            $stmt = $pdo->query("SELECT * FROM paket_wisata ORDER BY id ASC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // fallback
        }
    }
    return [
        [
            'id' => 1,
            'nama' => 'Paket Jelajah Alas Karet (Alaska)',
            'deskripsi' => 'Petualangan asri menyusuri hutan karet Alaska Desa Tempurejo yang rindang. Menikmati suasana sejuk, menyusuri aliran sungai jernih, dan menikmati hidangan lokal di bawah naungan pohon karet.',
            'harga' => 75000.00,
            'fasilitas' => 'Pemandu Lokal, Makan Siang Lesehan, Air Mineral, Tiket Masuk Alaska, Dokumentasi',
            'gambar' => 'paket_edukasi.jpg',
            'whatsapp_link' => 'https://wa.me/6281234567890?text=Halo%20Desa%20Wisata%20Tempurejo%2C%20saya%20tertarik%20memesan%20Paket%20Jelajah%20Alas%20Karet%20(Alaska).'
        ],
        [
            'id' => 2,
            'nama' => 'Paket Rekreasi Wisata Jembangan',
            'deskripsi' => 'Nikmati kesegaran mata air alami di Jembangan. Sangat cocok untuk wisata keluarga dengan kolam pemandian yang jernih, terapi ikan alami, dan gazebo teduh untuk berkumpul.',
            'harga' => 90000.00,
            'fasilitas' => 'Tiket Masuk Jembangan, Gazebo Eksklusif, Makan Siang Prasmanan Khas Desa, Terapi Ikan, Pemandu Wisata',
            'gambar' => 'paket_jelajah.jpg',
            'whatsapp_link' => 'https://wa.me/6281234567890?text=Halo%20Desa%20Wisata%20Tempurejo%2C%20saya%20tertarik%20memesan%20Paket%20Rekreasi%20Wisata%20Jembangan.'
        ],
        [
            'id' => 3,
            'nama' => 'Paket Terusan Alaska - Jembangan',
            'deskripsi' => 'Paket petualangan lengkap satu hari penuh. Menjelajahi keasrian hutan karet Alaska di pagi hari, disusul makan siang bersama, dan relaksasi menyegarkan di kolam pemandian Jembangan pada sore hari.',
            'harga' => 150000.00,
            'fasilitas' => 'Pemandu Seharian, Tiket Masuk Alaska & Jembangan, Makan Siang, Snack Box, Souvenir Kerajinan Tangan',
            'gambar' => 'paket_budaya.jpg',
            'whatsapp_link' => 'https://wa.me/6281234567890?text=Halo%20Desa%20Wisata%20Tempurejo%2C%20saya%20tertarik%20memesan%20Paket%20Terusan%20Alaska%20-%20Jembangan.'
        ]
    ];
}

// 3. Ambil Fasilitas
function get_fasilitas() {
    global $pdo, $db_connected;
    if ($db_connected) {
        try {
            $stmt = $pdo->query("SELECT * FROM fasilitas ORDER BY id ASC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // fallback
        }
    }
    return [
        [
            'id' => 1,
            'nama' => 'Homestay Tradisional Tempurejo',
            'deskripsi' => 'Rumah joglo kayu yang nyaman dengan sentuhan modern, menyajikan suasana asri khas pedesaan di sekitar kawasan wisata.',
            'ikon' => 'fa-home'
        ],
        [
            'id' => 2,
            'nama' => 'Outbound Area Alaska',
            'deskripsi' => 'Lapangan rumput hijau luas di bawah keteduhan pohon karet Alaska, sangat pas untuk camping dan outbound gathering.',
            'ikon' => 'fa-campground'
        ],
        [
            'id' => 3,
            'nama' => 'Gazebo Teduh Jembangan',
            'deskripsi' => 'Gazebo-gazebo kayu di tepian kolam mata air Jembangan untuk tempat bersantai bersama rombongan keluarga.',
            'ikon' => 'fa-landmark'
        ],
        [
            'id' => 4,
            'nama' => 'Pemandu Lokal Berlisensi',
            'deskripsi' => 'Pemuda karang taruna Desa Tempurejo yang ramah dan terlatih membimbing rute penjelajahan Alaska dan Jembangan.',
            'ikon' => 'fa-users'
        ],
        [
            'id' => 5,
            'nama' => 'Sentra Kuliner Alas Karet',
            'deskripsi' => 'Warung-warung kuliner tradisional yang menjajakan makanan khas pedesaan di lokasi Wisata Alaska.',
            'ikon' => 'fa-store'
        ]
    ];
}

// 4. Ambil Artikel
function get_artikel($slug = null) {
    global $pdo, $db_connected;
    $mock_artikel = [
        [
            'id' => 1,
            'judul' => 'PPK Ormawa HimaBio Helianthus 2026 Kembangkan Digitalisasi Desa Wisata Tempurejo',
            'slug' => 'ppko-himabio-helianthus-digitalisasi-desa-tempurejo',
            'konten' => '<p>Desa Tempurejo kini melangkah maju menuju desa wisata digital. Tim PPK Ormawa HimaBio Helianthus UNP Kediri berkolaborasi dengan perangkat desa meluncurkan platform PortalRejo untuk mempromosikan destinasi unggulan desa.</p><p>Melalui sistem portal informasi ini, wisatawan luar kota dapat dengan mudah menemukan letak Wisata Alaska, melakukan reservasi homestay, memesan paket wisata Jembangan, dan berbelanja produk lokal Tempurejo.</p>',
            'gambar' => 'artikel_launching.jpg',
            'penulis' => 'Tim Dokumentasi PPKO',
            'created_at' => '2026-06-18 10:00:00'
        ],
        [
            'id' => 2,
            'judul' => 'Menyusuri Keindahan Hutan Karet Alaska Tempurejo yang Sejuk',
            'slug' => 'menyusuri-keindahan-hutan-karet-alaska-tempurejo',
            'konten' => '<p>Wisata Alaska (Alas Karet) menjadi ikon wisata alam unggulan di Desa Tempurejo. Menawarkan keindahan barisan pohon karet yang rindang dan estetik, tempat ini sangat digemari oleh pemburu foto instagramable.</p><p>Selain berswafoto, para pengunjung juga dapat menikmati terapi berjalan kaki di sepanjang jalur sungai dangkal berbatu yang berair sangat jernih dan menyegarkan.</p>',
            'gambar' => 'artikel_pesona_alam.jpg',
            'penulis' => 'Admin Desa',
            'created_at' => '2026-06-15 08:30:00'
        ],
        [
            'id' => 3,
            'judul' => 'Merasakan Kesegaran Mata Air Alami di Wisata Jembangan Tempurejo',
            'slug' => 'kesegaran-mata-air-alami-wisata-jembangan-tempurejo',
            'konten' => '<p>Wisata Jembangan Tempurejo merupakan destinasi wisata pemandian keluarga yang airnya berasal langsung dari sumber mata air bawah tanah desa Tempurejo.</p><p>Kolam renang yang dikelilingi rindangnya pepohonan membuat suasana berenang terasa sangat asri. Pengelola juga menyediakan kolam terapi ikan yang bermanfaat bagi kesehatan sirkulasi darah pengunjung.</p>',
            'gambar' => 'artikel_tempe_sagu.jpg',
            'penulis' => 'Pokja Wisata Jembangan',
            'created_at' => '2026-06-12 14:15:00'
        ]
    ];

    if ($slug !== null) {
        if ($db_connected) {
            try {
                $stmt = $pdo->prepare("SELECT * FROM artikel WHERE slug = ?");
                $stmt->execute([$slug]);
                $res = $stmt->fetch();
                if ($res) return $res;
            } catch (PDOException $e) {
                // fallback
            }
        }
        foreach ($mock_artikel as $art) {
            if ($art['slug'] === $slug) return $art;
        }
        return null;
    }

    if ($db_connected) {
        try {
            $stmt = $pdo->query("SELECT * FROM artikel ORDER BY id DESC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // fallback
        }
    }
    return $mock_artikel;
}

// 5. Ambil Galeri
function get_galeri() {
    global $pdo, $db_connected;
    if ($db_connected) {
        try {
            $stmt = $pdo->query("SELECT * FROM galeri ORDER BY id DESC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // fallback
        }
    }
    return [
        ['id' => 1, 'judul' => 'Pepohonan Karet Rindang Wisata Alaska', 'nama_file' => 'galeri_alam_1.jpg', 'kategori' => 'Alam'],
        ['id' => 2, 'judul' => 'Jernihnya Kolam Mata Air Jembangan', 'nama_file' => 'galeri_alam_2.jpg', 'kategori' => 'Alam'],
        ['id' => 3, 'judul' => 'Keseruan Outbound PPKO di Alaska', 'nama_file' => 'galeri_kegiatan_1.jpg', 'kategori' => 'Kegiatan'],
        ['id' => 4, 'judul' => 'Kegiatan Pembersihan Sungai Bersama Warga', 'nama_file' => 'galeri_kegiatan_2.jpg', 'kategori' => 'Kegiatan'],
        ['id' => 5, 'judul' => 'Batik Tulis Bunga Helianthus Khas Tempurejo', 'nama_file' => 'galeri_budaya_1.jpg', 'kategori' => 'Budaya'],
        ['id' => 6, 'judul' => 'Sajian Kuliner Tradisional Lesehan Jembangan', 'nama_file' => 'galeri_budaya_2.jpg', 'kategori' => 'Budaya']
    ];
}

// 6. Ambil Produk UMKM
function get_produk() {
    global $pdo, $db_connected;
    if ($db_connected) {
        try {
            $stmt = $pdo->query("SELECT * FROM produk ORDER BY id ASC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // fallback
        }
    }
    return [
        [
            'id' => 1,
            'nama' => 'Keripik Tempe Sagu Tempurejo',
            'deskripsi' => 'Keripik tempe sagu premium renyah buatan ibu-ibu PKK Desa Tempurejo. Tanpa bahan pengawet dan dikemas secara higienis.',
            'harga' => 15000.00,
            'gambar' => 'produk_tempe.jpg',
            'kontak_wa' => '6281234567890'
        ],
        [
            'id' => 2,
            'nama' => 'Batik Helianthus Motif Tempurejo',
            'deskripsi' => 'Batik tulis buatan perajin lokal dengan perpaduan motif daun karet Alaska dan bunga matahari Helianthus yang melambangkan kemakmuran.',
            'harga' => 180000.00,
            'gambar' => 'produk_batik.jpg',
            'kontak_wa' => '6281234567890'
        ],
        [
            'id' => 3,
            'nama' => 'Madu Asli Hutan Alaska',
            'deskripsi' => 'Madu murni yang dipanen langsung dari peternakan lebah hutan di kawasan perkebunan Alas Karet (Alaska) Tempurejo.',
            'harga' => 65000.00,
            'gambar' => 'produk_madu.jpg',
            'kontak_wa' => '6281234567890'
        ]
    ];
}

// 7. Ambil Poster
function get_poster() {
    global $pdo, $db_connected;
    if ($db_connected) {
        try {
            $stmt = $pdo->query("SELECT * FROM poster ORDER BY id DESC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // fallback
        }
    }
    return [
        [
            'id' => 1,
            'judul' => 'Poster Panduan Wisata Alaska & Jembangan',
            'nama_file' => 'poster_launching.jpg',
            'deskripsi' => 'Infografis panduan rute perjalanan, tiket masuk, serta peta wisata Alaska & Jembangan Desa Tempurejo.'
        ],
        [
            'id' => 2,
            'judul' => 'Poster Program PPKO HimaBio UNP Kediri 2026',
            'nama_file' => 'poster_panduan_wisata.jpg',
            'deskripsi' => 'Poster dokumentasi visual pelaksanaan program pengabdian masyarakat di Desa Tempurejo.'
        ]
    ];
}

// 8. Simpan Pesan Kontak
function save_kontak($nama, $email, $subjek, $pesan) {
    global $pdo, $db_connected;
    if ($db_connected) {
        try {
            $stmt = $pdo->prepare("INSERT INTO kontak (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$nama, $email, $subjek, $pesan]);
        } catch (PDOException $e) {
            return false;
        }
    }
    return true;
}
