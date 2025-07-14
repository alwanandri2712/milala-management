

<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-gray-900 via-black to-gray-800 pt-20 md:pt-0">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 rounded-full blur-xl animate-pulse opacity-10" style="background-color: #FCFB0B;"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 rounded-full blur-xl animate-pulse delay-1000 opacity-10" style="background-color: #FCFB0B;"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-orange-400 rounded-full blur-xl animate-pulse delay-500 opacity-10"></div>
    </div>

    <!-- Floating Particles -->
    <div class="absolute inset-0">
        <div class="particle absolute w-2 h-2 bg-white rounded-full opacity-60 animate-float" style="top: 20%; left: 10%; animation-delay: 0s;"></div>
        <div class="particle absolute w-3 h-3 bg-yellow-300 rounded-full opacity-40 animate-float" style="top: 60%; left: 80%; animation-delay: 2s;"></div>
        <div class="particle absolute w-1 h-1 bg-yellow-300 rounded-full opacity-70 animate-float" style="top: 40%; left: 70%; animation-delay: 1s;"></div>
        <div class="particle absolute w-2 h-2 bg-pink-300 rounded-full opacity-50 animate-float" style="top: 80%; left: 20%; animation-delay: 3s;"></div>
        <div class="particle absolute w-1 h-1 bg-green-300 rounded-full opacity-60 animate-float" style="top: 30%; left: 90%; animation-delay: 1.5s;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <!-- Text Content -->
            <div class="lg:w-1/2 text-center lg:text-left" data-aos="fade-right" data-aos-duration="1000">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm font-medium mb-6" data-aos="fade-down" data-aos-delay="200">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    Bengkel Terpercaya Sejak 2003
                </div>

                <h1 class="text-5xl md:text-7xl font-black mb-8 text-white leading-tight" data-aos="fade-up" data-aos-delay="400">
                    <span class="block text-gradient bg-gradient-to-r bg-clip-text text-transparent font-extrabold" style="background: linear-gradient(to right, #FCFB0B, #e6e009); -webkit-background-clip: text; background-clip: text;">
                        MILALA AUTO SERVICE
                    </span>
                    <span class="block text-2xl md:text-3xl mt-2 text-white font-semibold">
                        AHLI | PROFESIONAL | BERGARANSI
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl mb-10 text-white leading-relaxed max-w-2xl" data-aos="fade-up" data-aos-delay="600">
                    Bengkel mobil terpercaya specialis power steering dan kaki-kaki mobil. Teknisi ahli, peralatan modern, bergaransi.
                </p>
                
                <!-- Stats -->
                <div class="flex flex-wrap justify-center lg:justify-start gap-8 mb-10" data-aos="fade-up" data-aos-delay="800">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-400">10+</div>
                        <div class="text-white text-sm">Tahun Pengalaman</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-400">1000+</div>
                        <div class="text-white text-sm">Mobil Ditangani</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-400">4.9★</div>
                        <div class="text-white text-sm">Rating Pelanggan</div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start" data-aos="fade-up" data-aos-delay="1000">
                    <a href="<?= base_url('reservation'); ?>" class="group px-8 py-4 rounded-full font-bold text-lg hover:scale-105 hover:shadow-2xl transition-all duration-300 inline-flex items-center justify-center text-black" style="background: linear-gradient(to right, #FCFB0B, #e6e009);" onmouseover="this.style.background='linear-gradient(to right, #e6e009, #FCFB0B)'" onmouseout="this.style.background='linear-gradient(to right, #FCFB0B, #e6e009)'">
                        <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Lihat Semua Layanan
                    </a>
                    <a href="tel:+6287777999366" class="group border-2 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 inline-flex items-center justify-center backdrop-blur-sm" style="border-color: #FCFB0B; color: #FCFB0B;" onmouseover="this.style.background='linear-gradient(to right, #FCFB0B, #e6e009)'; this.style.color='black'" onmouseout="this.style.background='transparent'; this.style.color='#FCFB0B'">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Buat Janji Temu
                    </a>
                </div>
            </div>

            <!-- Service Showcase - Minimalist Design -->
            <div class="lg:w-1/2 relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 shadow-lg">
                    <div class="mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-3 h-3 bg-yellow-400 rounded-full mr-3"></div>
                            <h3 class="text-2xl font-semibold text-white">Layanan Kami</h3>
                        </div>
                        <p class="text-white/70 text-sm">Pilih layanan yang Anda butuhkan</p>
                    </div>
                    
                    <!-- Service List -->
                    <div class="space-y-3">
                        <!-- Service Item 1 -->
                        <div class="service-item bg-white/8 rounded-lg p-4 border border-white/10 hover:bg-white/12 transition-all duration-300 cursor-pointer" data-service="power">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-yellow-400/20 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-medium">Power Steering</h4>
                                        <p class="text-white/60 text-sm">Sistem kemudi responsif</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-white font-semibold">Rp 750K+</div>
                                    <div class="text-yellow-400 text-xs">Populer</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Service Item 2 -->
                        <div class="service-item bg-white/8 rounded-lg p-4 border border-white/10 hover:bg-white/12 transition-all duration-300 cursor-pointer" data-service="suspension">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-purple-400/20 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-medium">Kaki-kaki Mobil</h4>
                                        <p class="text-white/60 text-sm">Suspensi & komponen</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-white font-semibold">Rp 250K+</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Button -->
                        <div class="mt-6 text-center">
                            <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105">
                                Konsultasi Gratis
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Service List JavaScript -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const serviceItems = document.querySelectorAll('.service-item');
                    
                    // Add click handlers for service items
                    serviceItems.forEach(item => {
                        item.addEventListener('click', function() {
                            // Remove active state from all items
                            serviceItems.forEach(i => i.classList.remove('bg-white/15'));
                            
                            // Add active state to clicked item
                            this.classList.add('bg-white/15');
                            
                            // Get service type
                            const serviceType = this.dataset.service;
                            console.log('Selected service:', serviceType);
                        });
                    });
                });
            </script>
        </div>
    </div>

</section>

<!-- Keunggulan Section -->
<section id="keunggulan" class="py-24 bg-gradient-to-br from-gray-900 via-black to-gray-800 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 right-10 w-32 h-32 rounded-full blur-xl animate-pulse opacity-1" style="background-color: #FCFB0B;"></div>
        <div class="absolute bottom-20 left-10 w-40 h-40 rounded-full blur-xl animate-pulse delay-1000 opacity-1" style="background-color: #FCFB0B;"></div>
        <div class="absolute top-1/2 right-1/3 w-24 h-24 bg-orange-400 rounded-full blur-xl animate-pulse delay-500 opacity-1"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-black text-white mb-6">
                Mengapa Memilih <span style="color: #FCFB0B;">MILALA AUTO SERVICE</span>?
            </h2>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Mengapa banyak pelanggan mempercayakan perawatan dan perbaikan mobil mereka kepada kami? Berikut keunggulan utama bengkel kami:
            </p>
        </div>
        <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-12" data-aos="fade-up">
            <!-- Keunggulan 1: SDM Yang Berkompeten -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl border-2 flex flex-col items-center text-center hover:shadow-2xl transition-all group border-gray-700/50">
                <div class="w-20 h-20 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                    <!-- Expert Technician Icon -->
                    <svg class="w-12 h-12 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V6.5L21 8.5V9ZM3 9V7L9 5.5V6.5L3 8.5V9ZM15 9.5V8L21 9.5V11L15 9.5ZM9 9.5V8L3 9.5V11L9 9.5ZM12 7.5C13.66 7.5 15 8.84 15 10.5V11.5C15 12.33 14.33 13 13.5 13H10.5C9.67 13 9 12.33 9 11.5V10.5C9 8.84 10.34 7.5 12 7.5ZM12 15C14.67 15 19 16.33 19 19V21H5V19C5 16.33 9.33 15 12 15Z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-white">SDM YANG BERKOMPETEN</h3>
                <p class="text-white leading-relaxed">Teknisi sudah menguasai kompetensi-kompetensi yang dibutuhkan sehingga dapat bekerja rapi, tepat, dan cepat serta menjadi quality control dan analisator dalam setiap pengerjaan agar proses pengerjaan optimal dan tidak ada human error.</p>
            </div>
            <!-- Keunggulan 2: Sperpart Yang Berkualitas Baik -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl border-2 flex flex-col items-center text-center hover:shadow-2xl transition-all group border-gray-700/50">
                <div class="w-20 h-20 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                    <!-- Original Parts Icon -->
                    <svg class="w-12 h-12 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.6 14.8,10V11.5C14.8,12.3 14.1,13 13.3,13H10.7C9.9,13 9.2,12.3 9.2,11.5V10C9.2,8.6 10.6,7 12,7M12,8.2C11.2,8.2 10.4,8.7 10.4,10V11.8H13.6V10C13.6,8.7 12.8,8.2 12,8.2Z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-white">SPAREPART YANG BERKUALITAS BAIK</h3>
                <h4 class="text-lg font-bold mb-2 text-white">[GARANSI HINGGA 2 TAHUN]</h4>
                <p class="text-white leading-relaxed">Sparepart yang ditawarkan berupa original, aftermarket, dan bekas (second) dengan garansi hingga 2 tahun sehingga memberikan banyak pilihan bagi pelanggan.</p>
            </div>
            <!-- Keunggulan 3: Harga Yang Kompetitif -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl border-2 flex flex-col items-center text-center hover:shadow-2xl transition-all group border-gray-700/50">
                <div class="w-20 h-20 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                    <!-- Price Icon -->
                    <svg class="w-12 h-12 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-white">HARGA YANG KOMPETITIF</h3>
                <p class="text-white leading-relaxed">Harga sparepart dan jasa bengkel yang kompetitif, tidak asal murah namun tetap mengutamakan kualitas sehingga pelanggan dapat menghemat biaya.</p>
            </div>
        </div>
    </div>
</section>

<!-- SOP Section -->
<section id="sop" class="py-24 bg-gradient-to-br from-gray-900 via-black to-gray-800 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-20 w-32 h-32 rounded-full blur-xl animate-pulse opacity-1" style="background-color: #FCFB0B;"></div>
        <div class="absolute bottom-20 right-20 w-40 h-40 rounded-full blur-xl animate-pulse delay-1000 opacity-1" style="background-color: #FCFB0B;"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-orange-400 rounded-full blur-xl animate-pulse delay-500 opacity-1"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-6" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,16.5L6.5,12L7.91,10.59L11,13.67L16.59,8.09L18,9.5L11,16.5Z"/>
                </svg>
            </div>
            <h2 class="text-4xl font-black text-white mb-6">
                8 Langkah Super! <span style="color: #FCFB0B;">SOP Milala Auto Service</span>
            </h2>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Standar Operasional Prosedur yang memastikan kualitas layanan terbaik untuk setiap kendaraan Anda
            </p>
        </div>

        <!-- SOP Steps Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto">
            <!-- Step 1 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50" data-aos="fade-up" data-aos-delay="50">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full mb-4 flex items-center justify-center text-white font-black text-2xl group-hover:scale-110 transition-transform">
                        1
                    </div>
                    <div class="w-12 h-12 mb-4">
                        <svg class="w-full h-full text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2A3,3 0 0,1 15,5V7H9V5A3,3 0 0,1 12,2M19,8V20A2,2 0 0,1 17,22H7A2,2 0 0,1 5,20V8A2,2 0 0,1 7,6H9V7H15V6H17A2,2 0 0,1 19,8M12,17A2,2 0 0,0 14,15A2,2 0 0,0 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17Z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Registrasi Pelanggan</h4>
                    <p class="text-sm text-white/80">Data lengkap kendaraan dan keluhan</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50" data-aos="fade-up" data-aos-delay="100">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full mb-4 flex items-center justify-center text-white font-black text-2xl group-hover:scale-110 transition-transform">
                        2
                    </div>
                    <div class="w-12 h-12 mb-4">
                        <svg class="w-full h-full text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8Z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Test Drive dan Analisis Masalah</h4>
                    <p class="text-sm text-white/80">Identifikasi masalah secara detail</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50" data-aos="fade-up" data-aos-delay="150">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full mb-4 flex items-center justify-center text-white font-black text-2xl group-hover:scale-110 transition-transform">
                        3
                    </div>
                    <div class="w-12 h-12 mb-4">
                        <svg class="w-full h-full text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,7V13H13V7H11M11,15V17H13V15H11Z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">General Check Up</h4>
                    <p class="text-sm text-white/80">Transparansi dan edukasi lengkap</p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50" data-aos="fade-up" data-aos-delay="200">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full mb-4 flex items-center justify-center text-white font-black text-2xl group-hover:scale-110 transition-transform">
                        4
                    </div>
                    <div class="w-12 h-12 mb-4">
                        <svg class="w-full h-full text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M19,5V19H5V5H19M16.5,16L13.5,12.5L11.5,15L9.5,13L7.5,16H16.5Z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Estimasi Perbaikan</h4>
                    <p class="text-sm text-white/80">Kalkulasi biaya yang transparan</p>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50" data-aos="fade-up" data-aos-delay="250">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full mb-4 flex items-center justify-center text-white font-black text-2xl group-hover:scale-110 transition-transform">
                        5
                    </div>
                    <div class="w-12 h-12 mb-4">
                        <svg class="w-full h-full text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6Z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Proses Perbaikan</h4>
                    <p class="text-sm text-white/80">Pengerjaan oleh teknisi ahli</p>
                </div>
            </div>

            <!-- Step 6 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50" data-aos="fade-up" data-aos-delay="300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full mb-4 flex items-center justify-center text-white font-black text-2xl group-hover:scale-110 transition-transform">
                        6
                    </div>
                    <div class="w-12 h-12 mb-4">
                        <svg class="w-full h-full text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Finishing dan Test Drive Akhir</h4>
                    <p class="text-sm text-white/80">Quality control menyeluruh</p>
                </div>
            </div>

            <!-- Step 7 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50" data-aos="fade-up" data-aos-delay="350">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full mb-4 flex items-center justify-center text-white font-black text-2xl group-hover:scale-110 transition-transform">
                        7
                    </div>
                    <div class="w-12 h-12 mb-4">
                        <svg class="w-full h-full text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,16.5L6.5,12L7.91,10.59L11,13.67L16.59,8.09L18,9.5L11,16.5Z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Pembayaran</h4>
                    <p class="text-sm text-white/80">Proses pembayaran yang mudah</p>
                </div>
            </div>

            <!-- Step 8 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50" data-aos="fade-up" data-aos-delay="400">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full mb-4 flex items-center justify-center text-white font-black text-2xl group-hover:scale-110 transition-transform">
                        8
                    </div>
                    <div class="w-12 h-12 mb-4">
                        <svg class="w-full h-full text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M19,5V19H5V5H19M17,17H7V15H17V17M17,13H7V11H17V13M17,9H7V7H17V9Z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Pengiriman Hasil</h4>
                    <p class="text-sm text-white/80">General check up dan dokumentasi</p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-16" data-aos="fade-up">
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl max-w-2xl mx-auto border border-gray-700/50">
                <h3 class="text-2xl font-bold text-white mb-4">Rasakan Pengalaman Layanan Terbaik!</h3>
                <p class="text-white/80 mb-6">Dengan 8 langkah SOP yang terstandarisasi, kami memastikan kendaraan Anda mendapat penanganan terbaik</p>
                <a href="#contact" class="inline-flex items-center px-8 py-4 rounded-full font-bold transition-colors" style="background: linear-gradient(to right, #FCFB0B, #e6e009); color: black; hover:opacity-90;">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    Hubungi Kami Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-24 bg-gradient-to-br from-gray-900 via-black to-gray-800 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-20 w-32 h-32 rounded-full blur-xl animate-pulse opacity-1" style="background-color: #FCFB0B;"></div>
        <div class="absolute bottom-20 right-20 w-40 h-40 rounded-full blur-xl animate-pulse delay-1000 opacity-1" style="background-color: #FCFB0B;"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-orange-400 rounded-full blur-xl animate-pulse delay-500 opacity-1"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-6" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                </svg>
            </div>
            <h2 class="text-4xl font-black text-white mb-6">
                Testimoni Pelanggan
            </h2>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Pengalaman pelanggan yang telah mempercayakan perbaikan power steering dan kaki-kaki mobil mereka pada kami
            </p>
        </div>

        <!-- Testimonial Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group relative overflow-hidden border border-gray-700/50" data-aos="fade-up" data-aos-delay="50">
                <!-- Quote Icon -->
                <div class="absolute top-4 right-4 w-12 h-12 rounded-full flex items-center justify-center opacity-20 group-hover:opacity-30 transition-opacity" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z"/>
                    </svg>
                </div>
                
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4 ring-4" style="ring-color: #FCFB0B;">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Ahmad Rizky" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-white">Ahmad Rizky</h4>
                        <p class="text-gray-300 text-sm">Pemilik Toyota Fortuner</p>
                        <div class="flex items-center mt-1">
                            <span class="text-xs text-gray-400 mr-2">Verified Customer</span>
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4 flex items-center">
                    <div class="flex mr-2">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-300">5.0</span>
                </div>
                
                <p class="text-white/80 leading-relaxed italic">"Pelayanan sangat profesional, mekanik berpengalaman dalam menangani masalah power steering. Mobil saya yang tadinya berat saat dibelokkan sekarang jadi ringan dan responsif setelah diperbaiki di sini."</p>
                
                <div class="mt-6 pt-6 border-t border-gray-600/50">
                    <div class="flex items-center justify-between">
                        <p class="font-bold text-sm" style="color: #FCFB0B;">Perbaikan Power Steering</p>
                        <span class="text-xs text-gray-400">2 minggu lalu</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group relative overflow-hidden border border-gray-700/50" data-aos="fade-up" data-aos-delay="150">
                <!-- Quote Icon -->
                <div class="absolute top-4 right-4 w-12 h-12 rounded-full flex items-center justify-center opacity-20 group-hover:opacity-30 transition-opacity" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z"/>
                    </svg>
                </div>
                
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4 ring-4" style="ring-color: #FCFB0B;">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Siti Nurhaliza" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-white">Siti Nurhaliza</h4>
                        <p class="text-gray-300 text-sm">Pemilik Honda HR-V</p>
                        <div class="flex items-center mt-1">
                            <span class="text-xs text-gray-400 mr-2">Verified Customer</span>
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4 flex items-center">
                    <div class="flex mr-2">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-300">5.0</span>
                </div>
                
                <p class="text-white/80 leading-relaxed italic">"Sebagai wanita, saya sering khawatir dibohongi bengkel. Di Milala Auto Service, mereka menjelaskan semua masalah kaki-kaki mobil saya dengan detail dan transparan. Sekarang mobil saya tidak berbunyi lagi saat melewati jalan berlubang!"</p>
                
                <div class="mt-6 pt-6 border-t border-gray-600/50">
                    <div class="flex items-center justify-between">
                        <p class="font-bold text-sm" style="color: #FCFB0B;">Penggantian Kaki-Kaki</p>
                        <span class="text-xs text-gray-400">1 bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group relative overflow-hidden border border-gray-700/50" data-aos="fade-up" data-aos-delay="250">
                <!-- Quote Icon -->
                <div class="absolute top-4 right-4 w-12 h-12 rounded-full flex items-center justify-center opacity-20 group-hover:opacity-30 transition-opacity" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z"/>
                    </svg>
                </div>
                
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4 ring-4" style="ring-color: #FCFB0B;">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Budi Santoso" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-white">Budi Santoso</h4>
                        <p class="text-gray-300 text-sm">Pemilik Mitsubishi Pajero</p>
                        <div class="flex items-center mt-1">
                            <span class="text-xs text-gray-400 mr-2">Verified Customer</span>
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4 flex items-center">
                    <div class="flex mr-2">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-300">4.0</span>
                </div>
                
                <p class="text-white/80 leading-relaxed italic">"Mobil saya bermasalah saat di jalan, kemudi bergetar dan sulit dikendalikan. Tim Milala Auto Service melakukan spooring dan balancing dengan cepat. Hasilnya, mobil saya kembali stabil dan nyaman dikendarai. Sangat terkesan!"</p>
                
                <div class="mt-6 pt-6 border-t border-gray-600/50">
                    <div class="flex items-center justify-between">
                        <p class="font-bold text-sm" style="color: #FCFB0B;">Spooring & Balancing</p>
                        <span class="text-xs text-gray-400">3 minggu lalu</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Counter -->
        <div class="rounded-3xl p-12 mt-24" style="background: linear-gradient(to right, #FCFB0B, #e6e009);" data-aos="fade-up">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="w-16 h-16 bg-black/20 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-black text-black mb-2 group-hover:scale-105 transition-transform">5000+</div>
                    <p class="text-black/90 font-semibold">Pelanggan Puas</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-black/20 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-black text-black mb-2 group-hover:scale-105 transition-transform">15+</div>
                    <p class="text-black/90 font-semibold">Tahun Pengalaman</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-black/20 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16,4C16.88,4 17.67,4.5 18,5.26L19,7H20A2,2 0 0,1 22,9V10A1,1 0 0,1 21,11H20V19A2,2 0 0,1 18,21H6A2,2 0 0,1 4,19V11H3A1,1 0 0,1 2,10V9A2,2 0 0,1 4,7H5L6,5.26C6.33,4.5 7.12,4 8,4H16M8.5,11A1.5,1.5 0 0,0 7,12.5A1.5,1.5 0 0,0 8.5,14A1.5,1.5 0 0,0 10,12.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 14,12.5A1.5,1.5 0 0,0 15.5,14A1.5,1.5 0 0,0 17,12.5A1.5,1.5 0 0,0 15.5,11Z"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-black text-black mb-2 group-hover:scale-105 transition-transform">30+</div>
                    <p class="text-black/90 font-semibold">Mekanik Ahli</p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- gmap section -->
<section id="contact" class="py-24 bg-gradient-to-br from-gray-900 via-black to-gray-800 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-16 left-16 w-32 h-32 rounded-full blur-xl animate-pulse opacity-1" style="background-color: #FCFB0B;"></div>
        <div class="absolute bottom-16 right-16 w-40 h-40 rounded-full blur-xl animate-pulse delay-1000 opacity-1" style="background-color: #FCFB0B;"></div>
        <div class="absolute top-1/3 right-1/3 w-24 h-24 bg-orange-400 rounded-full blur-xl animate-pulse delay-500 opacity-1"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-black text-white mb-6">
                Lokasi Cabang <span style="color: #FCFB0B;">Kami</span>
            </h2>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
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
        <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-4 gap-8" data-aos="fade-up">
            <!-- Cabang Ampera -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50">
                <div class="flex items-start mb-6">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                        <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19S6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2 text-white">Milala Ampera</h3>
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-gray-300 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22S19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                            <p class="text-white/80 text-sm">Jl. Madrasah Raya No. 3A, Ampera, Jakarta Selatan</p>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-gray-300 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                            </svg>
                            <p class="text-white/80 text-sm">Telp: (021) 123-4567</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-600/50">
                    <a href="https://maps.google.com/maps?q=Jl.+Madrasah+Raya+No.3A,+Ampera,+Jakarta+Selatan" target="_blank" style="color: #FCFB0B;" class="font-bold transition-colors flex items-center" onmouseover="this.style.color='#e6e009'" onmouseout="this.style.color='#FCFB0B'">
                        <span>Lihat di Maps</span>
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                        </svg>
                    </a>
                    <div class="flex items-center bg-yellow-50 px-3 py-1 rounded-full">
                        <span class="text-yellow-600 font-bold mr-1">4.8</span>
                        <div class="flex">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cabang Bekasi -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50">
                <div class="flex items-start mb-6">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                        <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19S6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2 text-white">Milala Bekasi</h3>
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-gray-300 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22S19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                            <p class="text-white/80 text-sm">Jl. RA Kartini No. 9, Margahayu, Bekasi Timur</p>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-gray-300 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                            </svg>
                            <p class="text-white/80 text-sm">Telp: (021) 890-1234</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-600/50">
                    <a href="https://maps.google.com/maps?q=Jl.+RA+Kartini+No.9,+Margahayu,+Bekasi+Timur" target="_blank" style="color: #FCFB0B;" class="font-bold transition-colors flex items-center" onmouseover="this.style.color='#e6e009'" onmouseout="this.style.color='#FCFB0B'">
                        <span>Lihat di Maps</span>
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                        </svg>
                    </a>
                    <div class="flex items-center bg-yellow-50 px-3 py-1 rounded-full">
                        <span class="text-yellow-600 font-bold mr-1">4.8</span>
                        <div class="flex">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cabang Antasari -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50">
                <div class="flex items-start mb-6">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                        <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19S6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2 text-white">Milala Antasari</h3>
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-gray-300 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22S19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                            <p class="text-white/80 text-sm">Jl. Pangeran Antasari No. 89, Jakarta Selatan</p>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-gray-300 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                            </svg>
                            <p class="text-white/80 text-sm">Telp: (021) 567-8901</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-600/50">
                    <a href="https://maps.google.com/maps?q=Jl.+Pangeran+Antasari+No.89,+Jakarta+Selatan" target="_blank" style="color: #FCFB0B;" class="font-bold transition-colors flex items-center" onmouseover="this.style.color='#e6e009'" onmouseout="this.style.color='#FCFB0B'">
                        <span>Lihat di Maps</span>
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                        </svg>
                    </a>
                    <div class="flex items-center bg-yellow-50 px-3 py-1 rounded-full">
                        <span class="text-yellow-600 font-bold mr-1">4.9</span>
                        <div class="flex">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cabang Bogor -->
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-700/50">
                <div class="flex items-start mb-6">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(to bottom right, #FCFB0B, #e6e009);">
                        <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19S6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2 text-white">Milala Bogor</h3>
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-gray-300 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22S19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                            <p class="text-white/80 text-sm">Perumahan Good Year Blok J No. 18, Ciomas, Kabupaten Bogor</p>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-gray-300 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                            </svg>
                            <p class="text-white/80 text-sm">Telp: 0811-1167-366</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-600/50">
                    <a href="https://maps.google.com/maps?q=Perumahan+Good+Year+Blok+J+No.18,+Ciomas,+Kabupaten+Bogor" target="_blank" style="color: #FCFB0B;" class="font-bold transition-colors flex items-center" onmouseover="this.style.color='#e6e009'" onmouseout="this.style.color='#FCFB0B'">
                        <span>Lihat di Maps</span>
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                        </svg>
                    </a>
                    <div class="flex items-center bg-yellow-50 px-3 py-1 rounded-full">
                        <span class="text-yellow-600 font-bold mr-1">4.7</span>
                        <div class="flex">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>