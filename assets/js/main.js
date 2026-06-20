/* main.js - Logic Frontend & Interaktivitas PortalRejo */

document.addEventListener('DOMContentLoaded', function() {
    
    // ==========================================
    // 1. Scroll Effect on Header
    // ==========================================
    const header = document.querySelector('header');
    
    function checkScroll() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    
    window.addEventListener('scroll', checkScroll);
    checkScroll(); // check on init

    // ==========================================
    // 2. Mobile Menu (Hamburger)
    // ==========================================
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            
            // Toggle hamburger icon animation
            const spans = hamburger.querySelectorAll('span');
            if (navMenu.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(6px, -6px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });

        // Close menu when clicking nav links
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                const spans = hamburger.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            });
        });
    }

    // ==========================================
    // 3. Dark Mode Toggle
    // ==========================================
    const themeToggleBtn = document.getElementById('theme-toggle');
    const htmlElement = document.documentElement;
    
    // Check local storage or system preference
    const savedTheme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
        htmlElement.setAttribute('data-theme', 'dark');
        updateToggleIcon('dark');
    } else {
        htmlElement.setAttribute('data-theme', 'light');
        updateToggleIcon('light');
    }
    
    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', function() {
            const currentTheme = htmlElement.getAttribute('data-theme');
            let newTheme = 'light';
            
            if (currentTheme === 'light') {
                newTheme = 'dark';
            }
            
            htmlElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateToggleIcon(newTheme);
        });
    }
    
    function updateToggleIcon(theme) {
        if (!themeToggleBtn) return;
        const icon = themeToggleBtn.querySelector('i');
        if (!icon) return;
        
        if (theme === 'dark') {
            icon.className = 'fas fa-sun';
        } else {
            icon.className = 'fas fa-moon';
        }
    }

    // ==========================================
    // 4. Gallery Filtering
    // ==========================================
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    if (filterButtons.length > 0 && galleryItems.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                
                const filterValue = this.getAttribute('data-filter');
                
                galleryItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');
                    
                    if (filterValue === 'all' || filterValue === itemCategory) {
                        item.style.display = 'block';
                        // Trigger fade-in
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300); // match CSS transitions
                    }
                });
            });
        });
    }

    // ==========================================
    // 5. Lightbox Modal (For Gallery & Posters)
    // ==========================================
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxClose = document.getElementById('lightbox-close');
    
    // Lightbox triggers for gallery
    const galleryTriggers = document.querySelectorAll('.gallery-item');
    // Lightbox triggers for posters
    const posterTriggers = document.querySelectorAll('.poster-btn-zoom');
    
    function openLightbox(src, captionText) {
        if (!lightbox || !lightboxImg) return;
        lightboxImg.src = src;
        if (lightboxCaption) {
            lightboxCaption.textContent = captionText || '';
        }
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden'; // Lock body scroll
    }
    
    function closeLightbox() {
        if (!lightbox) return;
        lightbox.classList.remove('active');
        document.body.style.overflow = 'auto'; // Restore scroll
    }
    
    if (galleryTriggers.length > 0) {
        galleryTriggers.forEach(item => {
            item.addEventListener('click', function() {
                const img = this.querySelector('img');
                const caption = this.querySelector('.gallery-title');
                if (img) {
                    openLightbox(img.src, caption ? caption.textContent : '');
                }
            });
        });
    }
    
    if (posterTriggers.length > 0) {
        posterTriggers.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation(); // prevent card click triggers
                const card = this.closest('.poster-card');
                const img = card.querySelector('.poster-img-wrapper img');
                const caption = card.querySelector('h3');
                if (img) {
                    openLightbox(img.src, caption ? caption.textContent : '');
                }
            });
        });
        
        // Also allow clicking poster image wrapper
        const posterWrappers = document.querySelectorAll('.poster-img-wrapper');
        posterWrappers.forEach(wrap => {
            wrap.addEventListener('click', function() {
                const img = this.querySelector('img');
                const card = this.closest('.poster-card');
                const caption = card.querySelector('h3');
                if (img) {
                    openLightbox(img.src, caption ? caption.textContent : '');
                }
            });
        });
    }
    
    if (lightboxClose) {
        lightboxClose.addEventListener('click', closeLightbox);
    }
    
    if (lightbox) {
        // Close lightbox on click outside the image
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
        
        // Close lightbox on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    }

    // ==========================================
    // 6. Contact Form Validation & Animation
    // ==========================================
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const nama = document.getElementById('nama');
            const email = document.getElementById('email');
            const subjek = document.getElementById('subjek');
            const pesan = document.getElementById('pesan');
            
            let hasError = false;
            
            // Clean simple feedback borders
            [nama, email, subjek, pesan].forEach(input => {
                if (input) input.style.borderColor = '';
            });
            
            if (!nama.value.trim()) {
                nama.style.borderColor = 'red';
                hasError = true;
            }
            if (!email.value.trim() || !validateEmail(email.value)) {
                email.style.borderColor = 'red';
                hasError = true;
            }
            if (!subjek.value.trim()) {
                subjek.style.borderColor = 'red';
                hasError = true;
            }
            if (!pesan.value.trim()) {
                pesan.style.borderColor = 'red';
                hasError = true;
            }
            
            if (hasError) {
                e.preventDefault();
                alert('Silakan isi seluruh formulir kontak dengan benar.');
            }
        });
    }
    
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
