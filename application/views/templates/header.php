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

    <!-- Mobile Menu Toggle Script -->
    <script>
        $(document).ready(function() {
            $('#mobile-menu-button').on('click', function() {
                $('#mobile-menu').toggleClass('hidden');
            });
        });
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
                        <img src="<?= base_url('assets/img/milala_logo_32.png') ?>" alt="Logo Milala Auto Service" class="w-8 h-8">
                    </div>
                    <span class="text-2xl font-bold text-dark">Milala Auto Service</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?= base_url(); ?>" class="font-medium <?= ($active == 'home') ? 'text-dark font-bold border-b-2 border-primary' : 'text-dark hover:text-primary' ?> transition-colors">Beranda</a>
                    <a href="<?= base_url('about'); ?>" class="font-medium <?= ($active == 'about') ? 'text-dark font-bold border-b-2 border-primary' : 'text-dark hover:text-primary' ?> transition-colors">Tentang Kami</a>
                    <a href="<?= base_url('services'); ?>" class="font-medium <?= ($active == 'services') ? 'text-dark font-bold border-b-2 border-primary' : 'text-dark hover:text-primary' ?> transition-colors">Layanan</a>
                    <a href="<?= base_url('artikel'); ?>" class="font-medium <?= ($active == 'artikel') ? 'text-dark font-bold border-b-2 border-primary' : 'text-dark hover:text-primary' ?> transition-colors">Artikel</a>
                    <a href="<?= base_url('contact'); ?>" class="font-medium <?= ($active == 'contact') ? 'text-dark font-bold border-b-2 border-primary' : 'text-dark hover:text-primary' ?> transition-colors">Kontak</a>
                    <a href="<?= base_url('reservation'); ?>" class="<?= ($active == 'reservation') ? 'bg-dark text-primary border-2 border-primary' : 'bg-primary text-dark hover:bg-dark hover:text-primary' ?> px-6 py-2 rounded-full font-bold transition-colors">
                        Reservasi
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
                <a href="<?= base_url(); ?>" class="block py-2 font-medium <?= ($active == 'home') ? 'text-dark font-bold border-l-4 border-primary pl-2' : 'text-dark hover:text-primary' ?>">Beranda</a>
                <a href="<?= base_url('about'); ?>" class="block py-2 font-medium <?= ($active == 'about') ? 'text-dark font-bold border-l-4 border-primary pl-2' : 'text-dark hover:text-primary' ?>">Tentang Kami</a>
                <a href="<?= base_url('services'); ?>" class="block py-2 font-medium <?= ($active == 'services') ? 'text-dark font-bold border-l-4 border-primary pl-2' : 'text-dark hover:text-primary' ?>">Layanan</a>
                <a href="<?= base_url('artikel'); ?>" class="block py-2 font-medium <?= ($active == 'artikel') ? 'text-dark font-bold border-l-4 border-primary pl-2' : 'text-dark hover:text-primary' ?>">Artikel</a>
                <a href="<?= base_url('contact'); ?>" class="block py-2 font-medium <?= ($active == 'contact') ? 'text-dark font-bold border-l-4 border-primary pl-2' : 'text-dark hover:text-primary' ?>">Kontak</a>
                <a href="<?= base_url('reservation'); ?>" class="inline-block mt-2 <?= ($active == 'reservation') ? 'bg-dark text-primary border-2 border-primary' : 'bg-primary text-dark hover:bg-dark hover:text-primary' ?> px-6 py-2 rounded-full font-bold transition-colors">
                    Reservasi
                </a>
            </div>
        </div>
    </nav>
