<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($article) ? $article->artikel_title . ' | Milala Auto Service' : ($title ?? 'Milala Auto Service - Bengkel Spesialis Power Steering & Kaki-Kaki') ?></title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/milala_logo.png') ?>">

    <!-- META SEO Tags (Dynamic for Article) -->
    <?php if (isset($article)): ?>
        <meta name="description" content="<?= strip_tags(substr($article->artikel_content,0,150)) ?>">
        <meta name="keywords" content="<?= $article->artikel_title ?>, artikel otomotif, power steering, kaki-kaki, Milala Auto Service">
        <meta name="author" content="<?= $article->created_by ?>">
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="article">
        <meta property="og:url" content="<?= current_url() ?>">
        <meta property="og:title" content="<?= $article->artikel_title ?>">
        <meta property="og:description" content="<?= strip_tags(substr($article->artikel_content,0,150)) ?>">
        <meta property="og:image" content="<?= base_url('upload/artikel/' . $article->artikel_image) ?>">
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="<?= current_url() ?>">
        <meta property="twitter:title" content="<?= $article->artikel_title ?>">
        <meta property="twitter:description" content="<?= strip_tags(substr($article->artikel_content,0,150)) ?>">
        <meta property="twitter:image" content="<?= base_url('upload/artikel/' . $article->artikel_image) ?>">
        <!-- Schema.org JSON-LD -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "headline": "<?= $article->artikel_title ?>",
            "image": "<?= base_url('upload/artikel/' . $article->artikel_image) ?>",
            "author": {
                "@type": "Person",
                "name": "<?= $article->created_by ?>"
            },
            "datePublished": "<?= date('c', strtotime($article->created_date)) ?>",
            "publisher": {
                "@type": "Organization",
                "name": "Milala Auto Service",
                "logo": {
                    "@type": "ImageObject",
                    "url": "<?= base_url('assets/img/milala_logo.png') ?>"
                }
            },
            "description": "<?= strip_tags(substr($article->artikel_content,0,150)) ?>"
        }
        </script>
    <?php else: ?>
        <meta name="description" content="Milala Auto Service - Bengkel spesialis power steering & kaki-kaki mobil dengan layanan perbaikan, penggantian, dan spooring balancing. 4 cabang strategis di Jakarta, Bekasi, dan Bogor.">
        <meta name="keywords" content="power steering, bengkel power steering, spesialis power steering, perbaikan power steering, kaki-kaki mobil, spooring balancing, ball joint, tie rod, shock absorber, Milala Auto Service, bengkel spesialis Jakarta, bengkel mobil terpercaya">
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <meta name="author" content="Milala Auto Service">
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?= base_url() ?>">
        <meta property="og:title" content="<?= $title ?? 'Milala Auto Service - Bengkel Spesialis Power Steering & Kaki-Kaki' ?>">
        <meta property="og:description" content="Bengkel spesialis power steering & kaki-kaki mobil dengan layanan perbaikan, penggantian, dan spooring balancing. 4 cabang strategis di Jakarta, Bekasi, dan Bogor.">
        <meta property="og:image" content="<?= base_url('assets/img/milala_logo.png') ?>">
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="<?= base_url() ?>">
        <meta property="twitter:title" content="<?= $title ?? 'Milala Auto Service - Bengkel Spesialis Power Steering & Kaki-Kaki' ?>">
        <meta property="twitter:description" content="Bengkel spesialis power steering & kaki-kaki mobil dengan layanan perbaikan, penggantian, dan spooring balancing. 4 cabang strategis di Jakarta, Bekasi, dan Bogor.">
        <meta property="twitter:image" content="<?= base_url('assets/img/milala_logo.jpg') ?>">
    <?php endif; ?>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome Icons -->
    <link href="<?= base_url('lib/@fortawesome/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">

    <!-- Custom Animations for Home -->
    <link rel="stylesheet" href="<?= base_url('assets/css/home-animations.css') ?>">

    <!-- Custom Styles -->
    <style>
        /* Custom Clip Path for Hero Section */
        .hero-clip {
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }

        /* Floating Animation for Tools */
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #FCFB0B;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #e6e009;
        }
            /* Mobile Menu Styles */
        #mobile-menu {
            transition: all 0.3s ease-in-out;
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
            max-height: 100vh;
            overflow-y: auto;
            background: rgba(31, 41, 55, 0.95);
            backdrop-filter: blur(8px);
        }
        
        #mobile-menu.hidden {
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            max-height: 0;
            overflow: hidden;
        }

        /* Mobile menu links styling */
        #mobile-menu a {
            color: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }
        
        #mobile-menu a:hover {
            color: #FCFB0B; /* Primary yellow */
            background-color: rgba(252, 251, 11, 0.1);
        }
        
        /* Active menu item styling */
        #mobile-menu a.active,
        #mobile-menu a[aria-current="page"] {
            color: #FCFB0B; /* Primary yellow for active state */
            background-color: rgba(252, 251, 11, 0.15);
            border-left: 3px solid #FCFB0B;
            font-weight: 600;
        }

        /* Mobile Menu Button Active State */
        #mobile-menu-button {
            transition: all 0.3s ease;
            color: #1F2937;
        }
        
        #mobile-menu-button.active {
            background-color: #FCFB0B;
            color: #1F2937;
            transform: scale(1.05);
        }
        
        #mobile-menu-button:hover {
            background-color: rgba(252, 251, 11, 0.1);
            color: #FCFB0B;
        }

        /* Mobile Workshop Arrow Rotation */
        #mobile-workshop-arrow {
            transition: transform 0.3s ease;
            color: rgba(255, 255, 255, 0.7);
        }
        
        #mobile-workshop-arrow.rotate-180 {
            transform: rotate(180deg);
            color: #FCFB0B;
        }
        
        /* Mobile workshop submenu */
        #mobile-workshop-menu {
            transition: all 0.3s ease-in-out;
            max-height: 500px;
            overflow: hidden;
            background-color: rgba(17, 24, 39, 0.8);
            border-radius: 0.5rem;
            margin-top: 0.5rem;
        }
        
        #mobile-workshop-menu.hidden {
            max-height: 0;
            opacity: 0;
            margin-top: 0;
        }
        
        #mobile-workshop-menu a {
            color: rgba(255, 255, 255, 0.8);
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }
        
        #mobile-workshop-menu a:hover {
            color: #FCFB0B;
            background-color: rgba(252, 251, 11, 0.05);
            border-left-color: #FCFB0B;
        }
        
        /* Workshop toggle button */
        #mobile-workshop-toggle {
            color: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }
        
        #mobile-workshop-toggle:hover {
            color: #FCFB0B;
            background-color: rgba(252, 251, 11, 0.1);
        }

        /* Mobile menu animation */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #mobile-menu:not(.hidden) {
            animation: slideDown 0.3s ease-out;
        }

        /* Ensure mobile menu is properly positioned */
        @media (max-width: 767px) {
            #mobile-menu {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                z-index: 50;
                border-top: 1px solid rgba(252, 251, 11, 0.2);
                box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.1);
            }
            
            /* Add subtle glow effect */
            #mobile-menu::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 1px;
                background: linear-gradient(to right, transparent, #FCFB0B, transparent);
                opacity: 0.5;
            }
        }
        
        /* Hide mobile menu on desktop */
        @media (min-width: 768px) {
            #mobile-menu {
                display: none !important;
            }
        }
        
        /* Smooth scrolling for mobile menu */
        #mobile-menu {
            scrollbar-width: thin;
            scrollbar-color: rgba(252, 251, 11, 0.3) transparent;
        }
        
        #mobile-menu::-webkit-scrollbar {
            width: 4px;
        }
        
        #mobile-menu::-webkit-scrollbar-track {
            background: transparent;
        }
        
        #mobile-menu::-webkit-scrollbar-thumb {
            background-color: rgba(252, 251, 11, 0.3);
            border-radius: 2px;
        }
        
        #mobile-menu::-webkit-scrollbar-thumb:hover {
            background-color: rgba(252, 251, 11, 0.5);
        }
    </style>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FFD32E',
                        dark: '#000000',
                        light: '#FFFFFF'
                    }
                }
            }
        }
    </script>

    <!-- Simple Mobile Menu Script -->
    <script>
        // Mobile menu functionality
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const button = document.getElementById('mobile-menu-button');
            
            console.log('Toggle mobile menu called');
            console.log('Menu element:', menu);
            console.log('Button element:', button);
            
            if (menu) {
                const isHidden = menu.classList.contains('hidden');
                console.log('Menu is currently hidden:', isHidden);
                
                if (isHidden) {
                    menu.classList.remove('hidden');
                    console.log('Menu shown');
                } else {
                    menu.classList.add('hidden');
                    console.log('Menu hidden');
                }
            }
            
            if (button) {
                button.classList.toggle('active');
            }
        }
        
        // Mobile workshop submenu toggle
        function toggleMobileWorkshop() {
            const workshopMenu = document.getElementById('mobile-workshop-menu');
            const arrow = document.getElementById('mobile-workshop-arrow');
            
            if (workshopMenu) {
                workshopMenu.classList.toggle('hidden');
            }
            
            if (arrow) {
                arrow.classList.toggle('rotate-180');
            }
        }
        
        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing mobile menu...');
            
            // Set active menu item based on current URL
            setActiveMenuItem();
            
            // Mobile menu button
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            if (mobileMenuButton) {
                console.log('Mobile menu button found, adding event listeners');
                
                // Remove any existing event listeners
                mobileMenuButton.onclick = null;
                
                // Add click event
                mobileMenuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Mobile menu button clicked');
                    toggleMobileMenu();
                });
                
                // Add touch event for better mobile support
                mobileMenuButton.addEventListener('touchend', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Mobile menu button touched');
                    toggleMobileMenu();
                });
            } else {
                console.error('Mobile menu button not found!');
            }
            
            // Mobile workshop toggle
            const mobileWorkshopToggle = document.getElementById('mobile-workshop-toggle');
            if (mobileWorkshopToggle) {
                mobileWorkshopToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    toggleMobileWorkshop();
                });
            }
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                const menu = document.getElementById('mobile-menu');
                const button = document.getElementById('mobile-menu-button');
                
                if (menu && button && !menu.contains(e.target) && !button.contains(e.target)) {
                    if (!menu.classList.contains('hidden')) {
                        menu.classList.add('hidden');
                        button.classList.remove('active');
                    }
                }
            });
            
            // Close mobile menu when window is resized to desktop
            window.addEventListener('resize', function() {
                const menu = document.getElementById('mobile-menu');
                const button = document.getElementById('mobile-menu-button');
                
                if (window.innerWidth >= 768) { // md breakpoint
                    if (menu && !menu.classList.contains('hidden')) {
                        menu.classList.add('hidden');
                    }
                    if (button) {
                        button.classList.remove('active');
                    }
                }
            });
        });
        
        // Function to set active menu item
        function setActiveMenuItem() {
            const currentPath = window.location.pathname;
            const currentPage = currentPath.split('/').pop() || 'index';
            
            // Remove active class from all menu items
            const menuItems = document.querySelectorAll('#mobile-menu a');
            menuItems.forEach(item => {
                item.classList.remove('active');
                item.removeAttribute('aria-current');
            });
            
            // Set active class based on current page
            let activeFound = false;
            menuItems.forEach(item => {
                const href = item.getAttribute('href');
                if (href) {
                    const linkPage = href.split('/').pop() || 'index';
                    
                    // Check for exact match or home page
                    if (linkPage === currentPage || 
                        (currentPage === 'index' && (href === '/' || href === '' || linkPage === 'index')) ||
                        (currentPath.includes('landing') && href.includes('landing')) ||
                        (currentPath.includes('about') && href.includes('about')) ||
                        (currentPath.includes('services') && href.includes('services')) ||
                        (currentPath.includes('artikel') && href.includes('artikel')) ||
                        (currentPath.includes('contact') && href.includes('contact'))) {
                        
                        item.classList.add('active');
                        item.setAttribute('aria-current', 'page');
                        activeFound = true;
                    }
                }
            });
            
            // If no specific match found, highlight home for landing page
            if (!activeFound && (currentPath === '/' || currentPath.includes('landing') || currentPath.includes('index'))) {
                const homeLink = document.querySelector('#mobile-menu a[href*="landing"], #mobile-menu a[href="/"], #mobile-menu a[href=""]');
                if (homeLink) {
                    homeLink.classList.add('active');
                    homeLink.setAttribute('aria-current', 'page');
                }
            }
        }
    </script>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 shadow-lg" style="background-color: #FCFB0B;">
        <div class="container mx-auto px-2 sm:px-4">
            <div class="flex justify-between items-center py-2 sm:py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <img src="<?= base_url('assets/img/logo-milala-white.jpeg') ?>" alt="Logo Milala Auto Service" class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 rounded-full">
                    <span class="text-xs sm:text-sm md:text-lg lg:text-xl xl:text-2xl font-bold text-black leading-tight">
                        <span class="block">SPECIALIS POWER STEERING</span>
                        <span class="block">DAN KAKI - KAKI MOBIL</span>
                    </span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-4 lg:space-x-6 xl:space-x-8">
                    <a href="<?= base_url(); ?>" class="font-medium text-sm lg:text-base <?= ($active == 'home') ? 'text-black font-bold border-b-2 border-black' : 'text-black hover:text-gray-700' ?> transition-colors">Beranda</a>
                    <a href="<?= base_url('about'); ?>" class="font-medium text-sm lg:text-base <?= ($active == 'about') ? 'text-black font-bold border-b-2 border-black' : 'text-black hover:text-gray-700' ?> transition-colors">Tentang Kami</a>
                    <a href="<?= base_url('services'); ?>" class="font-medium text-sm lg:text-base <?= ($active == 'services') ? 'text-black font-bold border-b-2 border-black' : 'text-black hover:text-gray-700' ?> transition-colors">Layanan</a>
                    
                    <!-- Workshop Dropdown -->
                    <div class="relative group">
                        <a href="#" class="font-medium text-sm lg:text-base <?= ($active == 'workshop') ? 'text-black font-bold border-b-2 border-black' : 'text-black hover:text-gray-700' ?> transition-colors flex items-center">
                            Workshop
                            <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute top-full left-0 mt-2 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-black mb-4 border-b border-gray-200 pb-2">Cabang Workshop Kami</h3>
                                
                                <!-- Ampera Branch -->
                                <a href="<?= base_url('workshop/ampera') ?>" class="block mb-6 p-4 bg-gradient-to-r from-primary to-primary rounded-xl hover:shadow-md transition-all duration-300">
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-gradient-to-r from-primary to-primary rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-black text-sm mb-1">Cabang Ampera</h4>
                                            <p class="text-xs text-gray-700 mb-2">Jl. Madrasah Raya No.3a, Ampera</p>
                                            <div class="text-xs">
                                                <div class="flex items-center mb-1">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="font-semibold text-black">Manager: Budi Santoso</span>
                                                </div>
                                                <div class="flex items-center mb-1">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="text-gray-700">Supervisor: Ahmad Rahman</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="text-gray-700">Head Mechanic: Dedi Kurniawan</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                                <!-- Bekasi Branch -->
                                <a href="<?= base_url('workshop/bekasi') ?>" class="block mb-6 p-4 bg-gradient-to-r from-primary to-primary rounded-xl hover:shadow-md transition-all duration-300">
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-gradient-to-r from-primary to-primary rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-black text-sm mb-1">Cabang Bekasi</h4>
                                            <p class="text-xs text-gray-700 mb-2">Jl. RA Kartini No.9, Bekasi Timur</p>
                                            <div class="text-xs">
                                                <div class="flex items-center mb-1">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="font-semibold text-black">Manager: Sari Indrawati</span>
                                                </div>
                                                <div class="flex items-center mb-1">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="text-gray-700">Supervisor: Rizky Pratama</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="text-gray-700">Head Mechanic: Eko Prasetyo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                                <!-- Antasari Branch -->
                                <a href="<?= base_url('workshop/antasari') ?>" class="block mb-6 p-4 bg-gradient-to-r from-primary to-primary rounded-xl hover:shadow-md transition-all duration-300">
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-gradient-to-r from-primary to-primary rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-black text-sm mb-1">Cabang Antasari</h4>
                                            <p class="text-xs text-gray-700 mb-2">Jl. Pangeran Antasari No.89</p>
                                            <div class="text-xs">
                                                <div class="flex items-center mb-1">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="font-semibold text-black">Manager: Hendra Wijaya</span>
                                                </div>
                                                <div class="flex items-center mb-1">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="text-gray-700">Supervisor: Maya Sari</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="text-gray-700">Head Mechanic: Agus Setiawan</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                                <!-- Bogor Branch -->
                                <a href="<?= base_url('workshop/bogor') ?>" class="block p-4 bg-gradient-to-r from-primary to-primary rounded-xl hover:shadow-md transition-all duration-300">
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-gradient-to-r from-primary to-primary rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-black text-sm mb-1">Cabang Bogor</h4>
                                            <p class="text-xs text-gray-700 mb-2">Jl. Raya Bogor No.45, Bogor</p>
                                            <div class="text-xs">
                                                <div class="flex items-center mb-1">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="font-semibold text-black">Manager: Dewi Lestari</span>
                                                </div>
                                                <div class="flex items-center mb-1">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="text-gray-700">Supervisor: Fajar Nugroho</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-2"></div>
                                                    <span class="text-gray-700">Head Mechanic: Irwan Setiadi</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="<?= base_url('artikel'); ?>" class="font-medium text-sm lg:text-base <?= ($active == 'artikel') ? 'text-black font-bold border-b-2 border-black' : 'text-black hover:text-gray-700' ?> transition-colors">Artikel</a>
                    <a href="<?= base_url('contact'); ?>" class="font-medium text-sm lg:text-base <?= ($active == 'contact') ? 'text-black font-bold border-b-2 border-black' : 'text-black hover:text-gray-700' ?> transition-colors">Kontak</a>
                    <a href="<?= base_url('reservation'); ?>" class="<?= ($active == 'reservation') ? 'bg-black text-white border-2 border-yellow-400' : 'bg-black text-white hover:bg-gray-800 hover:text-white border-2 border-yellow-400 hover:border-yellow-300' ?> px-4 lg:px-6 py-2 rounded-full font-bold text-sm lg:text-base transition-colors">
                        Reservasi
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="relative z-50 text-gray-700 focus:outline-none p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200 border border-gray-300 bg-white shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden py-2 px-2 bg-white border-t border-gray-200 relative z-40">
                <a href="<?= base_url(); ?>" class="block py-3 px-2 font-medium text-sm <?= ($active == 'home') ? 'text-black font-bold border-l-4 border-black pl-4' : 'text-black hover:text-gray-700' ?>">Beranda</a>
                <a href="<?= base_url('about'); ?>" class="block py-3 px-2 font-medium text-sm <?= ($active == 'about') ? 'text-black font-bold border-l-4 border-black pl-4' : 'text-black hover:text-gray-700' ?>">Tentang Kami</a>
                <a href="<?= base_url('services'); ?>" class="block py-3 px-2 font-medium text-sm <?= ($active == 'services') ? 'text-black font-bold border-l-4 border-black pl-4' : 'text-black hover:text-gray-700' ?>">Layanan</a>
                
                <!-- Mobile Workshop Menu -->
                <div class="block py-3 px-2">
                    <button id="mobile-workshop-toggle" class="flex items-center justify-between w-full font-medium text-sm <?= ($active == 'workshop') ? 'text-black font-bold border-l-4 border-black pl-4' : 'text-black hover:text-gray-700' ?>">
                        Workshop
                        <svg id="mobile-workshop-arrow" class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div id="mobile-workshop-menu" class="mt-2 ml-2 space-y-2 hidden">
                        <a href="<?= base_url('workshop/ampera') ?>" class="block p-2 bg-gradient-to-r from-primary to-primary rounded-lg hover:shadow-md transition-all duration-300">
                            <h5 class="font-bold text-xs text-black mb-1">Cabang Ampera</h5>
                            <p class="text-xs text-gray-700 mb-1">Manager: Budi Santoso</p>
                            <p class="text-xs text-gray-600">Jl. Madrasah Raya No.3a</p>
                        </a>
                        <a href="<?= base_url('workshop/bekasi') ?>" class="block p-2 bg-gradient-to-r from-primary to-primary rounded-lg hover:shadow-md transition-all duration-300">
                            <h5 class="font-bold text-xs text-black mb-1">Cabang Bekasi</h5>
                            <p class="text-xs text-gray-700 mb-1">Manager: Sari Indrawati</p>
                            <p class="text-xs text-gray-600">Jl. RA Kartini No.9</p>
                        </a>
                        <a href="<?= base_url('workshop/antasari') ?>" class="block p-2 bg-gradient-to-r from-primary to-primary rounded-lg hover:shadow-md transition-all duration-300">
                            <h5 class="font-bold text-xs text-black mb-1">Cabang Antasari</h5>
                            <p class="text-xs text-gray-700 mb-1">Manager: Hendra Wijaya</p>
                            <p class="text-xs text-gray-600">Jl. Pangeran Antasari No.89</p>
                        </a>
                        <a href="<?= base_url('workshop/bogor') ?>" class="block p-2 bg-gradient-to-r from-primary to-primary rounded-lg hover:shadow-md transition-all duration-300">
                            <h5 class="font-bold text-xs text-black mb-1">Cabang Bogor</h5>
                            <p class="text-xs text-gray-700 mb-1">Manager: Dewi Lestari</p>
                            <p class="text-xs text-gray-600">Jl. Raya Bogor No.45</p>
                        </a>
                    </div>
                </div>
                
                <a href="<?= base_url('artikel'); ?>" class="block py-3 px-2 font-medium text-sm <?= ($active == 'artikel') ? 'text-black font-bold border-l-4 border-black pl-4' : 'text-black hover:text-gray-700' ?>">Artikel</a>
                <a href="<?= base_url('contact'); ?>" class="block py-3 px-2 font-medium text-sm <?= ($active == 'contact') ? 'text-black font-bold border-l-4 border-black pl-4' : 'text-black hover:text-gray-700' ?>">Kontak</a>
                <a href="<?= base_url('reservation'); ?>" class="inline-block mt-3 mx-2 <?= ($active == 'reservation') ? 'bg-black text-white border-2 border-yellow-400' : 'bg-black text-white hover:bg-gray-800 hover:text-white border-2 border-yellow-400 hover:border-yellow-300' ?> px-4 py-2 rounded-full font-bold text-sm transition-colors">
                    Reservasi
                </a>
            </div>
        </div>
    </nav>
