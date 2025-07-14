<!-- Artikel Detail Page -->
<section class="pt-28 pb-20 bg-gradient-to-br from-gray-900 via-black to-gray-800">
    <div class="container mx-auto px-4">
        <?php if ($article): ?>
            <!-- Article Content -->
            <article class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <div class="flex items-center text-sm text-white/60 mb-8">
                    <a href="<?= base_url() ?>" class="hover:text-primary">Beranda</a>
                    <span class="mx-2">/</span>
                    <a href="<?= base_url('artikel') ?>" class="hover:text-primary">Artikel</a>
                    <span class="mx-2">/</span>
                    <span class="text-white"><?= $article->artikel_title ?></span>
                </div>

                <!-- Article Header -->
                <div class="mb-8">
                    <h1 class="text-4xl font-black text-white mb-6">
                        <?= $article->artikel_title ?>
                    </h1>
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-primary to-primary flex items-center justify-center text-black font-bold mr-3">
                            <?= substr($article->created_by, 0, 1) ?>
                        </div>
                        <div class="mr-6">
                            <p class="font-medium text-white"><?= $article->created_by ?></p>
                            <p class="text-white/60 text-sm">Penulis</p>
                        </div>
                        <div>
                            <p class="text-white/60 text-sm">Dipublikasikan pada</p>
                            <p class="font-medium text-white"><?= date('d M Y', strtotime($article->created_date)) ?></p>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="mb-8 rounded-2xl overflow-hidden">
                    <img src="<?= base_url('upload/artikel/' . $article->artikel_image) ?>"
                        alt="<?= $article->artikel_title ?>"
                        class="w-full h-auto">
                </div>

                <!-- Article Content -->
                <div class="prose prose-lg max-w-none mb-12 prose-invert text-white">
                    <style>
                        .prose-invert p, 
                        .prose-invert h1, 
                        .prose-invert h2, 
                        .prose-invert h3, 
                        .prose-invert h4, 
                        .prose-invert h5, 
                        .prose-invert h6,
                        .prose-invert li,
                        .prose-invert span,
                        .prose-invert div,
                        .prose-invert strong,
                        .prose-invert em,
                        .prose-invert blockquote {
                            color: white !important;
                        }
                        .prose-invert a {
                            color: #FCFB0B !important;
                        }
                        .prose-invert a:hover {
                            color: #e6e009 !important;
                        }
                    </style>
                    <?= $article->artikel_content ?>
                </div>

                <!-- Share Buttons -->
                <div class="border-t border-b border-white/20 py-6 mb-12">
                    <div class="flex items-center">
                        <span class="font-bold text-white mr-4">Bagikan:</span>
                        <div class="flex space-x-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank" class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?= current_url() ?>&text=<?= $article->artikel_title ?>" target="_blank" class="w-10 h-10 rounded-full bg-blue-400 text-white flex items-center justify-center hover:bg-blue-500">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text=<?= urlencode($article->artikel_title . ' ' . current_url()) ?>" target="_blank" class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Related Articles -->
            <?php if (!empty($related_articles['results'])): ?>
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-2xl font-bold mb-8 text-white">Artikel Terkait</h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php foreach ($related_articles['results'] as $related): ?>
                            <!-- Related Article -->
                            <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg overflow-hidden">
                                <img src="<?= base_url('upload/artikel/' . $related->artikel_image) ?>"
                                    alt="<?= $related->artikel_title ?>"
                                    class="w-full h-48 object-cover">
                                <div class="p-6">
                                    <div class="flex items-center mb-4">
                                        <span class="bg-primary/20 text-black px-3 py-1 rounded-full text-sm font-medium">Artikel</span>
                                        <span class="ml-4 text-white/60 text-sm"><?= date('d M Y', strtotime($related->created_date)) ?></span>
                                    </div>
                                    <h3 class="text-xl font-bold mb-3 text-white"><?= $related->artikel_title ?></h3>
                                    <p class="text-white/80 mb-4">
                                        <?= substr(strip_tags($related->artikel_content), 0, 100) ?>...
                                    </p>
                                    <a href="<?= base_url('artikel/' . $related->artikel_slug) ?>" class="text-primary font-bold hover:text-white transition-colors">
                                        Baca Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <!-- Article Not Found -->
            <div class="max-w-4xl mx-auto text-center py-16">
                <h1 class="text-4xl font-black text-white mb-6">
                    Artikel Tidak Ditemukan
                </h1>
                <p class="text-lg text-white/80 mb-8">
                    Maaf, artikel yang Anda cari tidak ditemukan atau telah dihapus.
                </p>
                <a href="<?= base_url('artikel') ?>" class="inline-block bg-gradient-to-r from-primary to-primary text-black px-6 py-3 rounded-full font-bold hover:bg-black hover:text-primary transition-colors">
                    Kembali ke Daftar Artikel
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>