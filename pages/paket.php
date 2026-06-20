<?php
// pages/paket.php
// Halaman Daftar Paket Wisata Desa PortalRejo

$paket_list = get_paket_wisata();
?>
<section class="section" style="padding-top: 130px;">
    <div class="container">
        <div class="section-title">
            <h2>Pilihan <span>Paket Wisata</span></h2>
            <p>Dukung perekonomian lokal dengan menikmati petualangan alam Alas Karet (Alaska) dan segarnya Wisata Jembangan di Desa Wisata Tempurejo.</p>
        </div>
        
        <div class="cards-grid">
            <?php foreach ($paket_list as $p): ?>
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="assets/images/<?php echo htmlspecialchars($p['gambar']); ?>" alt="<?php echo htmlspecialchars($p['nama']); ?>">
                        <span class="card-badge">Eko-Wisata</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php echo htmlspecialchars($p['nama']); ?></h3>
                        <p class="card-desc"><?php echo htmlspecialchars($p['deskripsi']); ?></p>
                        
                        <div class="card-facilities">
                            <p style="font-weight: 600; margin-bottom: 8px;"><i class="fa-solid fa-list-check"></i> Fasilitas Utama:</p>
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
                            <i class="fab fa-whatsapp"></i> Booking Sekarang via WhatsApp
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Info Tambahan / Catatan Pemesanan -->
        <div style="margin-top: 60px; background-color: var(--primary-light); padding: 30px; border-radius: var(--border-radius); border-left: 5px solid var(--primary);">
            <h4 style="font-size: 1.15rem; color: var(--primary); margin-bottom: 10px; font-family: var(--font-body); font-weight: 700;">
                <i class="fa-solid fa-circle-info"></i> Informasi Penting Pemesanan
            </h4>
            <ul style="padding-left: 20px; font-size: 0.85rem; color: var(--text-muted);">
                <li style="margin-bottom: 6px;">Pemesanan paket disarankan H-3 sebelum rencana kedatangan.</li>
                <li style="margin-bottom: 6px;">Harga di atas berlaku untuk jumlah minimal pemesanan 5 peserta (paket rombongan silakan hubungi admin).</li>
                <li style="margin-bottom: 6px;">Pembatalan atau perubahan jadwal harus dikonfirmasikan minimal 24 jam sebelumnya.</li>
                <li>Seluruh kegiatan dipandu oleh Pemandu Lokal tersertifikasi dan didampingi tim K3 Desa Wisata.</li>
            </ul>
        </div>
    </div>
</section>
