<!-- Page Header -->
<div class="pt-32 pb-12 bg-primary hero-clip">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-dark mb-4" data-aos="fade-up">Reservasi Layanan</h1>
        <p class="text-lg md:text-xl text-dark/80 max-w-3xl" data-aos="fade-up" data-aos-delay="100">
            Buat janji untuk layanan power steering dan kaki-kaki mobil Anda di Milala Auto Service. Kami akan memberikan pelayanan terbaik sesuai dengan kebutuhan kendaraan Anda.
        </p>
    </div>
</div>

<!-- Reservation Form Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-dark mb-6 text-center">Form Reservasi</h2>
            <p class="text-gray-600 mb-8 text-center">Silakan isi form di bawah ini untuk membuat reservasi layanan</p>
            
            <!-- Alert for success/error messages -->
            <div id="reservation-alert" class="hidden mb-6 p-4 rounded-lg"></div>
            
            <form id="reservation-form" class="space-y-6">
                <!-- Personal Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-dark mb-4">Informasi Pribadi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="name-error"></span>
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="phone-error"></span>
                        </div>
                        <div class="md:col-span-2">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="email-error"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Service Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-dark mb-4">Informasi Layanan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="branch_id" class="block text-gray-700 font-medium mb-2">Pilih Cabang <span class="text-red-500">*</span></label>
                            <select id="branch_id" name="branch_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                                <option value="">-- Pilih Cabang --</option>
                                <?php foreach ($branches as $branch): ?>
                                <option value="<?= $branch->id_cabang ?>"><?= $branch->nama_cabang ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="error-message text-red-500 text-sm hidden" id="branch_id-error"></span>
                        </div>
                        <div>
                            <label for="service_type" class="block text-gray-700 font-medium mb-2">Jenis Layanan <span class="text-red-500">*</span></label>
                            <select id="service_type" name="service_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                                <option value="">-- Pilih Layanan --</option>
                                <option value="Power Steering">Power Steering</option>
                                <option value="Kaki-Kaki">Kaki-Kaki</option>
                                <option value="Spooring Balancing">Spooring Balancing</option>
                                <option value="Penggantian Spare Part">Penggantian Spare Part</option>
                                <option value="Service Berkala">Service Berkala</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <span class="error-message text-red-500 text-sm hidden" id="service_type-error"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Vehicle Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-dark mb-4">Informasi Kendaraan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="vehicle_type" class="block text-gray-700 font-medium mb-2">Jenis Kendaraan <span class="text-red-500">*</span></label>
                            <input type="text" id="vehicle_type" name="vehicle_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Contoh: SUV, Sedan, MPV" required>
                            <span class="error-message text-red-500 text-sm hidden" id="vehicle_type-error"></span>
                        </div>
                        <div>
                            <label for="vehicle_brand" class="block text-gray-700 font-medium mb-2">Merek & Model Kendaraan <span class="text-red-500">*</span></label>
                            <input type="text" id="vehicle_brand" name="vehicle_brand" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Contoh: Toyota Avanza" required>
                            <span class="error-message text-red-500 text-sm hidden" id="vehicle_brand-error"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Reservation Date & Time -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-dark mb-4">Waktu Reservasi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="reservation_date" class="block text-gray-700 font-medium mb-2">Tanggal <span class="text-red-500">*</span></label>
                            <input type="date" id="reservation_date" name="reservation_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="reservation_date-error"></span>
                        </div>
                        <div>
                            <label for="reservation_time" class="block text-gray-700 font-medium mb-2">Waktu <span class="text-red-500">*</span></label>
                            <input type="time" id="reservation_time" name="reservation_time" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                            <span class="error-message text-red-500 text-sm hidden" id="reservation_time-error"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Notes -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-dark mb-4">Catatan Tambahan</h3>
                    <div>
                        <label for="notes" class="block text-gray-700 font-medium mb-2">Catatan (opsional)</label>
                        <textarea id="notes" name="notes" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Jelaskan keluhan atau kebutuhan khusus Anda"></textarea>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-primary hover:bg-dark hover:text-primary text-dark font-bold py-3 px-8 rounded-full transition-colors duration-300 text-lg">
                        Kirim Reservasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-dark mb-12 text-center" data-aos="fade-up">Mengapa Memilih Kami?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-primary w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dark mb-2 text-center">Teknisi Berpengalaman</h3>
                <p class="text-gray-600 text-center">Tim teknisi kami memiliki pengalaman dan keahlian dalam menangani berbagai masalah power steering dan kaki-kaki mobil.</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-primary w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dark mb-2 text-center">Layanan Cepat</h3>
                <p class="text-gray-600 text-center">Kami menghargai waktu Anda. Dengan sistem reservasi, kami dapat memberikan layanan yang cepat dan efisien.</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-primary w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dark mb-2 text-center">Harga Transparan</h3>
                <p class="text-gray-600 text-center">Kami memberikan estimasi biaya yang jelas sebelum pekerjaan dimulai, tanpa biaya tersembunyi.</p>
            </div>
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
