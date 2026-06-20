<?php
// pages/poster.php
// Halaman Media Poster Promosi & Publikasi PPKO

$poster_list = get_poster();
?>
<section class="section" style="padding-top: 130px;">
    <div class="container">
        <div class="section-title">
            <h2>Media <span>Poster & Infografis</span></h2>
            <p>Galeri visual media promosi kegiatan, program kerja PPKO HimaBio Helianthus 2026, serta panduan wisata Desa Tempurejo.</p>
        </div>
        
        <div class="poster-grid">
            <?php foreach ($poster_list as $p): ?>
                <div class="poster-card">
                    <div class="poster-img-wrapper">
                        <img src="assets/images/<?php echo htmlspecialchars($p['nama_file']); ?>" alt="<?php echo htmlspecialchars($p['judul']); ?>">
                        <div class="poster-actions">
                            <button class="poster-btn-zoom" title="Perbesar Poster">
                                <i class="fas fa-search-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-content" style="padding: 20px;">
                        <h3 style="font-size: 1.1rem; margin-bottom: 8px; font-family: var(--font-body); font-weight: 700;"><?php echo htmlspecialchars($p['judul']); ?></h3>
                        <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 12px;"><?php echo htmlspecialchars($p['deskripsi']); ?></p>
                        <a href="assets/images/<?php echo htmlspecialchars($p['nama_file']); ?>" download class="btn btn-outline" style="padding: 8px 16px; font-size: 0.8rem; color: var(--primary); border-color: var(--primary); width: 100%; justify-content: center; border-radius: var(--border-radius-sm);">
                            <i class="fas fa-download"></i> Unduh Poster
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
