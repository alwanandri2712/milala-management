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

    <!-- Mobile Menu Toggle Script -->
    <script>
        $(document).ready(function() {
            $('#mobile-menu-button').on('click', function() {
                $('#mobile-menu').toggleClass('hidden');
            });
            
            // Mobile Workshop Menu Toggle
            $('#mobile-workshop-toggle').on('click', function() {
                $('#mobile-workshop-menu').toggleClass('hidden');
                $('#mobile-workshop-arrow').toggleClass('rotate-180');
            });
        });
    </script>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 shadow-lg" style="background-color: #FCFB0B;">
        <div class="container mx-auto px-2 sm:px-4">
            <div class="flex justify-between items-center py-2 sm:py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="bg-black p-1 sm:p-2 rounded-full">
                        <img src="<?= base_url('assets/img/logo-milala-white.jpeg') ?>" alt="Logo Milala Auto Service" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full">
                    </div>
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
                    <a href="<?= base_url('reservation'); ?>" class="<?= ($active == 'reservation') ? 'bg-black text-white border-2 border-black' : 'bg-black text-white hover:bg-gray-800 hover:text-white' ?> px-4 lg:px-6 py-2 rounded-full font-bold text-sm lg:text-base transition-colors">
                        Reservasi
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-black focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden py-2 px-2">
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
                        <div class="p-2 bg-gradient-to-r from-primary to-primary rounded-lg">
                            <h5 class="font-bold text-xs text-black mb-1">Cabang Ampera</h5>
                            <p class="text-xs text-gray-700 mb-1">Manager: Budi Santoso</p>
                            <p class="text-xs text-gray-600">Jl. Madrasah Raya No.3a</p>
                        </div>
                        <div class="p-2 bg-gradient-to-r from-primary to-primary rounded-lg">
                            <h5 class="font-bold text-xs text-black mb-1">Cabang Bekasi</h5>
                            <p class="text-xs text-gray-700 mb-1">Manager: Sari Indrawati</p>
                            <p class="text-xs text-gray-600">Jl. RA Kartini No.9</p>
                        </div>
                        <div class="p-2 bg-gradient-to-r from-primary to-primary rounded-lg">
                            <h5 class="font-bold text-xs text-black mb-1">Cabang Antasari</h5>
                            <p class="text-xs text-gray-700 mb-1">Manager: Hendra Wijaya</p>
                            <p class="text-xs text-gray-600">Jl. Pangeran Antasari No.89</p>
                        </div>
                        <div class="p-2 bg-gradient-to-r from-primary to-primary rounded-lg">
                            <h5 class="font-bold text-xs text-black mb-1">Cabang Bogor</h5>
                            <p class="text-xs text-gray-700 mb-1">Manager: Dewi Lestari</p>
                            <p class="text-xs text-gray-600">Jl. Raya Bogor No.45</p>
                        </div>
                    </div>
                </div>
                
                <a href="<?= base_url('artikel'); ?>" class="block py-3 px-2 font-medium text-sm <?= ($active == 'artikel') ? 'text-black font-bold border-l-4 border-black pl-4' : 'text-black hover:text-gray-700' ?>">Artikel</a>
                <a href="<?= base_url('contact'); ?>" class="block py-3 px-2 font-medium text-sm <?= ($active == 'contact') ? 'text-black font-bold border-l-4 border-black pl-4' : 'text-black hover:text-gray-700' ?>">Kontak</a>
                <a href="<?= base_url('reservation'); ?>" class="inline-block mt-3 mx-2 <?= ($active == 'reservation') ? 'bg-black text-white border-2 border-black' : 'bg-black text-white hover:bg-gray-800 hover:text-white' ?> px-4 py-2 rounded-full font-bold text-sm transition-colors">
                    Reservasi
                </a>
            </div>
        </div>
    </nav>
