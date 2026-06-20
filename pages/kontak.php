<?php
// pages/kontak.php
// Halaman Form Hubungi Kami & Peta Lokasi

$message_sent = false;
$message_error = false;

// Proses Form Kirim Pesan jika di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_kontak'])) {
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $subjek = isset($_POST['subjek']) ? trim($_POST['subjek']) : '';
    $pesan = isset($_POST['pesan']) ? trim($_POST['pesan']) : '';
    
    if (!empty($nama) && !empty($email) && !empty($subjek) && !empty($pesan)) {
        $res = save_kontak($nama, $email, $subjek, $pesan);
        if ($res) {
            $message_sent = true;
        } else {
            $message_error = true;
        }
    } else {
        $message_error = true;
    }
}
?>
<section class="section" style="padding-top: 130px;">
    <div class="container">
        <div class="section-title">
            <h2>Hubungi <span>Kami</span></h2>
            <p>Punya pertanyaan seputar paket wisata Alaska & Jembangan, reservasi kelompok, atau kemitraan? Hubungi kami langsung melalui formulir atau kontak di bawah ini.</p>
        </div>
        
        <div class="kontak-wrapper">
            <!-- Panel Info Kontak -->
            <div class="kontak-info">
                <h3>Informasi Kontak</h3>
                <p style="margin-bottom: 30px; font-size: 0.9rem; color: var(--text-muted);">Pokdarwis Desa Wisata Tempurejo siap melayani konsultasi kunjungan Anda setiap hari kerja pukul 08:00 - 17:00 WIB.</p>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-text">
                        <h4>Lokasi Desa</h4>
                        <p>Jl. Raya Tempurejo No. 45, Kecamatan Semen, Kabupaten Kediri, Jawa Timur</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="info-text">
                        <h4>Telepon & WA</h4>
                        <p>+62 812-3456-7890</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-text">
                        <h4>Surel Resmi</h4>
                        <p>info@portalrejo.desa.id</p>
                    </div>
                </div>
            </div>
            
            <!-- Formulir Kirim Pesan -->
            <div class="kontak-form-wrapper">
                <h3>Kirim Pesan</h3>
                <p style="margin-bottom: 24px; font-size: 0.85rem; color: var(--text-muted);">Silakan lengkapi data Anda. Kami akan merespon email Anda sesegera mungkin.</p>
                
                <?php if ($message_sent): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i> Pesan Anda berhasil dikirim! Terima kasih telah menghubungi kami.
                    </div>
                <?php elseif ($message_error): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i> Terjadi kesalahan. Pastikan seluruh input terisi dengan format benar.
                    </div>
                <?php endif; ?>
                
                <form action="index.php?page=kontak" method="POST" id="contact-form">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="nama@email.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subjek">Subjek</label>
                        <input type="text" name="subjek" id="subjek" class="form-control" placeholder="Tuliskan subjek pesan Anda" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="pesan">Isi Pesan</label>
                        <textarea name="pesan" id="pesan" class="form-control" placeholder="Tuliskan pesan Anda secara detail..." required></textarea>
                    </div>
                    
                    <button type="submit" name="submit_kontak" class="btn btn-primary" style="width: 100%; justify-content: center; border-radius: var(--border-radius-sm);">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Peta Google Maps Tersemat -->
        <div class="map-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126442.27855325852!2d111.94420844781498!3d-7.861440182747372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785703f8373bb1%3A0x3027a764d76cca0!2sKediri%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1718872000000!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
