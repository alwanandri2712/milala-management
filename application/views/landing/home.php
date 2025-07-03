<!-- Custom CSS for animations -->
<style>
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-10px) rotate(5deg); }
    66% { transform: translateY(5px) rotate(-5deg); }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.particle {
    animation: float 8s ease-in-out infinite;
}

@media (max-width: 768px) {
    .particle {
        display: none;
    }
}
</style>

<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-yellow-400 via-orange-500 to-red-600">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full animate-pulse"></div>
        <div class="absolute top-1/4 -left-20 w-60 h-60 bg-yellow-400 opacity-20 rounded-full animate-bounce" style="animation-duration: 3s;"></div>
        <div class="absolute bottom-1/4 right-1/4 w-40 h-40 bg-pink-400 opacity-15 rounded-full animate-ping" style="animation-duration: 2s;"></div>
        <div class="absolute top-3/4 left-1/3 w-32 h-32 bg-green-400 opacity-10 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
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
                    Spesialis
                    <span class="block text-gradient bg-gradient-to-r from-white to-yellow-100 bg-clip-text text-transparent font-extrabold">
                        Power Steering
                    </span>
                    <span class="block text-4xl md:text-5xl mt-2 text-white">
                        & Kaki-Kaki Mobil
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl mb-10 text-white leading-relaxed max-w-2xl" data-aos="fade-up" data-aos-delay="600">
                    Milala Auto Service - Solusi terpercaya untuk semua masalah power steering dan kaki-kaki mobil Anda dengan teknologi modern dan garansi terbaik
                </p>
                
                <!-- Stats -->
                <div class="flex flex-wrap justify-center lg:justify-start gap-8 mb-10" data-aos="fade-up" data-aos-delay="800">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-400">20+</div>
                        <div class="text-white text-sm">Tahun Pengalaman</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-400">10K+</div>
                        <div class="text-white text-sm">Pelanggan Puas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-400">4</div>
                        <div class="text-white text-sm">Cabang</div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start" data-aos="fade-up" data-aos-delay="1000">
                    <a href="<?= base_url('reservation'); ?>" class="group bg-gradient-to-r from-yellow-400 to-orange-500 text-black px-8 py-4 rounded-full font-bold text-lg hover:scale-105 hover:shadow-2xl transition-all duration-300 inline-flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Reservasi Sekarang
                    </a>
                    <a href="#services" class="group border-2 border-white text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-orange-600 transition-all duration-300 inline-flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-5 h-5 mr-2 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Lihat Layanan
                    </a>
                </div>
            </div>

            <!-- Visual Content -->
            <div class="lg:w-1/2 relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <!-- Main Car Illustration -->
                <div class="relative bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                    <!-- Car SVG with Glow Effect -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl blur-xl opacity-30 animate-pulse"></div>
                        <!-- Steering Wheel with Hydraulic System -->
                        <div class="relative w-full max-w-lg mx-auto">
                            <!-- Main Steering Wheel -->
                            <svg class="relative w-full drop-shadow-2xl" viewBox="0 0 400 400" fill="none">
                                <defs>
                                    <linearGradient id="steeringGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#FFD32E;stop-opacity:1" />
                                        <stop offset="50%" style="stop-color:#F59E0B;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#EA580C;stop-opacity:1" />
                                    </linearGradient>
                                    <linearGradient id="hydraulicGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:0.8" />
                                        <stop offset="100%" style="stop-color:#1E40AF;stop-opacity:0.9" />
                                    </linearGradient>
                                </defs>
                                
                                <!-- Steering Wheel Outer Ring -->
                                <circle cx="200" cy="200" r="180" fill="url(#steeringGradient)" stroke="#fff" stroke-width="4"/>
                                <circle cx="200" cy="200" r="160" fill="none" stroke="#fff" stroke-width="2" opacity="0.5"/>
                                
                                <!-- Steering Wheel Spokes -->
                                <g stroke="#fff" stroke-width="8" stroke-linecap="round">
                                    <line x1="200" y1="40" x2="200" y2="120" />
                                    <line x1="200" y1="280" x2="200" y2="360" />
                                    <line x1="40" y1="200" x2="120" y2="200" />
                                    <line x1="280" y1="200" x2="360" y2="200" />
                                </g>
                                
                                <!-- Center Hub -->
                                <circle cx="200" cy="200" r="40" fill="url(#steeringGradient)" stroke="#fff" stroke-width="3"/>
                                <circle cx="200" cy="200" r="25" fill="#fff" opacity="0.9"/>
                                
                                <!-- Hydraulic Lines -->
                                <g stroke="url(#hydraulicGradient)" stroke-width="6" fill="none" opacity="0.8">
                                    <path d="M 80 120 Q 150 80 220 120" stroke-dasharray="10,5"/>
                                    <path d="M 320 120 Q 250 80 180 120" stroke-dasharray="10,5"/>
                                    <path d="M 80 280 Q 150 320 220 280" stroke-dasharray="10,5"/>
                                    <path d="M 320 280 Q 250 320 180 280" stroke-dasharray="10,5"/>
                                </g>
                                
                                <!-- Hydraulic Pump -->
                                <g transform="translate(50, 50)">
                                    <rect x="0" y="0" width="60" height="40" rx="8" fill="url(#hydraulicGradient)"/>
                                    <circle cx="30" cy="20" r="8" fill="#fff" opacity="0.9"/>
                                    <text x="30" y="55" text-anchor="middle" fill="#fff" font-size="10" font-weight="bold">PUMP</text>
                                </g>
                                
                                <!-- Hydraulic Reservoir -->
                                <g transform="translate(290, 50)">
                                    <rect x="0" y="0" width="60" height="40" rx="8" fill="url(#hydraulicGradient)"/>
                                    <rect x="10" y="10" width="40" height="20" fill="#fff" opacity="0.3"/>
                                    <text x="30" y="55" text-anchor="middle" fill="#fff" font-size="10" font-weight="bold">TANK</text>
                                </g>
                                
                                <!-- Power Steering Rack -->
                                <g transform="translate(120, 320)">
                                    <rect x="0" y="0" width="160" height="20" rx="10" fill="url(#steeringGradient)"/>
                                    <circle cx="20" cy="10" r="6" fill="#fff"/>
                                    <circle cx="140" cy="10" r="6" fill="#fff"/>
                                    <text x="80" y="35" text-anchor="middle" fill="#fff" font-size="10" font-weight="bold">STEERING RACK</text>
                                </g>
                                
                                <!-- Animated Hydraulic Flow -->
                                <g opacity="0.6">
                                    <circle cx="100" cy="100" r="3" fill="#3B82F6">
                                        <animateMotion dur="3s" repeatCount="indefinite">
                                            <path d="M 0 0 Q 50 -20 100 0 Q 150 20 200 0"/>
                                        </animateMotion>
                                    </circle>
                                    <circle cx="300" cy="100" r="3" fill="#3B82F6">
                                        <animateMotion dur="3s" repeatCount="indefinite" begin="1s">
                                            <path d="M 0 0 Q -50 -20 -100 0 Q -150 20 -200 0"/>
                                        </animateMotion>
                                    </circle>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <!-- Floating Tools with Enhanced Animation -->
                    <div class="absolute -top-6 -left-6 bg-gradient-to-br from-yellow-400 to-orange-500 p-4 rounded-2xl shadow-2xl animate-bounce" style="animation-duration: 2s; animation-delay: 0.2s">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 512 512" fill="currentColor">
                            <path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5z" />
                        </svg>
                    </div>

                    <div class="absolute -bottom-6 -right-6 bg-gradient-to-br from-green-400 to-orange-500 p-4 rounded-2xl shadow-2xl animate-bounce" style="animation-duration: 2.5s; animation-delay: 0.5s">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 512 512" fill="currentColor">
                            <path d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-24.3-5.3l-76.8 76.8c-3 3-7.1 4.7-11.3 4.7H336c-8.8 0-16-7.2-16-16V118.6c0-4.2 1.7-8.3 4.7-11.3l76.8-76.8c7.9-7.9 5.4-21.2-5.3-24.3C382.1 2.2 367.3 0 352 0C263.6 0 192 71.6 192 160c0 19.1 3.4 37.5 9.5 54.5L19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L297.5 310.5c17 6.2 35.4 9.5 54.5 9.5z" />
                        </svg>
                    </div>

                    <div class="absolute top-1/2 -right-8 bg-gradient-to-br from-pink-400 to-purple-500 p-3 rounded-xl shadow-2xl animate-pulse">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                        </svg>
                    </div>
                </div>

                <!-- Service Icons Floating Around -->
                <div class="absolute top-8 right-8 bg-white/20 backdrop-blur-sm p-3 rounded-full animate-spin" style="animation-duration: 10s;">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
        </div>
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
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary hover:shadow-2xl transition-all group"
                data-aos="fade-up"
                data-aos-delay="50">
                <div class="w-20 h-20 bg-gradient-to-br from-primary to-orange-500 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <!-- Power Steering Icon -->
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        <path d="M12 6c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z"/>
                        <circle cx="12" cy="12" r="2"/>
                    </svg>
                </div>
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-2xl font-bold">Perbaikan Power Steering</h3>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">Garansi 6 Bulan</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        <span>2-4 jam pengerjaan</span>
                        <span class="mx-2">•</span>
                        <span class="text-primary font-semibold">Mulai dari Rp 350.000</span>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Perbaikan semua jenis power steering, termasuk power steering hidrolik, elektrik, dan hybrid dengan teknologi terbaru</p>
                <div class="flex items-center justify-between">
                    <a href="#" class="inline-flex items-center text-primary font-bold hover:text-dark transition-colors">
                        Selengkapnya 
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-500 transition-colors text-sm font-semibold">
                        Booking Sekarang
                    </button>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary hover:shadow-2xl transition-all group"
                data-aos="fade-up"
                data-aos-delay="150">
                <div class="w-20 h-20 bg-gradient-to-br from-primary to-orange-500 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <!-- Suspension/Kaki-kaki Icon -->
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 12h2v8H3v-8zm4-8h2v16H7V4zm4 4h2v12h-2V8zm4-4h2v16h-2V4zm4 8h2v8h-2v-8z"/>
                        <path d="M2 2h20v2H2V2zm0 18h20v2H2v-2z"/>
                    </svg>
                </div>
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-2xl font-bold">Penggantian Kaki-Kaki</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">Sparepart Original</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        <span>3-6 jam pengerjaan</span>
                        <span class="mx-2">•</span>
                        <span class="text-primary font-semibold">Mulai dari Rp 250.000</span>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Penggantian komponen kaki-kaki seperti ball joint, tie rod, shock absorber, dan bushing dengan sparepart berkualitas tinggi</p>
                <div class="flex items-center justify-between">
                    <a href="#" class="inline-flex items-center text-primary font-bold hover:text-dark transition-colors">
                        Selengkapnya 
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-500 transition-colors text-sm font-semibold">
                        Booking Sekarang
                    </button>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary hover:shadow-2xl transition-all group"
                data-aos="fade-up"
                data-aos-delay="250">
                <div class="w-20 h-20 bg-gradient-to-br from-primary to-orange-500 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <!-- Wheel Alignment Icon -->
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        <path d="M8 8h8v8H8V8zm2 2v4h4v-4h-4z"/>
                        <path d="M12 6V2m0 20v-4M6 12H2m20 0h-4"/>
                    </svg>
                </div>
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-2xl font-bold">Spooring & Balancing</h3>
                        <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">Teknologi Komputer</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        <span>1-2 jam pengerjaan</span>
                        <span class="mx-2">•</span>
                        <span class="text-primary font-semibold">Mulai dari Rp 150.000</span>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Layanan spooring dan balancing dengan teknologi komputer terbaru untuk memastikan kenyamanan dan keamanan berkendara optimal</p>
                <div class="flex items-center justify-between">
                    <a href="#" class="inline-flex items-center text-primary font-bold hover:text-dark transition-colors">
                        Selengkapnya 
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-500 transition-colors text-sm font-semibold">
                        Booking Sekarang
                    </button>
                </div>
            </div>

        </div>
</section>

<!-- Keunggulan Section -->
<section id="keunggulan" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-black text-dark mb-6">
                Keunggulan Milala Auto Service
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Mengapa banyak pelanggan mempercayakan perbaikan power steering & kaki-kaki mobil mereka kepada kami? Berikut keunggulan utama bengkel kami:
            </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12" data-aos="fade-up">
            <!-- Keunggulan 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary flex flex-col items-center text-center hover:shadow-2xl transition-all group">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <!-- Expert Technician Icon -->
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V6.5L21 8.5V9ZM3 9V7L9 5.5V6.5L3 8.5V9ZM15 9.5V8L21 9.5V11L15 9.5ZM9 9.5V8L3 9.5V11L9 9.5ZM12 7.5C13.66 7.5 15 8.84 15 10.5V11.5C15 12.33 14.33 13 13.5 13H10.5C9.67 13 9 12.33 9 11.5V10.5C9 8.84 10.34 7.5 12 7.5ZM12 15C14.67 15 19 16.33 19 19V21H5V19C5 16.33 9.33 15 12 15Z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800">Teknisi Berpengalaman</h3>
                <p class="text-gray-600 leading-relaxed">Tim kami terdiri dari teknisi ahli yang sudah berpengalaman lebih dari 20 tahun di bidang power steering & kaki-kaki.</p>
                <div class="mt-4 flex items-center text-blue-600 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    20+ Tahun Pengalaman
                </div>
            </div>
            <!-- Keunggulan 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary flex flex-col items-center text-center hover:shadow-2xl transition-all group">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <!-- Original Parts Icon -->
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.6 14.8,10V11.5C14.8,12.3 14.1,13 13.3,13H10.7C9.9,13 9.2,12.3 9.2,11.5V10C9.2,8.6 10.6,7 12,7M12,8.2C11.2,8.2 10.4,8.7 10.4,10V11.8H13.6V10C13.6,8.7 12.8,8.2 12,8.2Z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800">Suku Cadang Original</h3>
                <p class="text-gray-600 leading-relaxed">Kami hanya menggunakan suku cadang original dan bergaransi untuk memastikan ketahanan dan keamanan kendaraan Anda.</p>
                <div class="mt-4 flex items-center text-green-600 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    100% Original & Bergaransi
                </div>
            </div>
            <!-- Keunggulan 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary flex flex-col items-center text-center hover:shadow-2xl transition-all group">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <!-- Warranty Icon -->
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800">Garansi Pengerjaan</h3>
                <p class="text-gray-600 leading-relaxed">Setiap pengerjaan dilengkapi garansi sehingga Anda tidak perlu khawatir dengan hasil servis kami.</p>
                <div class="mt-4 flex items-center text-purple-600 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    Garansi 6 Bulan
                </div>
            </div>
            <!-- Keunggulan 4 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary flex flex-col items-center text-center hover:shadow-2xl transition-all group">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <!-- Consultation Icon -->
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,2A3,3 0 0,1 15,5V11A3,3 0 0,1 12,14A3,3 0 0,1 9,11V5A3,3 0 0,1 12,2M19,11C19,14.53 16.39,17.44 13,17.93V21H11V17.93C7.61,17.44 5,14.53 5,11H7A5,5 0 0,0 12,16A5,5 0 0,0 17,11H19Z"/>
                        <path d="M12,0C18.63,0 24,5.37 24,12C24,18.63 18.63,24 12,24C5.37,24 0,18.63 0,12C0,5.37 5.37,0 12,0ZM12,2C6.48,2 2,6.48 2,12C2,17.52 6.48,22 12,22C17.52,22 22,17.52 22,12C22,6.48 17.52,2 12,2Z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800">Layanan Konsultasi</h3>
                <p class="text-gray-600 leading-relaxed">Konsultasikan masalah mobil Anda secara gratis dengan teknisi kami sebelum melakukan perbaikan.</p>
                <div class="mt-4 flex items-center text-orange-600 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                    Konsultasi Gratis
                </div>
            </div>
            <!-- Keunggulan 5 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary flex flex-col items-center text-center hover:shadow-2xl transition-all group">
                <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <!-- Modern Equipment Icon -->
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,2A2,2 0 0,1 14,4C14,4.74 13.6,5.39 13,5.73V7H14A7,7 0 0,1 21,14H22A1,1 0 0,1 23,15V18A1,1 0 0,1 22,19H21V20A2,2 0 0,1 19,22H5A2,2 0 0,1 3,20V19H2A1,1 0 0,1 1,18V15A1,1 0 0,1 2,14H3A7,7 0 0,1 10,7H11V5.73C10.4,5.39 10,4.74 10,4A2,2 0 0,1 12,2M7.5,13A0.5,0.5 0 0,0 7,13.5A0.5,0.5 0 0,0 7.5,14A0.5,0.5 0 0,0 8,13.5A0.5,0.5 0 0,0 7.5,13M16.5,13A0.5,0.5 0 0,0 16,13.5A0.5,0.5 0 0,0 16.5,14A0.5,0.5 0 0,0 17,13.5A0.5,0.5 0 0,0 16.5,13Z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800">Peralatan Modern</h3>
                <p class="text-gray-600 leading-relaxed">Bengkel kami dilengkapi peralatan modern dan teknologi terbaru untuk hasil pengerjaan yang lebih presisi.</p>
                <div class="mt-4 flex items-center text-indigo-600 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                    </svg>
                    Teknologi Terbaru
                </div>
            </div>
            <!-- Keunggulan 6 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-2 border-primary flex flex-col items-center text-center hover:shadow-2xl transition-all group">
                <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl mb-6 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <!-- Happy Customers Icon -->
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800">Ribuan Pelanggan Puas</h3>
                <p class="text-gray-600 leading-relaxed">Lebih dari 10.000 pelanggan telah mempercayakan servis power steering & kaki-kaki mobilnya kepada kami.</p>
                <div class="mt-4 flex items-center text-pink-600 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    10.000+ Pelanggan
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-24 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mb-6">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                </svg>
            </div>
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
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group relative overflow-hidden" data-aos="fade-up" data-aos-delay="50">
                <!-- Quote Icon -->
                <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center opacity-20 group-hover:opacity-30 transition-opacity">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z"/>
                    </svg>
                </div>
                
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4 ring-4 ring-yellow-100">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Ahmad Rizky" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">Ahmad Rizky</h4>
                        <p class="text-gray-500 text-sm">Pemilik Toyota Fortuner</p>
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
                    <span class="text-sm font-semibold text-gray-600">5.0</span>
                </div>
                
                <p class="text-gray-600 leading-relaxed italic">"Pelayanan sangat profesional, mekanik berpengalaman dalam menangani masalah power steering. Mobil saya yang tadinya berat saat dibelokkan sekarang jadi ringan dan responsif setelah diperbaiki di sini."</p>
                
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <p class="text-orange-600 font-bold text-sm">Perbaikan Power Steering</p>
                        <span class="text-xs text-gray-400">2 minggu lalu</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group relative overflow-hidden" data-aos="fade-up" data-aos-delay="150">
                <!-- Quote Icon -->
                <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center opacity-20 group-hover:opacity-30 transition-opacity">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z"/>
                    </svg>
                </div>
                
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4 ring-4 ring-blue-100">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Siti Nurhaliza" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">Siti Nurhaliza</h4>
                        <p class="text-gray-500 text-sm">Pemilik Honda HR-V</p>
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
                    <span class="text-sm font-semibold text-gray-600">5.0</span>
                </div>
                
                <p class="text-gray-600 leading-relaxed italic">"Sebagai wanita, saya sering khawatir dibohongi bengkel. Di Milala Auto Service, mereka menjelaskan semua masalah kaki-kaki mobil saya dengan detail dan transparan. Sekarang mobil saya tidak berbunyi lagi saat melewati jalan berlubang!"</p>
                
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <p class="text-blue-600 font-bold text-sm">Penggantian Kaki-Kaki</p>
                        <span class="text-xs text-gray-400">1 bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group relative overflow-hidden" data-aos="fade-up" data-aos-delay="250">
                <!-- Quote Icon -->
                <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center opacity-20 group-hover:opacity-30 transition-opacity">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z"/>
                    </svg>
                </div>
                
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4 ring-4 ring-green-100">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Budi Santoso" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">Budi Santoso</h4>
                        <p class="text-gray-500 text-sm">Pemilik Mitsubishi Pajero</p>
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
                    <span class="text-sm font-semibold text-gray-600">4.0</span>
                </div>
                
                <p class="text-gray-600 leading-relaxed italic">"Mobil saya bermasalah saat di jalan, kemudi bergetar dan sulit dikendalikan. Tim Milala Auto Service melakukan spooring dan balancing dengan cepat. Hasilnya, mobil saya kembali stabil dan nyaman dikendarai. Sangat terkesan!"</p>
                
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <p class="text-green-600 font-bold text-sm">Spooring & Balancing</p>
                        <span class="text-xs text-gray-400">3 minggu lalu</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Counter -->
        <div class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 rounded-3xl p-12 mt-24" data-aos="fade-up">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-black text-white mb-2 group-hover:scale-105 transition-transform">5000+</div>
                    <p class="text-white/90 font-semibold">Pelanggan Puas</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-black text-white mb-2 group-hover:scale-105 transition-transform">15+</div>
                    <p class="text-white/90 font-semibold">Tahun Pengalaman</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16,4C16.88,4 17.67,4.5 18,5.26L19,7H20A2,2 0 0,1 22,9V10A1,1 0 0,1 21,11H20V19A2,2 0 0,1 18,21H6A2,2 0 0,1 4,19V11H3A1,1 0 0,1 2,10V9A2,2 0 0,1 4,7H5L6,5.26C6.33,4.5 7.12,4 8,4H16M8.5,11A1.5,1.5 0 0,0 7,12.5A1.5,1.5 0 0,0 8.5,14A1.5,1.5 0 0,0 10,12.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 14,12.5A1.5,1.5 0 0,0 15.5,14A1.5,1.5 0 0,0 17,12.5A1.5,1.5 0 0,0 15.5,11Z"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-black text-white mb-2 group-hover:scale-105 transition-transform">30+</div>
                    <p class="text-white/90 font-semibold">Mekanik Ahli</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17,12C17,10.89 16.1,10 15,10C13.89,10 13,10.89 13,12A2,2 0 0,0 15,14C16.1,14 17,13.1 17,12M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M14.2,18L15.8,16.2L17.6,17.8L16,19.4L14.2,18M18,14.2L19.4,16L17.8,17.6L16.2,16L18,14.2M20,11V13H18V11H20M6,7H8V9H6V7Z"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-black text-white mb-2 group-hover:scale-105 transition-transform">24/7</div>
                    <p class="text-white/90 font-semibold">Layanan Darurat</p>
                </div>
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
            <!-- Cabang Ampera -->
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-100">
                <div class="flex items-start mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19S6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Cabang Ampera</h3>
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22S19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                            <p class="text-gray-600 text-sm">Jakarta Selatan, DKI Jakarta</p>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
                            </svg>
                            <p class="text-gray-600 text-sm">Beroperasi selama 15+ tahun</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <a href="https://maps.app.goo.gl/ampera" target="_blank" class="text-blue-600 font-bold hover:text-blue-800 transition-colors flex items-center">
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
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-100">
                <div class="flex items-start mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19S6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Cabang Bekasi</h3>
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22S19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                            <p class="text-gray-600 text-sm">Kota Bekasi, Jawa Barat</p>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                            </svg>
                            <p class="text-gray-600 text-sm">Telp: 0817-422-768</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <a href="https://maps.app.goo.gl/bekasi" target="_blank" class="text-green-600 font-bold hover:text-green-800 transition-colors flex items-center">
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
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-100">
                <div class="flex items-start mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19S6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Cabang Antasari</h3>
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22S19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                            <p class="text-gray-600 text-sm">Jakarta Selatan, DKI Jakarta</p>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
                            </svg>
                            <p class="text-gray-600 text-sm">Beroperasi selama 20+ tahun</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <a href="https://maps.app.goo.gl/antasari" target="_blank" class="text-orange-600 font-bold hover:text-orange-800 transition-colors flex items-center">
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
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all group border border-gray-100">
                <div class="flex items-start mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19S6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Cabang Bogor</h3>
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22S19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                            </svg>
                            <p class="text-gray-600 text-sm">Kabupaten Bogor, Jawa Barat</p>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
                            </svg>
                            <p class="text-gray-600 text-sm">Beroperasi selama 7+ tahun</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <a href="https://maps.app.goo.gl/bogor" target="_blank" class="text-purple-600 font-bold hover:text-purple-800 transition-colors flex items-center">
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
                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>