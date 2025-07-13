<!-- Workshop Overview Section -->
<section class="relative min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-800 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-32 h-32 bg-primary/10 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-primary/10 rounded-full blur-xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-primary/10 rounded-full blur-xl animate-pulse delay-500"></div>
    </div>

    <div class="relative container mx-auto px-6 py-20">
        <!-- Header Section -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-primary/10 rounded-full text-primary font-semibold text-sm mb-6">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 4a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8z" clip-rule="evenodd"/>
                </svg>
                Workshop Kami
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                Jaringan <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary">Workshop</span> Terpercaya
            </h1>
            <p class="text-xl text-white/80 max-w-3xl mx-auto leading-relaxed">
                Dengan 4 cabang strategis di Jakarta, Bekasi, dan Bogor, kami siap melayani kebutuhan perawatan kendaraan Anda dengan tim profesional dan fasilitas modern.
            </p>
        </div>

        <!-- Workshop Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            <?php foreach($workshops as $workshop): ?>
            <div class="group bg-white/10 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-white/20" data-aos="fade-up" data-aos-delay="<?= array_search($workshop, $workshops) * 100 ?>">
                <!-- Workshop Image -->
                <div class="relative h-64 bg-gradient-to-br from-primary/20 to-primary/20 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-sm font-semibold text-gray-700"><?= $workshop['rating'] ?></span>
                        </div>
                    </div>
                    <!-- Workshop Icon -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 4a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Workshop Content -->
                <div class="p-8">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2"><?= $workshop['name'] ?></h3>
                            <div class="flex items-center text-white/80 mb-2">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm"><?= $workshop['address'] ?></span>
                            </div>
                            <div class="flex items-center text-white/80">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                                <span class="text-sm"><?= $workshop['phone'] ?></span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-semibold">
                                Sejak <?= $workshop['established'] ?>
                            </div>
                        </div>
                    </div>

                    <p class="text-white/80 mb-6 leading-relaxed"><?= $workshop['description'] ?></p>

                    <!-- Team Preview -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-white mb-3">Tim Profesional</h4>
                        <div class="flex -space-x-2">
                            <?php foreach(array_slice($workshop['team'], 0, 3) as $member): ?>
                            <div class="w-10 h-10 bg-gradient-to-br from-primary to-primary rounded-full flex items-center justify-center text-black font-semibold text-sm border-2 border-white">
                                <?= substr($member['name'], 0, 1) ?>
                            </div>
                            <?php endforeach; ?>
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 font-semibold text-xs border-2 border-white">
                                +<?= count($workshop['team']) ?>
                            </div>
                        </div>
                    </div>

                    <!-- Services Preview -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-white mb-3">Layanan Unggulan</h4>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach(array_slice($workshop['services'], 0, 2) as $service): ?>
                            <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm"><?= $service ?></span>
                            <?php endforeach; ?>
                            <?php if(count($workshop['services']) > 2): ?>
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-semibold">+<?= count($workshop['services']) - 2 ?> lainnya</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <a href="<?= base_url('workshop/' . $workshop['slug']) ?>" class="flex-1 bg-gradient-to-r from-primary to-primary text-black px-6 py-3 rounded-xl font-semibold text-center hover:shadow-lg transition-all duration-300 group">
                            <span class="group-hover:translate-x-1 transition-transform duration-300 inline-block">Lihat Detail</span>
                        </a>
                        <a href="<?= base_url('reservation') ?>" class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-xl font-semibold transition-colors duration-300">
                            Reservasi
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Call to Action -->
        <div class="text-center bg-gradient-to-r from-primary to-primary rounded-3xl p-12 text-black" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Melayani Kendaraan Anda</h2>
            <p class="text-xl mb-8 opacity-90">Pilih cabang terdekat dan rasakan pelayanan terbaik dari tim profesional kami</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= base_url('reservation') ?>" class="bg-white text-black px-8 py-4 rounded-xl font-bold hover:shadow-lg transition-all duration-300 hover:scale-105">
                    Buat Reservasi Sekarang
                </a>
                <a href="<?= base_url('contact') ?>" class="border-2 border-black text-black px-8 py-4 rounded-xl font-bold hover:bg-black hover:text-primary transition-all duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div data-aos="fade-up" data-aos-delay="0">
                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">4</div>
                <div class="text-gray-400">Cabang Workshop</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">25+</div>
                <div class="text-gray-400">Tahun Pengalaman</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">12</div>
                <div class="text-gray-400">Tim Profesional</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">10K+</div>
                <div class="text-gray-400">Pelanggan Puas</div>
            </div>
        </div>
    </div>
</section>