<!-- Page Header & Reservation Form Section -->
<section class="pt-28 pb-16 bg-gradient-to-br from-gray-900 via-black to-gray-800 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 rounded-full blur-xl animate-pulse opacity-10" style="background-color: #FCFB0B;"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 rounded-full blur-xl animate-pulse delay-1000 opacity-10" style="background-color: #FCFB0B;"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-orange-400 rounded-full blur-xl animate-pulse delay-500 opacity-10"></div>
        <div class="absolute top-1/3 right-1/4 w-28 h-28 rounded-full blur-xl animate-pulse delay-700 opacity-10" style="background-color: #FCFB0B;"></div>
        <div class="absolute bottom-1/3 left-1/4 w-36 h-36 bg-orange-400 rounded-full blur-xl animate-pulse delay-300 opacity-10"></div>
    </div>

    <!-- Floating Particles -->
    <div class="absolute inset-0">
        <div class="particle absolute w-2 h-2 bg-white rounded-full opacity-60 animate-float" style="top: 20%; left: 10%; animation-delay: 0s;"></div>
        <div class="particle absolute w-3 h-3 bg-yellow-300 rounded-full opacity-40 animate-float" style="top: 60%; left: 80%; animation-delay: 2s;"></div>
        <div class="particle absolute w-1 h-1 bg-yellow-300 rounded-full opacity-70 animate-float" style="top: 40%; left: 70%; animation-delay: 1s;"></div>
        <div class="particle absolute w-2 h-2 bg-pink-300 rounded-full opacity-50 animate-float" style="top: 80%; left: 20%; animation-delay: 3s;"></div>
        <div class="particle absolute w-1 h-1 bg-green-300 rounded-full opacity-60 animate-float" style="top: 30%; left: 90%; animation-delay: 1.5s;"></div>
        <div class="particle absolute w-2 h-2 bg-blue-300 rounded-full opacity-50 animate-float" style="top: 70%; left: 15%; animation-delay: 4s;"></div>
        <div class="particle absolute w-1 h-1 bg-purple-300 rounded-full opacity-60 animate-float" style="top: 25%; left: 85%; animation-delay: 2.5s;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <!-- Page Title -->
        <div class="text-center mb-16 mt-12" data-aos="fade-up">
            <h1 class="text-5xl font-black text-white mb-6">
                Reservasi Layanan
            </h1>
            <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Buat janji untuk layanan power steering dan kaki-kaki mobil Anda di Milala Auto Service. Kami akan memberikan pelayanan terbaik sesuai dengan kebutuhan kendaraan Anda.
            </p>
        </div>

        <!-- Reservation Form -->
        <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg shadow-lg p-8" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-white mb-6 text-center">Form Reservasi</h2>
            <p class="text-white/80 mb-8 text-center">Silakan isi form di bawah ini untuk membuat reservasi layanan</p>
            
            <!-- Alert for success/error messages -->
            <div id="reservation-alert" class="hidden mb-6 p-4 rounded-lg"></div>
            
            <form id="reservation-form" class="space-y-6">
                <!-- Personal Information -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-white mb-4">Informasi Pribadi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-white font-medium mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/60 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="name-error"></span>
                        </div>
                        <div>
                            <label for="phone" class="block text-white font-medium mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/60 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="phone-error"></span>
                        </div>
                        <div class="md:col-span-2">
                            <label for="email" class="block text-white font-medium mb-2">Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/60 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="email-error"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Service Information -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-white mb-4">Informasi Layanan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="branch_id" class="block text-white font-medium mb-2">Pilih Cabang <span class="text-red-500">*</span></label>
                            <select id="branch_id" name="branch_id" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                                <option value="" class="text-black">-- Pilih Cabang --</option>
                                <?php foreach ($branches as $branch): ?>
                                <option value="<?= $branch->id_cabang ?>" class="text-black"><?= $branch->nama_cabang ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="error-message text-red-500 text-sm hidden" id="branch_id-error"></span>
                        </div>
                        <div>
                            <label for="service_type" class="block text-white font-medium mb-2">Jenis Layanan <span class="text-red-500">*</span></label>
                            <select id="service_type" name="service_type" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                                <option value="" class="text-black">-- Pilih Layanan --</option>
                                <option value="Power Steering" class="text-black">Power Steering</option>
                                <option value="Kaki-Kaki" class="text-black">Kaki-Kaki</option>
                                <option value="Spooring Balancing" class="text-black">Spooring Balancing</option>
                                <option value="Penggantian Spare Part" class="text-black">Penggantian Spare Part</option>
                                <option value="Service Berkala" class="text-black">Service Berkala</option>
                                <option value="Lainnya" class="text-black">Lainnya</option>
                            </select>
                            <span class="error-message text-red-500 text-sm hidden" id="service_type-error"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Vehicle Information -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-white mb-4">Informasi Kendaraan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="vehicle_brand" class="block text-white font-medium mb-2">Merk Kendaraan <span class="text-red-500">*</span></label>
                            <input type="text" id="vehicle_brand" name="vehicle_brand" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/60 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="vehicle_brand-error"></span>
                        </div>
                        <div>
                            <label for="vehicle_model" class="block text-white font-medium mb-2">Model Kendaraan <span class="text-red-500">*</span></label>
                            <input type="text" id="vehicle_model" name="vehicle_model" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/60 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="vehicle_model-error"></span>
                        </div>
                        <div>
                            <label for="vehicle_year" class="block text-white font-medium mb-2">Tahun Kendaraan <span class="text-red-500">*</span></label>
                            <input type="number" id="vehicle_year" name="vehicle_year" min="1980" max="2024" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/60 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="vehicle_year-error"></span>
                        </div>
                        <div>
                            <label for="license_plate" class="block text-white font-medium mb-2">Nomor Polisi <span class="text-red-500">*</span></label>
                            <input type="text" id="license_plate" name="license_plate" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/60 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="license_plate-error"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Reservation Date & Time -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-white mb-4">Jadwal Reservasi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="reservation_date" class="block text-white font-medium mb-2">Tanggal Reservasi <span class="text-red-500">*</span></label>
                            <input type="date" id="reservation_date" name="reservation_date" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="reservation_date-error"></span>
                        </div>
                        <div>
                            <label for="reservation_time" class="block text-white font-medium mb-2">Waktu Reservasi <span class="text-red-500">*</span></label>
                            <select id="reservation_time" name="reservation_time" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                                <option value="" class="text-black">-- Pilih Waktu --</option>
                                <option value="08:00" class="text-black">08:00 WIB</option>
                                <option value="09:00" class="text-black">09:00 WIB</option>
                                <option value="10:00" class="text-black">10:00 WIB</option>
                                <option value="11:00" class="text-black">11:00 WIB</option>
                                <option value="13:00" class="text-black">13:00 WIB</option>
                                <option value="14:00" class="text-black">14:00 WIB</option>
                                <option value="15:00" class="text-black">15:00 WIB</option>
                                <option value="16:00" class="text-black">16:00 WIB</option>
                            </select>
                            <span class="error-message text-red-500 text-sm hidden" id="reservation_time-error"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Notes -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-white mb-4">Catatan Tambahan</h3>
                    <div>
                        <label for="notes" class="block text-white font-medium mb-2">Catatan (opsional)</label>
                        <textarea id="notes" name="notes" rows="4" class="w-full px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/60 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Jelaskan keluhan atau permintaan khusus untuk kendaraan Anda..."></textarea>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-gradient-to-r from-primary to-primary hover:bg-black hover:text-primary text-black font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Buat Reservasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>


<!-- JavaScript for Form Handling -->
<script>
$(document).ready(function() {
    // Set minimum date for reservation to today
    const today = new Date().toISOString().split('T')[0];
    $('#reservation_date').attr('min', today);
    
    // Form submission
    $('#reservation-form').on('submit', function(e) {
        e.preventDefault();
        
        // Reset error messages
        $('.error-message').addClass('hidden').text('');
        
        // Show loading state
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.text();
        submitBtn.prop('disabled', true).text('Mengirim...');
        
        // Send AJAX request
        $.ajax({
            url: '<?= base_url('landing/submit_reservation') ?>',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                // Reset button
                submitBtn.prop('disabled', false).text(originalText);
                
                // Handle response
                if (response.status) {
                    // Success
                    $('#reservation-alert')
                        .removeClass('hidden bg-red-100 text-red-700')
                        .addClass('bg-green-100 text-green-700')
                        .text(response.message);
                    
                    // Reset form
                    $('#reservation-form')[0].reset();
                    
                    // Scroll to alert
                    $('html, body').animate({
                        scrollTop: $('#reservation-alert').offset().top - 100
                    }, 500);
                } else {
                    // Error
                    $('#reservation-alert')
                        .removeClass('hidden bg-green-100 text-green-700')
                        .addClass('bg-red-100 text-red-700')
                        .text(response.message);
                    
                    // Display field errors
                    if (response.errors) {
                        $.each(response.errors, function(field, message) {
                            $('#' + field + '-error').removeClass('hidden').text(message);
                        });
                    }
                    
                    // Scroll to alert
                    $('html, body').animate({
                        scrollTop: $('#reservation-alert').offset().top - 100
                    }, 500);
                }
            },
            error: function(xhr, status, error) {
                // Reset button
                submitBtn.prop('disabled', false).text(originalText);
                
                // Show error message
                $('#reservation-alert')
                    .removeClass('hidden bg-green-100 text-green-700')
                    .addClass('bg-red-100 text-red-700')
                    .text('Terjadi kesalahan. Silakan coba lagi nanti.');
                
                // Scroll to alert
                $('html, body').animate({
                    scrollTop: $('#reservation-alert').offset().top - 100
                }, 500);
            }
        });
    });
});
</script>
