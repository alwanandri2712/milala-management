<!-- Artikel Page -->
<section class="pt-28 pb-20 bg-white">
    <div class="container mx-auto px-4">
        <!-- Page Title -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-5xl font-black text-dark mb-6">
                Artikel & Tips
            </h1>
            <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Informasi dan tips perawatan kendaraan untuk membantu Anda menjaga mobil tetap prima
            </p>
        </div>

        <!-- Search & Categories -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
            <div class="w-full md:w-1/3">
                <div class="relative">
                    <input type="text" placeholder="Cari artikel..." class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                    <button class="absolute right-3 top-3 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 rounded-full bg-primary text-dark font-medium">
                    Semua
                </button>
                <button class="px-4 py-2 rounded-full bg-gray-100 text-dark font-medium hover:bg-primary transition-colors">
                    Perawatan
                </button>
                <button class="px-4 py-2 rounded-full bg-gray-100 text-dark font-medium hover:bg-primary transition-colors">
                    Tips Berkendara
                </button>
                <button class="px-4 py-2 rounded-full bg-gray-100 text-dark font-medium hover:bg-primary transition-colors">
                    Teknologi
                </button>
                <button class="px-4 py-2 rounded-full bg-gray-100 text-dark font-medium hover:bg-primary transition-colors">
                    DIY
                </button>
            </div>
        </div>

        <!-- Featured Article -->
        <?php if ($featured_article): ?>
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-16" data-aos="fade-up">
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-1/2">
                    <img src="<?= base_url('upload/artikel/' . $featured_article->artikel_image) ?>"
                         alt="<?= $featured_article->artikel_title ?>"
                         class="w-full h-full object-cover">
                </div>
                <div class="lg:w-1/2 p-8 md:p-12">
                    <div class="flex items-center mb-4">
                        <span class="bg-primary/20 text-dark px-3 py-1 rounded-full text-sm font-medium">Artikel</span>
                        <span class="ml-4 text-gray-500 text-sm"><?= date('d M Y', strtotime($featured_article->created_date)) ?></span>
                    </div>
                    <h2 class="text-3xl font-bold mb-4"><?= $featured_article->artikel_title ?></h2>
                    <p class="text-gray-600 mb-6">
                        <?= substr(strip_tags($featured_article->artikel_content), 0, 200) ?>...
                    </p>
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-dark font-bold mr-3">
                            <?= substr($featured_article->created_by, 0, 1) ?>
                        </div>
                        <div>
                            <p class="font-medium"><?= $featured_article->created_by ?></p>
                            <p class="text-gray-500 text-sm">Penulis</p>
                        </div>
                    </div>
                    <a href="<?= base_url('artikel/' . $featured_article->artikel_slug) ?>" class="inline-block bg-primary text-dark px-6 py-3 rounded-full font-bold hover:bg-dark hover:text-primary transition-colors">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-16 p-8 text-center" data-aos="fade-up">
            <h2 class="text-2xl font-bold mb-4">Belum ada artikel tersedia</h2>
            <p class="text-gray-600">Artikel akan segera ditambahkan. Silakan kunjungi kembali nanti.</p>
        </div>
        <?php endif; ?>

        <!-- Articles Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <?php if (!empty($articles['results'])): ?>
                <?php $delay = 50; foreach ($articles['results'] as $article): ?>
                <!-- Article -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <img src="<?= base_url('upload/artikel/' . $article->artikel_image) ?>"
                         alt="<?= $article->artikel_title ?>"
                         class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <span class="bg-primary/20 text-dark px-3 py-1 rounded-full text-sm font-medium">Artikel</span>
                            <span class="ml-4 text-gray-500 text-sm"><?= date('d M Y', strtotime($article->created_date)) ?></span>
                        </div>
                        <h3 class="text-xl font-bold mb-3"><?= $article->artikel_title ?></h3>
                        <p class="text-gray-600 mb-4">
                            <?= substr(strip_tags($article->artikel_content), 0, 120) ?>...
                        </p>
                        <a href="<?= base_url('artikel/' . $article->artikel_slug) ?>" class="text-primary font-bold hover:text-dark transition-colors">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
                <?php $delay += 50; endforeach; ?>
            <?php else: ?>
                <div class="col-span-3 bg-white rounded-2xl shadow-lg p-8 text-center">
                    <h3 class="text-xl font-bold mb-3">Belum ada artikel tersedia</h3>
                    <p class="text-gray-600">Artikel akan segera ditambahkan. Silakan kunjungi kembali nanti.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center" data-aos="fade-up">
            <nav class="inline-flex rounded-md shadow-sm">
                <a href="#" class="py-2 px-4 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 rounded-l-md">
                    Prev
                </a>
                <a href="#" class="py-2 px-4 border-t border-b border-gray-300 bg-primary text-dark">
                    1
                </a>
                <a href="#" class="py-2 px-4 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    2
                </a>
                <a href="#" class="py-2 px-4 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    3
                </a>
                <a href="#" class="py-2 px-4 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 rounded-r-md">
                    Next
                </a>
            </nav>
        </div>

        <!-- Newsletter -->
        <div class="bg-primary rounded-2xl p-12 text-center mt-20" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-6 text-dark">Dapatkan Tips Perawatan Mobil Terbaru</h2>
            <p class="text-dark/80 max-w-2xl mx-auto mb-8">
                Berlangganan newsletter kami untuk mendapatkan tips dan trik perawatan mobil terbaru langsung ke email Anda
            </p>
            <div class="max-w-md mx-auto">
                <div class="flex">
                    <input type="email" placeholder="Email Anda" class="w-full px-4 py-3 rounded-l-lg focus:outline-none">
                    <button class="bg-dark text-primary px-6 py-3 rounded-r-lg font-bold hover:bg-black transition-colors">
                        Berlangganan
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
