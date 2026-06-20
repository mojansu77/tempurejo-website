<?php
// pages/produk.php
// Halaman Katalog Produk UMKM Desa PortalRejo

$produk_list = get_produk();
?>
<section class="section" style="padding-top: 130px;">
    <div class="container">
        <div class="section-title">
            <h2>Produk Lokal <span>UMKM</span></h2>
            <p>Dukung perekonomian warga Desa Tempurejo dengan berbelanja buah tangan khas karya perajin dan kelompok tani di sekitar Alaska dan Jembangan.</p>
        </div>
        
        <div class="produk-grid">
            <?php foreach ($produk_list as $p): ?>
                <div class="card" style="display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div class="card-img-wrapper" style="height: 200px;">
                            <img src="assets/images/<?php echo htmlspecialchars($p['gambar']); ?>" alt="<?php echo htmlspecialchars($p['nama']); ?>">
                        </div>
                        <div class="card-content" style="padding: 20px; padding-bottom: 0;">
                            <h3 class="card-title" style="font-size: 1.2rem; margin-bottom: 8px;"><?php echo htmlspecialchars($p['nama']); ?></h3>
                            <p class="card-desc" style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 16px;"><?php echo htmlspecialchars($p['deskripsi']); ?></p>
                        </div>
                    </div>
                    
                    <div class="card-content" style="padding: 20px; padding-top: 0;">
                        <div class="card-price" style="font-size: 1.3rem; margin-bottom: 16px;">
                            Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?>
                        </div>
                        <?php
                        $wa_msg = rawurlencode("Halo, saya tertarik untuk membeli produk \"" . $p['nama'] . "\" yang saya lihat di website Desa Wisata PortalRejo. Bagaimana cara pemesanannya?");
                        $wa_link = "https://wa.me/" . $p['kontak_wa'] . "?text=" . $wa_msg;
                        ?>
                        <a href="<?php echo $wa_link; ?>" target="_blank" class="btn btn-wa" style="width: 100%; text-align: center;">
                            <i class="fab fa-whatsapp"></i> Beli Sekarang
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Kolaborasi UMKM -->
        <div style="margin-top: 60px; text-align: center; border: 1px dashed var(--primary); padding: 30px; border-radius: var(--border-radius); background-color: var(--bg-card);">
            <i class="fa-solid fa-store" style="font-size: 2rem; color: var(--primary); margin-bottom: 12px;"></i>
            <h4 style="font-family: var(--font-body); font-weight: 700; font-size: 1.1rem; margin-bottom: 8px;">Pemberdayaan Digital oleh PPKO HimaBio Helianthus</h4>
            <p style="font-size: 0.85rem; color: var(--text-muted); max-width: 600px; margin: 0 auto;">
                Program digitalisasi pemasaran ini dirancang oleh mahasiswa UNP Kediri dalam mendampingi kelompok UMKM Desa Tempurejo untuk memasarkan kerajinan batik tulis khas Tempurejo, madu hutan Alaska, dan keripik tempe sagu secara online.
            </p>
        </div>
    </div>
</section>
