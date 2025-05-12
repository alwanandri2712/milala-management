<!-- Hero Section -->
<section id="home" class="hero-clip bg-primary pt-28 pb-32 relative overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <!-- Text Content -->
            <div class="lg:w-1/2" data-aos="fade-right" data-aos-duration="1000">
                <h1 class="text-5xl md:text-6xl font-black mb-6 text-dark">
                    Bengkel Spesialis
                    <span class="block bg-dark text-primary px-6 py-3 mt-4 w-fit">Power Steering & Kaki-Kaki</span>
                </h1>
                <p class="text-xl mb-8 text-dark/80">
                    Milala Auto Service - Bengkel spesialis power steering dan kaki-kaki mobil dengan pengalaman lebih dari 20 tahun
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?= base_url('reservation'); ?>" class="bg-dark text-primary px-8 py-4 rounded-full font-bold hover:scale-105 transition-all inline-block">
                        Reservasi Sekarang
                    </a>
                    <a href="#services" class="border-2 border-dark text-dark px-8 py-4 rounded-full font-bold hover:bg-dark hover:text-primary transition-all inline-block">
                        Lihat Layanan
                    </a>
                </div>
            </div>

            <!-- Car Image with Tools Animation -->
            <div class="lg:w-1/2 relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <!-- Car SVG -->
                <svg class="w-full max-w-xl mx-auto" viewBox="0 0 512 512" fill="#000000">
                    <path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/>
                </svg>

                <!-- Animated Tools -->
                <div class="absolute top-10 -left-8 float-animation" style="animation-delay: 0.2s">
                    <svg class="w-16 h-16" viewBox="0 0 512 512" fill="#000000">
                        <path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/>
                    </svg>
                </div>

                <div class="absolute bottom-10 -right-8 float-animation" style="animation-delay: 0.5s">
                    <svg class="w-16 h-16" viewBox="0 0 512 512" fill="#000000">
                        <path d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-24.3-5.3l-76.8 76.8c-3 3-7.1 4.7-11.3 4.7H336c-8.8 0-16-7.2-16-16V118.6c0-4.2 1.7-8.3 4.7-11.3l76.8-76.8c7.9-7.9 5.4-21.2-5.3-24.3C382.1 2.2 367.3 0 352 0C263.6 0 192 71.6 192 160c0 19.1 3.4 37.5 9.5 54.5L19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L297.5 310.5c17 6.2 35.4 9.5 54.5 9.5zM80 456c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-dark opacity-5 rounded-full"></div>
        <div class="absolute top-1/4 right-0 w-20 h-20 bg-dark opacity-5 rounded-full"></div>
        <div class="absolute bottom-1/3 left-1/4 w-32 h-32 bg-dark opacity-5 rounded-full"></div>
        <div class="absolute bottom-0 right-1/4 w-24 h-24 bg-dark opacity-5 rounded-full"></div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-black text-dark mb-6">
                Layanan Spesialis Power Steering & Kaki-Kaki
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Teknisi berpengalaman dan peralatan modern untuk menangani semua masalah power steering dan kaki-kaki mobil Anda
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary hover:shadow-2xl transition-all"
                 data-aos="fade-up"
                 data-aos-delay="50">
                <div class="w-20 h-20 bg-primary rounded-2xl mb-6 flex items-center justify-center">
                    <svg class="w-12 h-12 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Perbaikan Power Steering</h3>
                <p class="text-gray-600">Perbaikan semua jenis power steering, termasuk power steering hidrolik, elektrik, dan hybrid dengan garansi 6 bulan</p>
                <a href="#" class="inline-block mt-4 text-primary font-bold hover:text-dark transition-colors">Selengkapnya →</a>
            </div>

            <!-- Service 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary hover:shadow-2xl transition-all"
                 data-aos="fade-up"
                 data-aos-delay="150">
                <div class="w-20 h-20 bg-primary rounded-2xl mb-6 flex items-center justify-center">
                    <svg class="w-12 h-12 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Penggantian Kaki-Kaki</h3>
                <p class="text-gray-600">Penggantian komponen kaki-kaki seperti ball joint, tie rod, shock absorber, dan bushing dengan sparepart berkualitas</p>
                <a href="#" class="inline-block mt-4 text-primary font-bold hover:text-dark transition-colors">Selengkapnya →</a>
            </div>

            <!-- Service 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary hover:shadow-2xl transition-all"
                 data-aos="fade-up"
                 data-aos-delay="250">
                <div class="w-20 h-20 bg-primary rounded-2xl mb-6 flex items-center justify-center">
                    <svg class="w-12 h-12 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Spooring & Balancing</h3>
                <p class="text-gray-600">Layanan spooring dan balancing dengan teknologi komputer untuk memastikan kenyamanan dan keamanan berkendara</p>
                <a href="#" class="inline-block mt-4 text-primary font-bold hover:text-dark transition-colors">Selengkapnya →</a>
            </div>

    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-black text-dark mb-6">
                Galeri Bengkel Spesialis Power Steering
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Lihat fasilitas dan hasil kerja terbaik dari bengkel spesialis power steering dan kaki-kaki terpercaya
            </p>
        </div>

        <!-- Gallery Filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up">
            <button class="px-6 py-2 rounded-full bg-primary text-dark font-bold">
                Semua
            </button>
            <button class="px-6 py-2 rounded-full bg-white text-dark font-bold hover:bg-primary transition-colors">
                Power Steering
            </button>
            <button class="px-6 py-2 rounded-full bg-white text-dark font-bold hover:bg-primary transition-colors">
                Kaki-Kaki
            </button>
            <button class="px-6 py-2 rounded-full bg-white text-dark font-bold hover:bg-primary transition-colors">
                Spooring & Balancing
            </button>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Gallery Item 1 -->
            <div class="group relative overflow-hidden rounded-2xl" data-aos="zoom-in" data-aos-delay="50">
                <img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                     alt="Bengkel Mobil"
                     class="w-full h-72 object-cover transition-all duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                    <div class="p-6">
                        <h3 class="text-white text-xl font-bold">Bengkel Power Steering</h3>
                        <p class="text-white/80">Peralatan khusus power steering</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 2 -->
            <div class="group relative overflow-hidden rounded-2xl" data-aos="zoom-in" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1625047509248-ec889cbff17f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                     alt="Bengkel Mobil"
                     class="w-full h-72 object-cover transition-all duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                    <div class="p-6">
                        <h3 class="text-white text-xl font-bold">Perbaikan Power Steering</h3>
                        <p class="text-white/80">Proses perbaikan oleh ahli</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 3 -->
            <div class="group relative overflow-hidden rounded-2xl" data-aos="zoom-in" data-aos-delay="150">
                <img src="https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                     alt="Bengkel Mobil"
                     class="w-full h-72 object-cover transition-all duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                    <div class="p-6">
                        <h3 class="text-white text-xl font-bold">Tim Profesional</h3>
                        <p class="text-white/80">Mekanik bersertifikat</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 4 -->
            <div class="group relative overflow-hidden rounded-2xl" data-aos="zoom-in" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1599256872237-5dcc0fbe9668?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                     alt="Bengkel Mobil"
                     class="w-full h-72 object-cover transition-all duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                    <div class="p-6">
                        <h3 class="text-white text-xl font-bold">Penggantian Kaki-Kaki</h3>
                        <p class="text-white/80">Sparepart berkualitas tinggi</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 5 -->
            <div class="group relative overflow-hidden rounded-2xl" data-aos="zoom-in" data-aos-delay="250">
                <img src="https://images.unsplash.com/photo-1617886322168-72b886573c5a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                     alt="Bengkel Mobil"
                     class="w-full h-72 object-cover transition-all duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                    <div class="p-6">
                        <h3 class="text-white text-xl font-bold">Spooring & Balancing</h3>
                        <p class="text-white/80">Teknologi komputer terkini</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 6 -->
            <div class="group relative overflow-hidden rounded-2xl" data-aos="zoom-in" data-aos-delay="300">
                <img src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                     alt="Bengkel Mobil"
                     class="w-full h-72 object-cover transition-all duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                    <div class="p-6">
                        <h3 class="text-white text-xl font-bold">Pemeriksaan Kaki-Kaki</h3>
                        <p class="text-white/80">Diagnosa akurat dan cepat</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery CTA -->
        <div class="mt-16 text-center" data-aos="fade-up">
            <a href="#" class="inline-block bg-dark text-primary px-10 py-4 rounded-full font-bold hover:bg-primary hover:text-dark transition-colors">
                Lihat Semua Galeri
            </a>
        </div>
    </div>
</section>
<!-- Testimonials Section -->
<section id="testimonials" class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-black text-dark mb-6">
                Testimoni Pelanggan
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Pengalaman pelanggan yang telah mempercayakan perbaikan power steering dan kaki-kaki mobil mereka pada kami
            </p>
        </div>

        <!-- Testimonial Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all" data-aos="fade-up" data-aos-delay="50">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold">Ahmad Rizky</h4>
                        <p class="text-gray-500">Pemilik Toyota Fortuner</p>
                    </div>
                </div>
                <div class="mb-4 flex">
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <p class="text-gray-600">"Pelayanan sangat profesional, mekanik berpengalaman dalam menangani masalah power steering. Mobil saya yang tadinya berat saat dibelokkan sekarang jadi ringan dan responsif setelah diperbaiki di sini."</p>
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <p class="text-primary font-bold">Perbaikan Power Steering</p>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all" data-aos="fade-up" data-aos-delay="150">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Customer" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold">Siti Nurhaliza</h4>
                        <p class="text-gray-500">Pemilik Honda HR-V</p>
                    </div>
                </div>
                <div class="mb-4 flex">
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <p class="text-gray-600">"Sebagai wanita, saya sering khawatir dibohongi bengkel. Di Milala Auto Service, mereka menjelaskan semua masalah kaki-kaki mobil saya dengan detail dan transparan. Sekarang mobil saya tidak berbunyi lagi saat melewati jalan berlubang!"</p>
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <p class="text-primary font-bold">Penggantian Kaki-Kaki</p>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all" data-aos="fade-up" data-aos-delay="250">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Customer" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold">Budi Santoso</h4>
                        <p class="text-gray-500">Pemilik Mitsubishi Pajero</p>
                    </div>
                </div>
                <div class="mb-4 flex">
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <p class="text-gray-600">"Mobil saya bermasalah saat di jalan, kemudi bergetar dan sulit dikendalikan. Tim Milala Auto Service melakukan spooring dan balancing dengan cepat. Hasilnya, mobil saya kembali stabil dan nyaman dikendarai. Sangat terkesan!"</p>
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <p class="text-primary font-bold">Spooring & Balancing</p>
                </div>
            </div>
        </div>

        <!-- Stats Counter -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-24" data-aos="fade-up">
            <div class="text-center">
                <div class="text-5xl font-black text-primary mb-2">5000+</div>
                <p class="text-gray-600">Pelanggan Puas</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-black text-primary mb-2">15+</div>
                <p class="text-gray-600">Tahun Pengalaman</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-black text-primary mb-2">30+</div>
                <p class="text-gray-600">Mekanik Ahli</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-black text-primary mb-2">24/7</div>
                <p class="text-gray-600">Layanan Darurat</p>
            </div>
        </div>
    </div>
</section>
<!-- gmap section -->
<section id="contact" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-black text-dark mb-6">
                Lokasi Cabang Kami
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Milala Auto Service memiliki 4 cabang strategis untuk melayani kebutuhan power steering dan kaki-kaki mobil Anda
            </p>
        </div>

        <!-- Google Map -->
        <div class="mt-8 rounded-2xl overflow-hidden shadow-xl" data-aos="zoom-in">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d253833.7705229376!2d106.68442755566404!3d-6.266138499999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sMilala%20Auto%20Service%20Bengkel%20Spesialis%20Power%20Steering!5e0!3m2!1sid!2sid!4v1715599847913!5m2!1sid!2sid"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <!-- Cabang Lokasi -->
        <div class="mt-12 grid md:grid-cols-2 gap-8" data-aos="fade-up">
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-xl font-bold mb-4">Cabang Ampera</h3>
                <p class="text-gray-600 mb-2">Kotamadya Jakarta Selatan, Daerah Khusus Ibukota Jakarta</p>
                <p class="text-gray-600 mb-4">Sudah beroperasi selama 15+ tahun</p>
                <div class="flex justify-between items-center">
                    <a href="https://maps.app.goo.gl/ampera" target="_blank" class="text-primary font-bold hover:text-dark transition-colors">Lihat di Google Maps →</a>
                    <div class="flex items-center">
                        <span class="text-yellow-500 font-bold mr-1">4.8</span>
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-xl font-bold mb-4">Cabang Bekasi</h3>
                <p class="text-gray-600 mb-2">Kota Bks, Jawa Barat</p>
                <p class="text-gray-600 mb-4">Telp: 0817-422-768</p>
                <div class="flex justify-between items-center">
                    <a href="https://maps.app.goo.gl/bekasi" target="_blank" class="text-primary font-bold hover:text-dark transition-colors">Lihat di Google Maps →</a>
                    <div class="flex items-center">
                        <span class="text-yellow-500 font-bold mr-1">4.8</span>
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-xl font-bold mb-4">Cabang Antasari</h3>
                <p class="text-gray-600 mb-2">Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta</p>
                <p class="text-gray-600 mb-4">Sudah beroperasi selama 20+ tahun</p>
                <div class="flex justify-between items-center">
                    <a href="https://maps.app.goo.gl/antasari" target="_blank" class="text-primary font-bold hover:text-dark transition-colors">Lihat di Google Maps →</a>
                    <div class="flex items-center">
                        <span class="text-yellow-500 font-bold mr-1">4.9</span>
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-xl font-bold mb-4">Cabang Bogor</h3>
                <p class="text-gray-600 mb-2">Kabupaten Bogor, Jawa Barat</p>
                <p class="text-gray-600 mb-4">Sudah beroperasi selama 7+ tahun</p>
                <div class="flex justify-between items-center">
                    <a href="https://maps.app.goo.gl/bogor" target="_blank" class="text-primary font-bold hover:text-dark transition-colors">Lihat di Google Maps →</a>
                    <div class="flex items-center">
                        <span class="text-yellow-500 font-bold mr-1">4.7</span>
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
