<?php
// pages/artikel.php
// Halaman Daftar & Detail Artikel Desa PortalRejo

$slug = isset($_GET['slug']) ? $_GET['slug'] : null;

if ($slug !== null):
    // DETAIL ARTIKEL
    $art = get_artikel($slug);
    if ($art):
        $page_title = $art['judul']; // override title in header if needed
?>
        <section class="section" style="padding-top: 130px;">
            <div class="container" style="max-width: 800px;">
                <a href="index.php?page=artikel" class="btn btn-outline" style="color: var(--primary); border-color: var(--primary); padding: 8px 16px; font-size: 0.85rem; margin-bottom: 24px;">
                    <i class="fas fa-arrow-left"></i> Kembali ke Artikel
                </a>
                
                <article>
                    <div style="margin-bottom: 20px;">
                        <h1 style="font-size: 2.2rem; line-height: 1.2; margin-bottom: 16px;"><?php echo htmlspecialchars($art['judul']); ?></h1>
                        
                        <div class="artikel-meta" style="font-size: 0.85rem;">
                            <span><i class="fas fa-user"></i> Oleh: <strong><?php echo htmlspecialchars($art['penulis']); ?></strong></span>
                            <span style="margin-left: 15px;"><i class="fas fa-calendar-alt"></i> Tanggal: <?php echo date('d F Y', strtotime($art['created_at'])); ?></span>
                        </div>
                    </div>
                    
                    <div style="border-radius: var(--border-radius); overflow: hidden; margin-bottom: 30px; box-shadow: var(--shadow); height: 380px;">
                        <img src="assets/images/<?php echo htmlspecialchars($art['gambar']); ?>" alt="<?php echo htmlspecialchars($art['judul']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <div class="artikel-content-body" style="font-size: 1.05rem; line-height: 1.8; color: var(--text);">
                        <?php echo $art['konten']; // konten memuat kode HTML aman dari database/mock ?>
                    </div>
                </article>
                
                <!-- Share Widget -->
                <div style="margin-top: 40px; border-top: 1px solid var(--border); padding-top: 20px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px;">
                    <span style="font-size: 0.9rem; font-weight: 600; color: var(--text-muted);">Bagikan artikel ini:</span>
                    <div class="social-links" style="margin-top: 0;">
                        <?php 
                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        ?>
                        <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode($art['judul'] . " - " . $actual_link); ?>" target="_blank" class="social-icon" style="background-color: #25D366; color: white;" title="Share WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode($actual_link); ?>" target="_blank" class="social-icon" style="background-color: #3b5998; color: white;" title="Share Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode($art['judul']); ?>&url=<?php echo rawurlencode($actual_link); ?>" target="_blank" class="social-icon" style="background-color: #1da1f2; color: white;" title="Share Twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </section>
<?php 
    else:
?>
        <section class="section" style="padding-top: 130px; text-align: center;">
            <div class="container">
                <h2>Artikel Tidak Ditemukan</h2>
                <p style="margin: 20px 0;">Maaf, artikel yang Anda cari tidak tersedia atau telah dihapus.</p>
                <a href="index.php?page=artikel" class="btn btn-primary">Kembali ke Daftar Artikel</a>
            </div>
        </section>
<?php
    endif;
else:
    // DAFTAR ARTIKEL (LIST VIEW)
    $artikel_list = get_artikel();
?>
    <section class="section" style="padding-top: 130px;">
        <div class="container">
            <div class="section-title">
                <h2>Kabar & <span>Artikel Desa</span></h2>
                <p>Kumpulan berita terkini, wawasan konservasi, serta aktivitas pemberdayaan masyarakat Desa Wisata Tempurejo.</p>
            </div>
            
            <div class="artikel-grid">
                <?php foreach ($artikel_list as $art): ?>
                    <div class="card artikel-card">
                        <div class="card-img-wrapper" style="height: 200px;">
                            <img src="assets/images/<?php echo htmlspecialchars($art['gambar']); ?>" alt="<?php echo htmlspecialchars($art['judul']); ?>">
                        </div>
                        <div class="card-content">
                            <div class="artikel-meta">
                                <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($art['penulis']); ?></span>
                                <span><i class="fas fa-calendar-alt"></i> <?php echo date('d M Y', strtotime($art['created_at'])); ?></span>
                            </div>
                            <h3 class="card-title" style="font-size: 1.2rem; margin-bottom: 10px;">
                                <a href="index.php?page=artikel&slug=<?php echo htmlspecialchars($art['slug']); ?>">
                                    <?php echo htmlspecialchars($art['judul']); ?>
                                </a>
                            </h3>
                            <p class="card-desc" style="font-size: 0.85rem; line-height: 1.6; margin-bottom: 15px;">
                                <?php echo htmlspecialchars(substr(strip_tags($art['konten']), 0, 140)) . '...'; ?>
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
<?php endif; ?>
