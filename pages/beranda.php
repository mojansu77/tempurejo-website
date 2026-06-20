<?php
// pages/beranda.php
// Halaman Utama Portal Desa Wisata

$paket_list = get_paket_wisata();
$fasilitas_list = get_fasilitas();
$artikel_list = get_artikel();
?>

<!-- 1. Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <span class="hero-tagline">Selamat Datang di Portal Resmi</span>
            <h1>Desa Wisata <span>Tempurejo</span></h1>
            <p>Jelajahi keindahan barisan Alas Karet (Alaska), kesegaran kolam mata air alami Jembangan, dan produk UMKM binaan UNP Kediri & PPKO HimaBio Helianthus.</p>
            <div class="btn-group">
                <a href="index.php?page=paket" class="btn btn-primary">
                    <i class="fas fa-compass"></i> Jelajahi Paket Wisata
                </a>
                <a href="index.php?page=kontak" class="btn btn-outline">
                    <i class="fas fa-paper-plane"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Mitra Pendukung Section -->
<section id="mitra" class="mitra-section">
    <div class="container">
        <div class="section-title">
            <h2>Mitra <span>Pendukung</span></h2>
            <p>Kolaborasi sinergis dalam mewujudkan program pengembangan potensi Desa Wisata Tempurejo yang berkelanjutan.</p>
        </div>
        
        <div class="mitra-grid">
            <?php
            $mitras = get_mitra();
            foreach ($mitras as $m):
            ?>
                <div class="mitra-card">
                    <div class="mitra-logo-placeholder">
                        <i class="<?php echo ($m['nama'] == 'UNP KEDIRI') ? 'fa-solid fa-graduation-cap' : 'fa-solid fa-seedling'; ?>"></i> 
                        <span style="font-size: 0.95rem; margin-left: 8px; font-weight: 700;"><?php echo htmlspecialchars($m['nama']); ?></span>
                    </div>
                    <h4><?php echo htmlspecialchars($m['nama']); ?></h4>
                    <p><?php echo htmlspecialchars($m['deskripsi']); ?></p>
                    <?php if ($m['link'] != '#'): ?>
                        <a href="<?php echo htmlspecialchars($m['link']); ?>" target="_blank" style="margin-top: 15px; font-size: 0.8rem; color: var(--primary); font-weight: 600;">
                            Kunjungi Situs <i class="fas fa-external-link-alt" style="font-size: 0.7rem; margin-left: 3px;"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 3. Sekilas Statistik Desa -->
<section class="section" style="background-color: var(--bg-card); border-bottom: 1px solid var(--border);">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px; text-align: center;">
            <div>
                <h3 style="font-size: 3rem; color: var(--primary); font-family: var(--font-heading); margin-bottom: 8px;">100%</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; font-weight: 500;">Udara Bersih & Alami</p>
            </div>
            <div>
                <h3 style="font-size: 3rem; color: var(--primary); font-family: var(--font-heading); margin-bottom: 8px;">3+</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; font-weight: 500;">Pilihan Paket Wisata</p>
            </div>
            <div>
                <h3 style="font-size: 3rem; color: var(--primary); font-family: var(--font-heading); margin-bottom: 8px;">5+</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; font-weight: 500;">Fasilitas Utama Penunjang</p>
            </div>
            <div>
                <h3 style="font-size: 3rem; color: var(--primary); font-family: var(--font-heading); margin-bottom: 8px;">15+</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; font-weight: 500;">Produk UMKM Kreatif</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. Featured Paket Wisata -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Paket <span>Wisata Unggulan</span></h2>
            <p>Pilih paket perjalanan terbaik untuk menikmati keindahan Alaska dan segarnya Jembangan di Desa Tempurejo.</p>
        </div>
        
        <div class="cards-grid">
            <?php 
            // Ambil maksimal 3 paket pertama
            $featured_paket = array_slice($paket_list, 0, 3);
            foreach ($featured_paket as $p): 
            ?>
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="assets/images/<?php echo htmlspecialchars($p['gambar']); ?>" alt="<?php echo htmlspecialchars($p['nama']); ?>">
                        <span class="card-badge">Terpopuler</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php echo htmlspecialchars($p['nama']); ?></h3>
                        <p class="card-desc"><?php echo htmlspecialchars(substr($p['deskripsi'], 0, 140)) . '...'; ?></p>
                        
                        <div class="card-facilities">
                            <p>Fasilitas Termasuk:</p>
                            <ul>
                                <?php 
                                $facs = explode(',', $p['fasilitas']);
                                foreach ($facs as $f): 
                                ?>
                                    <li><?php echo htmlspecialchars(trim($f)); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="card-price">
                            Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?><span> / orang</span>
                        </div>
                        
                        <a href="<?php echo htmlspecialchars($p['whatsapp_link']); ?>" target="_blank" class="btn btn-wa">
                            <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="index.php?page=paket" class="btn btn-outline" style="color: var(--primary); border-color: var(--primary);">
                Lihat Semua Paket Wisata <i class="fas fa-arrow-right" style="margin-left: 6px;"></i>
            </a>
        </div>
    </div>
</section>

<!-- 5. Fasilitas Teaser -->
<section class="section" style="background-color: var(--primary-light);">
    <div class="container">
        <div class="section-title">
            <h2>Fasilitas <span>Wisata</span></h2>
            <p>Dukungan fasilitas memadai untuk kenyamanan dan keamanan Anda selama berkunjung.</p>
        </div>
        
        <div class="fasilitas-grid">
            <?php 
            $teaser_fasilitas = array_slice($fasilitas_list, 0, 4);
            foreach ($teaser_fasilitas as $f): 
            ?>
                <div class="fasilitas-card">
                    <div class="fasilitas-icon">
                        <i class="fas <?php echo htmlspecialchars($f['ikon']); ?>"></i>
                    </div>
                    <h3><?php echo htmlspecialchars($f['nama']); ?></h3>
                    <p><?php echo htmlspecialchars($f['deskripsi']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 6. Recent Articles -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Kabar <span>Desa Terbaru</span></h2>
            <p>Ikuti berita terhangat, artikel informatif, dan dokumentasi aktivitas dari Desa Tempurejo.</p>
        </div>
        
        <div class="artikel-grid">
            <?php 
            $recent_art = array_slice($artikel_list, 0, 3);
            foreach ($recent_art as $art): 
            ?>
                <div class="card artikel-card">
                    <div class="card-img-wrapper" style="height: 180px;">
                        <img src="assets/images/<?php echo htmlspecialchars($art['gambar']); ?>" alt="<?php echo htmlspecialchars($art['judul']); ?>">
                    </div>
                    <div class="card-content">
                        <div class="artikel-meta">
                            <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($art['penulis']); ?></span>
                            <span><i class="fas fa-calendar-alt"></i> <?php echo date('d M Y', strtotime($art['created_at'])); ?></span>
                        </div>
                        <h3 class="card-title" style="font-size: 1.15rem; margin-bottom: 8px;">
                            <a href="index.php?page=artikel&slug=<?php echo htmlspecialchars($art['slug']); ?>">
                                <?php echo htmlspecialchars($art['judul']); ?>
                            </a>
                        </h3>
                        <p class="card-desc" style="font-size: 0.85rem; margin-bottom: 12px;">
                            <?php echo htmlspecialchars(substr(strip_tags($art['konten']), 0, 110)) . '...'; ?>
                        </p>
                        <a href="index.php?page=artikel&slug=<?php echo htmlspecialchars($art['slug']); ?>" class="read-more">
                            Baca Selengkapnya <i class="fas fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
