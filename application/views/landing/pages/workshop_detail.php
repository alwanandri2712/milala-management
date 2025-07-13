<!-- Workshop Detail Hero Section -->
<section class="relative min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-800 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-32 h-32 bg-primary/10 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-primary/10 rounded-full blur-xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-primary/10 rounded-full blur-xl animate-pulse delay-500"></div>
    </div>

    <div class="relative container mx-auto px-6 py-20 mt-20">

        <!-- Workshop Header -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
            <!-- Workshop Info -->
            <div data-aos="fade-right">
                <div class="inline-flex items-center px-4 py-2 bg-primary/10 rounded-full text-primary font-semibold text-sm mb-6">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    Sejak <?= $selected_workshop['established'] ?>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                    <?= $selected_workshop['name'] ?>
                </h1>
                <p class="text-xl text-white/80 mb-8 leading-relaxed">
                    <?= $selected_workshop['description'] ?>
                </p>

                <!-- Contact Info -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-white">Alamat</div>
                            <div class="text-white/80"><?= $selected_workshop['address'] ?></div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-white">Telepon</div>
                            <div class="text-white/80"><?= $selected_workshop['phone'] ?></div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-white">Rating</div>
                            <div class="text-white/80"><?= $selected_workshop['rating'] ?>/5.0 dari pelanggan</div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?= base_url('reservation') ?>" class="bg-gradient-to-r from-primary to-primary text-black px-8 py-4 rounded-xl font-bold hover:shadow-lg transition-all duration-300 hover:scale-105 text-center">
                        Reservasi Sekarang
                    </a>
                    <a href="https://maps.google.com/?q=<?= urlencode($selected_workshop['address']) ?>" target="_blank" class="border-2 border-primary text-primary px-8 py-4 rounded-xl font-bold hover:bg-primary hover:text-black transition-all duration-300 text-center">
                        Lihat di Maps
                    </a>
                </div>
            </div>

            <!-- Workshop Visual -->
            <div data-aos="fade-left">
                <div class="relative">
                    <div class="w-full h-96 bg-gradient-to-br from-primary/20 to-primary/20 rounded-3xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <!-- Workshop Illustration -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-32 h-32 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center">
                                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 4a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-primary rounded-2xl flex items-center justify-center animate-bounce">
                        <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gradient-to-br from-gray-900 via-black to-gray-800">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Tim <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary">Profesional</span>
            </h2>
            <p class="text-xl text-white/80 max-w-3xl mx-auto">
                Bertemu dengan tim ahli kami yang siap memberikan pelayanan terbaik untuk kendaraan Anda
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach($selected_workshop['team'] as $index => $member): ?>
            <div class="group bg-white/10 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-white/20" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <!-- Member Photo -->
                <div class="relative h-64 bg-gradient-to-br from-primary/20 to-primary/20 overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-24 h-24 bg-gradient-to-br from-primary to-primary rounded-full flex items-center justify-center text-black text-3xl font-bold group-hover:scale-110 transition-transform duration-300">
                            <?= substr($member['name'], 0, 1) ?>
                        </div>
                    </div>
                    <!-- Position Badge -->
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full">
                        <span class="text-sm font-semibold text-gray-700"><?= $member['position'] ?></span>
                    </div>
                </div>

                <!-- Member Info -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2"><?= $member['name'] ?></h3>
                    <p class="text-primary font-semibold mb-3"><?= $member['position'] ?></p>
                    
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-white/80">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm">Pengalaman: <?= $member['experience'] ?></span>
                        </div>
                        <div class="flex items-center text-white/80">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-sm">Spesialisasi: <?= $member['specialization'] ?></span>
                        </div>
                    </div>

                    <!-- Skills/Expertise -->
                    <div class="bg-white/10 rounded-xl p-3">
                        <div class="text-xs text-white/60 mb-1">Keahlian Utama</div>
                        <div class="text-sm font-semibold text-white"><?= $member['specialization'] ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services & Facilities Section -->
<section class="py-20 bg-gradient-to-br from-gray-900 via-black to-gray-800">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Services -->
            <div data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">
                    Layanan <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary">Unggulan</span>
                </h2>
                <div class="space-y-4">
                    <?php foreach($selected_workshop['services'] as $index => $service): ?>
                    <div class="flex items-center p-4 bg-white/10 backdrop-blur-sm rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-white/20">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-primary rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white"><?= $service ?></h3>
                            <p class="text-sm text-white/80">Pelayanan profesional dengan standar kualitas tinggi</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Facilities -->
            <div data-aos="fade-left">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">
                    Fasilitas <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary">Modern</span>
                </h2>
                <div class="space-y-4">
                    <?php foreach($selected_workshop['facilities'] as $index => $facility): ?>
                    <div class="flex items-center p-4 bg-white/10 backdrop-blur-sm rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-white/20">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-primary rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 4a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white"><?= $facility ?></h3>
                            <p class="text-sm text-white/80">Fasilitas modern untuk kenyamanan pelanggan</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-primary to-primary">
    <div class="container mx-auto px-6 text-center text-black" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Melayani Kendaraan Anda</h2>
        <p class="text-xl mb-8 opacity-90">Hubungi kami sekarang untuk reservasi atau konsultasi gratis</p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:<?= $selected_workshop['phone'] ?>" class="bg-black text-primary px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-800 transition-colors inline-flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                </svg>
                Hubungi Sekarang
            </a>
            <a href="https://maps.google.com/?q=<?= urlencode($selected_workshop['address']) ?>" target="_blank" class="bg-transparent border-2 border-black text-black px-8 py-4 rounded-full font-bold text-lg hover:bg-black hover:text-primary transition-colors inline-flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                Lihat di Maps
            </a>
        </div>
    </div>
</section>

<!-- Other Workshops -->
<section class="py-20 bg-gradient-to-br from-gray-900 via-black to-gray-800">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Cabang Workshop Lainnya</h2>
            <p class="text-xl text-white/80">Kunjungi cabang terdekat lainnya untuk pelayanan yang sama baiknya</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php 
            $other_workshops = array_filter($workshops, function($workshop) use ($selected_workshop) {
                return $workshop['slug'] !== $selected_workshop['slug'];
            });
            foreach(array_slice($other_workshops, 0, 3) as $index => $workshop): 
            ?>
            <div class="group bg-white/10 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-white/20" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="h-48 bg-gradient-to-br from-primary/20 to-primary/20 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2"><?= $workshop['name'] ?></h3>
                    <p class="text-white/80 text-sm mb-4"><?= $workshop['address'] ?></p>
                    <a href="<?= base_url('workshop/' . $workshop['slug']) ?>" class="inline-flex items-center text-primary font-semibold hover:text-primary/80 transition-colors">
                         Lihat Detail
                         <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                             <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                         </svg>
                     </a>
                 </div>
             </div>
             <?php endforeach; ?>
         </div>
     </div>
 </section>