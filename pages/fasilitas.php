<?php
// pages/fasilitas.php
// Halaman Fasilitas Desa Wisata PortalRejo

$fasilitas_list = get_fasilitas();
?>
<section class="section" style="padding-top: 130px;">
    <div class="container">
        <div class="section-title">
            <h2>Fasilitas <span>Pendukung</span></h2>
            <p>Kami menyediakan berbagai sarana pendukung lengkap demi menjaga kenyamanan, keamanan, dan kepuasan liburan Anda.</p>
        </div>
        
        <div class="fasilitas-grid">
            <?php foreach ($fasilitas_list as $f): ?>
                <div class="fasilitas-card">
                    <div class="fasilitas-icon">
                        <i class="fas <?php echo htmlspecialchars($f['ikon']); ?>"></i>
                    </div>
                    <h3><?php echo htmlspecialchars($f['nama']); ?></h3>
                    <p><?php echo htmlspecialchars($f['deskripsi']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Call to Action Banner -->
        <div style="margin-top: 70px; background: linear-gradient(135deg, var(--primary), var(--primary-hover)); color: white; padding: 40px; border-radius: var(--border-radius); text-align: center; box-shadow: var(--shadow);">
            <h3 style="color: white; font-size: 1.8rem; font-family: var(--font-heading); margin-bottom: 12px; font-weight: 700;">Ingin Berkunjung Rombongan?</h3>
            <p style="opacity: 0.9; font-size: 0.95rem; max-width: 600px; margin: 0 auto 24px;">Kami siap menyediakan akomodasi khusus, katering makanan khas pedesaan, serta susunan kegiatan outbound di Alaska atau rekreasi di Jembangan sesuai kebutuhan Anda.</p>
            <a href="index.php?page=kontak" class="btn btn-outline">
                <i class="fas fa-calendar-alt"></i> Hubungi Pokdarwis Sekarang
            </a>
        </div>
    </div>
</section>
