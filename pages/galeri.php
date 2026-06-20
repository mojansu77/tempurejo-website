<?php
// pages/galeri.php
// Halaman Galeri Foto Desa Wisata PortalRejo

$galeri_list = get_galeri();
?>
<section class="section" style="padding-top: 130px;">
    <div class="container">
        <div class="section-title">
            <h2>Galeri <span>Foto Desa</span></h2>
            <p>Jelajahi keindahan panorama alam Alaska, kolam alami Jembangan, serta hangatnya kebudayaan di Desa Wisata Tempurejo.</p>
        </div>
        
        <!-- Filter Button Kategori -->
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="Alam">Keindahan Alam</button>
            <button class="filter-btn" data-filter="Kegiatan">Aktivitas & Kegiatan</button>
            <button class="filter-btn" data-filter="Budaya">Seni & Budaya</button>
        </div>
        
        <!-- Grid Galeri -->
        <div class="gallery-grid">
            <?php foreach ($galeri_list as $g): ?>
                <div class="gallery-item" data-category="<?php echo htmlspecialchars($g['kategori']); ?>">
                    <img src="assets/images/<?php echo htmlspecialchars($g['nama_file']); ?>" alt="<?php echo htmlspecialchars($g['judul']); ?>">
                    <div class="gallery-overlay">
                        <span class="gallery-category"><?php echo htmlspecialchars($g['kategori']); ?></span>
                        <h4 class="gallery-title"><?php echo htmlspecialchars($g['judul']); ?></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
