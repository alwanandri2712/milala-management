<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Milala Auto Service - Bengkel Spesialis Power Steering & Kaki-Kaki' ?></title>

    <!-- META SEO Tags -->
    <meta name="description" content="Milala Auto Service - Bengkel spesialis power steering & kaki-kaki mobil dengan layanan perbaikan, penggantian, dan spooring balancing. 4 cabang strategis di Jakarta, Bekasi, dan Bogor.">
    <meta name="keywords" content="power steering, bengkel power steering, spesialis power steering, perbaikan power steering, kaki-kaki mobil, spooring balancing, ball joint, tie rod, shock absorber, Milala Auto Service, bengkel spesialis Jakarta">
    <meta name="author" content="Milala Auto Service">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>">
    <meta property="og:title" content="<?= $title ?? 'Milala Auto Service - Bengkel Spesialis Power Steering & Kaki-Kaki' ?>">
    <meta property="og:description" content="Bengkel spesialis power steering & kaki-kaki mobil dengan layanan perbaikan, penggantian, dan spooring balancing. 4 cabang strategis di Jakarta, Bekasi, dan Bogor.">
    <meta property="og:image" content="<?= base_url('assets/img/logo.jpg') ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= base_url() ?>">
    <meta property="twitter:title" content="<?= $title ?? 'Milala Auto Service - Bengkel Spesialis Power Steering & Kaki-Kaki' ?>">
    <meta property="twitter:description" content="Bengkel spesialis power steering & kaki-kaki mobil dengan layanan perbaikan, penggantian, dan spooring balancing. 4 cabang strategis di Jakarta, Bekasi, dan Bogor.">
    <meta property="twitter:image" content="<?= base_url('assets/img/logo.jpg') ?>">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
            background: #FFD32E;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #e6be29;
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
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-sm shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="bg-primary p-2 rounded-lg">
                        <svg class="w-8 h-8 text-dark" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 12h-2V9h-2v3H5c-1.1 0-2 .9-2 2v3h2v-3h14v3h2v-3c0-1.1-.9-2-2-2zM5 7h14c1.1 0 2-.9 2-2s-.9-2-2-2H5c-1.1 0-2 .9-2 2s.9 2 2 2zm11.5 7c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm-8 0c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-dark">Milala Auto Service</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?= base_url(); ?>" class="font-medium <?= ($active == 'home') ? 'text-primary' : 'text-dark hover:text-primary' ?> transition-colors">Beranda</a>
                    <a href="<?= base_url('pages/about'); ?>" class="font-medium <?= ($active == 'about') ? 'text-primary' : 'text-dark hover:text-primary' ?> transition-colors">Tentang Kami</a>
                    <a href="<?= base_url('pages/services'); ?>" class="font-medium <?= ($active == 'services') ? 'text-primary' : 'text-dark hover:text-primary' ?> transition-colors">Layanan</a>
                    <a href="<?= base_url('pages/artikel'); ?>" class="font-medium <?= ($active == 'artikel') ? 'text-primary' : 'text-dark hover:text-primary' ?> transition-colors">Artikel</a>
                    <a href="<?= base_url('pages/contact'); ?>" class="font-medium <?= ($active == 'contact') ? 'text-primary' : 'text-dark hover:text-primary' ?> transition-colors">Kontak</a>
                    <a href="#" class="bg-primary px-6 py-2 rounded-full font-bold text-dark hover:bg-dark hover:text-primary transition-colors">
                        Booking
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-dark focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden py-4">
                <a href="<?= base_url(); ?>" class="block py-2 font-medium <?= ($active == 'home') ? 'text-primary' : 'text-dark hover:text-primary' ?>">Beranda</a>
                <a href="<?= base_url('pages/about'); ?>" class="block py-2 font-medium <?= ($active == 'about') ? 'text-primary' : 'text-dark hover:text-primary' ?>">Tentang Kami</a>
                <a href="<?= base_url('pages/services'); ?>" class="block py-2 font-medium <?= ($active == 'services') ? 'text-primary' : 'text-dark hover:text-primary' ?>">Layanan</a>
                <a href="<?= base_url('pages/artikel'); ?>" class="block py-2 font-medium <?= ($active == 'artikel') ? 'text-primary' : 'text-dark hover:text-primary' ?>">Artikel</a>
                <a href="<?= base_url('pages/contact'); ?>" class="block py-2 font-medium <?= ($active == 'contact') ? 'text-primary' : 'text-dark hover:text-primary' ?>">Kontak</a>
                <a href="#" class="inline-block mt-2 bg-primary px-6 py-2 rounded-full font-bold text-dark hover:bg-dark hover:text-primary transition-colors">
                    Booking
                </a>
            </div>
        </div>
    </nav>
