<!-- Artikel Page -->
<section class="pt-28 pb-20 bg-gradient-to-br from-gray-900 via-black to-gray-800">
    <div class="container mx-auto px-4 mt-12">
        <!-- Page Title -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-5xl font-black text-white mb-6">
                Artikel & Tips
            </h1>
            <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Informasi dan tips perawatan kendaraan untuk membantu Anda menjaga mobil tetap prima
            </p>
        </div>

        <!-- Search & Categories -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
            <div class="w-full md:w-1/3">
                <div class="relative">
                    <input type="text" id="search-article" placeholder="Cari artikel..." class="w-full px-4 py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-primary">
                    <button id="search-button" class="absolute right-3 top-3 text-white/60">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <button data-category="all" class="category-filter px-4 py-2 rounded-full bg-gradient-to-r from-primary to-primary text-black font-medium">
                    Semua
                </button>
                <button data-category="Perawatan" class="category-filter px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white font-medium hover:bg-gradient-to-r hover:from-primary hover:to-primary hover:text-black transition-colors">
                    Perawatan
                </button>
                <button data-category="Tips Berkendara" class="category-filter px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white font-medium hover:bg-gradient-to-r hover:from-primary hover:to-primary hover:text-black transition-colors">
                    Tips Berkendara
                </button>
                <button data-category="Teknologi" class="category-filter px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white font-medium hover:bg-gradient-to-r hover:from-primary hover:to-primary hover:text-black transition-colors">
                    Teknologi
                </button>
                <button data-category="DIY" class="category-filter px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white font-medium hover:bg-gradient-to-r hover:from-primary hover:to-primary hover:text-black transition-colors">
                    DIY
                </button>
            </div>
        </div>

        <!-- Featured Article -->
        <?php if ($featured_article): ?>
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl shadow-xl overflow-hidden mb-16" data-aos="fade-up">
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-1/2">
                    <img src="<?= base_url('upload/artikel/' . $featured_article->artikel_image) ?>"
                         alt="<?= $featured_article->artikel_title ?>"
                         class="w-full h-full object-cover">
                </div>
                <div class="lg:w-1/2 p-8 md:p-12">
                    <div class="flex items-center mb-4">
                        <span class="bg-primary text-black px-3 py-1 rounded-full text-sm font-medium">Artikel</span>
                        <span class="ml-4 text-white/60 text-sm"><?= date('d M Y', strtotime($featured_article->created_date)) ?></span>
                    </div>
                    <h2 class="text-3xl font-bold mb-4 text-white"><?= $featured_article->artikel_title ?></h2>
                    <p class="text-white/80 mb-6">
                        <?= substr(strip_tags($featured_article->artikel_content), 0, 200) ?>...
                    </p>
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-primary to-primary flex items-center justify-center text-black font-bold mr-3">
                            <?= substr($featured_article->created_by, 0, 1) ?>
                        </div>
                        <div>
                            <p class="font-medium text-white"><?= $featured_article->created_by ?></p>
                            <p class="text-white/60 text-sm">Penulis</p>
                        </div>
                    </div>
                    <a href="<?= base_url('artikel/' . $featured_article->artikel_slug) ?>" class="inline-block bg-gradient-to-r from-primary to-primary text-black px-6 py-3 rounded-full font-bold hover:bg-black hover:text-primary transition-colors">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl shadow-xl overflow-hidden mb-16 p-8 text-center" data-aos="fade-up">
            <h2 class="text-2xl font-bold mb-4 text-white">Belum ada artikel tersedia</h2>
            <p class="text-white/80">Artikel akan segera ditambahkan. Silakan kunjungi kembali nanti.</p>
        </div>
        <?php endif; ?>

        <!-- Articles Grid -->
        <div id="articles-container" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <?php if (!empty($articles['results'])): ?>
                <?php $delay = 50; foreach ($articles['results'] as $article): ?>
                <!-- Article -->
                <div class="article-item bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <img src="<?= base_url('upload/artikel/' . $article->artikel_image) ?>"
                         alt="<?= $article->artikel_title ?>"
                         class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <span class="bg-primary text-black px-3 py-1 rounded-full text-sm font-medium">Artikel</span>
                            <span class="ml-4 text-white/60 text-sm"><?= date('d M Y', strtotime($article->created_date)) ?></span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white"><?= $article->artikel_title ?></h3>
                        <p class="text-white/80 mb-4">
                            <?= substr(strip_tags($article->artikel_content), 0, 120) ?>...
                        </p>
                        <a href="<?= base_url('artikel/' . $article->artikel_slug) ?>" class="text-primary font-bold hover:text-white transition-colors">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
                <?php $delay += 50; endforeach; ?>
            <?php else: ?>
                <div id="no-articles" class="col-span-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg p-8 text-center">
                    <h3 class="text-xl font-bold mb-3 text-white">Belum ada artikel tersedia</h3>
                    <p class="text-white/80">Artikel akan segera ditambahkan. Silakan kunjungi kembali nanti.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Load More Button -->
        <div id="load-more-container" class="flex justify-center mb-16" data-aos="fade-up">
            <button id="load-more-btn" class="bg-gradient-to-r from-primary to-primary text-black px-8 py-3 rounded-full font-bold hover:bg-black hover:text-primary transition-colors">
                Muat Lebih Banyak
            </button>
            <div id="loading-indicator" class="hidden">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
            </div>
        </div>
        
        <!-- No More Articles Message -->
        <div id="no-more-articles" class="text-center mb-16 hidden">
            <p class="text-white/60">Tidak ada artikel lagi untuk ditampilkan</p>
        </div>

        <!-- Newsletter -->
        <div class="bg-gradient-to-r from-primary to-primary rounded-2xl p-12 text-center mt-20" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-6 text-black">Dapatkan Tips Perawatan Mobil Terbaru</h2>
            <p class="text-black/80 max-w-2xl mx-auto mb-8">
                Berlangganan newsletter kami untuk mendapatkan tips dan trik perawatan mobil terbaru langsung ke email Anda
            </p>
            <div class="max-w-md mx-auto">
                <div class="flex">
                    <input type="email" placeholder="Email Anda" class="w-full px-4 py-3 rounded-l-lg focus:outline-none">
                    <button class="bg-black text-primary px-6 py-3 rounded-r-lg font-bold hover:bg-gray-800 transition-colors">
                        Berlangganan
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- AJAX Script for Articles -->
    <script>
        $(document).ready(function() {
            // Variables for pagination and filtering
            let currentOffset = <?= count($articles['results']) ?>;
            let limit = 6;
            let currentSearch = '';
            let currentCategory = 'all';
            let isLoading = false;
            let hasMore = true;
            
            // Function to load articles via AJAX
            function loadArticles(offset, limit, search, category, append = true) {
                if (isLoading) return;
                
                isLoading = true;
                $('#loading-indicator').removeClass('hidden');
                $('#load-more-btn').addClass('hidden');
                
                $.ajax({
                    url: '<?= base_url("landing/get_articles_json") ?>',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        offset: offset,
                        limit: limit,
                        search: search,
                        category: category
                    },
                    success: function(response) {
                        if (response.code === 200) {
                            // Hide loading indicator
                            $('#loading-indicator').addClass('hidden');
                            
                            // Check if we have more articles to load
                            hasMore = response.data.pagination.has_more;
                            
                            if (hasMore) {
                                $('#load-more-btn').removeClass('hidden');
                                $('#no-more-articles').addClass('hidden');
                            } else {
                                $('#load-more-btn').addClass('hidden');
                                $('#no-more-articles').removeClass('hidden');
                            }
                            
                            // If no articles found
                            if (response.data.articles.length === 0 && !append) {
                                $('#articles-container').html(
                                    '<div id="no-articles" class="col-span-3 bg-white rounded-2xl shadow-lg p-8 text-center">' +
                                    '<h3 class="text-xl font-bold mb-3">Tidak ada artikel ditemukan</h3>' +
                                    '<p class="text-gray-600">Silakan coba dengan kata kunci atau kategori lain.</p>' +
                                    '</div>'
                                );
                                $('#no-more-articles').addClass('hidden');
                                return;
                            }
                            
                            // Clear container if not appending
                            if (!append) {
                                $('#articles-container').empty();
                            }
                            
                            // Fungsi untuk mencegah XSS attack dengan escape HTML
                            function escapeHtml(unsafe) {
                                return unsafe
                                    .replace(/&/g, "&amp;")
                                    .replace(/</g, "&lt;")
                                    .replace(/>/g, "&gt;")
                                    .replace(/"/g, "&quot;")
                                    .replace(/'/g, "&#039;");
                            }
                            
                            // Append articles to container dengan sanitasi data
                            $.each(response.data.articles, function(index, article) {
                                // Sanitasi data untuk mencegah XSS
                                const safeTitle = escapeHtml(article.title);
                                const safeContentPreview = escapeHtml(article.content_preview);
                                const safeDate = escapeHtml(article.date);
                                const safeSlug = escapeHtml(article.slug);
                                
                                let articleHtml = `
                                    <div class="article-item bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up">
                                        <img src="${article.image}" alt="${safeTitle}" class="w-full h-56 object-cover">
                                        <div class="p-6">
                                            <div class="flex items-center mb-4">
                                                <span class="bg-primary text-dark px-3 py-1 rounded-full text-sm font-medium">Artikel</span>
                                                <span class="ml-4 text-gray-500 text-sm">${safeDate}</span>
                                            </div>
                                            <h3 class="text-xl font-bold mb-3">${safeTitle}</h3>
                                            <p class="text-gray-600 mb-4">${safeContentPreview}</p>
                                            <a href="<?= base_url('artikel/') ?>${safeSlug}" class="text-primary font-bold hover:text-dark transition-colors">
                                                Baca Selengkapnya →
                                            </a>
                                        </div>
                                    </div>
                                `;
                                $('#articles-container').append(articleHtml);
                            });
                            
                            // Update current offset
                            currentOffset = offset + response.data.articles.length;
                            
                            // Reinitialize AOS for new elements
                            AOS.refresh();
                        } else {
                            console.error('Error loading articles:', response.message);
                        }
                        
                        isLoading = false;
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        $('#loading-indicator').addClass('hidden');
                        $('#load-more-btn').removeClass('hidden');
                        isLoading = false;
                    }
                });
            }
            
            // Load More button click event
            $('#load-more-btn').on('click', function() {
                loadArticles(currentOffset, limit, currentSearch, currentCategory);
            });
            
            // Variabel untuk debounce timer
            let searchTimer;
            
            // Auto search saat mengetik dengan debounce
            $('#search-article').on('keyup', function() {
                clearTimeout(searchTimer);
                
                // Tunggu 500ms setelah pengguna berhenti mengetik
                searchTimer = setTimeout(function() {
                    currentSearch = $('#search-article').val().trim();
                    currentOffset = 0;
                    loadArticles(0, limit, currentSearch, currentCategory, false);
                }, 500);
            });
            
            // Search button click event (tetap dipertahankan untuk UX)
            $('#search-button').on('click', function() {
                clearTimeout(searchTimer); // Clear timer jika tombol diklik
                currentSearch = $('#search-article').val().trim();
                currentOffset = 0;
                loadArticles(0, limit, currentSearch, currentCategory, false);
            });
            
            // Enter key in search input
            $('#search-article').on('keypress', function(e) {
                if (e.which === 13) {
                    clearTimeout(searchTimer); // Clear timer jika Enter ditekan
                    currentSearch = $(this).val().trim();
                    currentOffset = 0;
                    loadArticles(0, limit, currentSearch, currentCategory, false);
                    return false; // Prevent form submission
                }
            });
            
            // Category filter click event
            $('.category-filter').on('click', function() {
                // Update active category styling
                $('.category-filter').removeClass('bg-primary').addClass('bg-gray-100');
                $(this).removeClass('bg-gray-100').addClass('bg-primary');
                
                // Update current category
                currentCategory = $(this).data('category');
                currentOffset = 0;
                
                // Load articles with new filter
                loadArticles(0, limit, currentSearch, currentCategory, false);
            });
        });
    </script>
</section>
