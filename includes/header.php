<?php
// includes/header.php
// Header layout utama dengan SEO metadata, Fonts, dan CDN Icons
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . " - PortalRejo Desa Tempurejo" : "PortalRejo - Desa Wisata Tempurejo Modern & Informatif"; ?></title>
    
    <!-- Meta SEO -->
    <meta name="description" content="Website Resmi Desa Wisata Tempurejo. Temukan informasi paket wisata Alas Karet (Alaska), kolam pemandian Jembangan, produk UMKM lokal, dan kolaborasi kami bersama UNP Kediri & PPKO Ormawa HimaBio Helianthus.">
    <meta name="keywords" content="Desa Wisata, Tempurejo, Kediri, UNP Kediri, HimaBio Helianthus, PPKO 2026, Alas Karet, Alaska, Jembangan, Wisata Air">
    <meta name="author" content="PPKO 2026 HimaBio Helianthus UNP Kediri">
    
    <!-- Open Graph (Facebook / WA / Line Share) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title . " - PortalRejo Desa Tempurejo" : "PortalRejo - Desa Wisata Tempurejo Modern & Informatif"; ?>">
    <meta property="og:description" content="Kunjungi Desa Wisata Tempurejo. Jelajahi keindahan Alas Karet (Alaska), kolam mata air alami Jembangan, dan produk batik khas Kediri.">
    <meta property="og:image" content="assets/images/hero_background.jpg">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&display=swap" rel="stylesheet">
    
    <!-- FontAwesome (Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
