<?php
// includes/footer.php
// Footer layout dengan widget informasi, link cepat, modal lightbox, dan pemuatan javascript
?>
<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col" style="grid-column: span 2;">
                <h3 style="color: var(--primary); font-family: var(--font-heading); font-size: 1.5rem; font-weight: 700; margin-bottom: 15px;">
                    <i class="fa-solid fa-mountain-sun"></i> Portal<span>Rejo</span>
                </h3>
                <p style="margin-bottom: 20px; font-size: 0.9rem;">
                    Desa Wisata Tempurejo merupakan kawasan wisata pedesaan berbasis konservasi alam, keindahan perkebunan karet Alaska, kesegaran mata air alami Jembangan, dan penguatan ekonomi kreatif masyarakat lokal. Didukung penuh oleh Universitas Nusantara PGRI Kediri.
                </p>
                <div class="social-links">
                    <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Youtube"><i class="fab fa-youtube"></i></a>
                    <a href="https://wa.me/6281234567890" class="social-icon" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            
            <div class="footer-col">
                <h3>Navigasi</h3>
                <ul class="footer-links">
                    <li><a href="index.php?page=beranda"><i class="fas fa-chevron-right" style="font-size: 0.7rem; margin-right: 6px;"></i> Beranda</a></li>
                    <li><a href="index.php?page=paket"><i class="fas fa-chevron-right" style="font-size: 0.7rem; margin-right: 6px;"></i> Paket Wisata</a></li>
                    <li><a href="index.php?page=fasilitas"><i class="fas fa-chevron-right" style="font-size: 0.7rem; margin-right: 6px;"></i> Fasilitas</a></li>
                    <li><a href="index.php?page=kontak"><i class="fas fa-chevron-right" style="font-size: 0.7rem; margin-right: 6px;"></i> Kontak Kami</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Informasi</h3>
                <ul class="footer-links">
                    <li><a href="index.php?page=sejarah"><i class="fas fa-chevron-right" style="font-size: 0.7rem; margin-right: 6px;"></i> Sejarah Desa</a></li>
                    <li><a href="index.php?page=artikel"><i class="fas fa-chevron-right" style="font-size: 0.7rem; margin-right: 6px;"></i> Artikel & Berita</a></li>
                    <li><a href="index.php?page=galeri"><i class="fas fa-chevron-right" style="font-size: 0.7rem; margin-right: 6px;"></i> Galeri Foto</a></li>
                    <li><a href="index.php?page=produk"><i class="fas fa-chevron-right" style="font-size: 0.7rem; margin-right: 6px;"></i> Produk Lokal</a></li>
                </ul>
            </div>
            
            <div class="footer-col" style="grid-column: span 1.5;">
                <h3>Hubungi Kami</h3>
                <p style="margin-bottom: 10px; font-size: 0.85rem;"><i class="fas fa-map-marker-alt" style="color: var(--primary); margin-right: 8px;"></i> Jl. Raya PortalRejo No. 45, Kecamatan Semen, Kabupaten Kediri, Jawa Timur</p>
                <p style="margin-bottom: 10px; font-size: 0.85rem;"><i class="fas fa-phone" style="color: var(--primary); margin-right: 8px;"></i> +62 812-3456-7890</p>
                <p style="margin-bottom: 10px; font-size: 0.85rem;"><i class="fas fa-envelope" style="color: var(--primary); margin-right: 8px;"></i> info@portalrejo.desa.id</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2026 Desa Wisata Tempurejo. Hak Cipta Dilindungi.</p>
            
            <div class="unp-ppko-credits">
                <span>Mitra Akademik:</span>
                <strong style="color: var(--primary); font-size: 0.8rem;">UNP KEDIRI</strong>
                <span style="color: var(--border-dark)">|</span>
                <strong style="color: var(--accent); font-size: 0.8rem;">PPKO 2026 HimaBio Helianthus</strong>
            </div>
        </div>
    </div>
</footer>

<!-- Lightbox Modal untuk Zoom Gambar (Galeri & Poster) -->
<div id="lightbox" class="lightbox">
    <button id="lightbox-close" class="lightbox-close" aria-label="Tutup"><i class="fas fa-times"></i></button>
    <img id="lightbox-img" class="lightbox-content" src="" alt="Zoom Image">
    <div id="lightbox-caption" class="lightbox-caption"></div>
</div>

<!-- Main JS -->
<script src="assets/js/main.js"></script>
</body>
</html>
