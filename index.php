<?php
// index.php
// Entry point utama & Router Website Desa Wisata PortalRejo

// Load database configuration & mock fallback
require_once 'config/db.php';

// Ambil parameter halaman dari URL (?page=...)
$page = isset($_GET['page']) ? trim($_GET['page']) : 'beranda';

// Daftar halaman yang diperbolehkan (whitelist)
$allowed_pages = [
    'beranda'   => 'Beranda',
    'sejarah'   => 'Sejarah Desa',
    'paket'     => 'Paket Wisata',
    'fasilitas' => 'Fasilitas Wisata',
    'produk'    => 'Produk Lokal UMKM',
    'artikel'   => 'Kabar & Artikel',
    'galeri'    => 'Galeri Foto',
    'poster'    => 'Poster & Infografis',
    'kontak'    => 'Hubungi Kami'
];

// Fallback jika halaman tidak terdaftar di whitelist
if (!array_key_exists($page, $allowed_pages)) {
    $page = 'beranda';
}

// Tentukan judul halaman berdasarkan halaman aktif
$page_title = $allowed_pages[$page];

// Tampilkan Layout
require_once 'includes/header.php';
require_once 'includes/navbar.php';

// Load halaman konten dinamis
$page_file = "pages/{$page}.php";
if (file_exists($page_file)) {
    require_once $page_file;
} else {
    require_once 'pages/beranda.php';
}

require_once 'includes/footer.php';
?>
