<?php
// includes/navbar.php
// Navigasi dengan toggle dark mode dan responsive menu

// Deteksi halaman aktif untuk class active
$currentPage = isset($_GET['page']) ? $_GET['page'] : 'beranda';
?>
<header>
    <div class="container navbar-container">
        <a href="index.php" class="logo">
            <i class="fa-solid fa-mountain-sun"></i> Portal<span>Rejo</span>
        </a>
        
        <nav>
            <ul class="nav-menu">
                <li>
                    <a href="index.php?page=beranda" class="nav-link <?php echo ($currentPage == 'beranda') ? 'active' : ''; ?>">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="index.php?page=beranda#mitra" class="nav-link">
                        Mitra
                    </a>
                </li>
                <li>
                    <a href="index.php?page=paket" class="nav-link <?php echo ($currentPage == 'paket') ? 'active' : ''; ?>">
                        Paket Wisata
                    </a>
                </li>
                <li>
                    <a href="index.php?page=fasilitas" class="nav-link <?php echo ($currentPage == 'fasilitas') ? 'active' : ''; ?>">
                        Fasilitas
                    </a>
                </li>
                <li>
                    <a href="index.php?page=kontak" class="nav-link <?php echo ($currentPage == 'kontak') ? 'active' : ''; ?>">
                        Kontak Kami
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link <?php echo in_array($currentPage, ['sejarah', 'artikel', 'galeri', 'produk', 'poster']) ? 'active' : ''; ?>" style="display: flex; align-items: center; gap: 4px;">
                        Lainnya <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem;"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="index.php?page=sejarah">Sejarah</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="index.php?page=artikel">Artikel</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="index.php?page=galeri">Foto Gallery</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="index.php?page=produk">Produk Lokal</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="index.php?page=poster">Poster Promosi</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div class="nav-controls">
            <!-- Dark Mode Toggle Button -->
            <button id="theme-toggle" class="theme-toggle" title="Toggle Tema Mode">
                <i class="fas fa-moon"></i>
            </button>
            
            <!-- Hamburger button for mobile menu toggling -->
            <button class="hamburger" aria-label="Buka Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>
