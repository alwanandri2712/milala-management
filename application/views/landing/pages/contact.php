<!-- Contact Page -->
<section class="pt-28 pb-20 bg-white">
    <div class="container mx-auto px-4">
        <!-- Page Title -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-5xl font-black text-dark mb-6">
                Hubungi Kami
            </h1>
            <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Konsultasikan kebutuhan perawatan kendaraan Anda dengan tim ahli kami
            </p>
        </div>

        <!-- Contact Form -->
        <div class="max-w-2xl mx-auto" data-aos="fade-up">
            <div class="bg-white p-8 rounded-2xl shadow-xl">
                    <h3 class="text-2xl font-bold mb-6">Kirim Pesan</h3>

                    <!-- Alert Success -->
                    <div id="alert-success" class="hidden bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                        <p class="font-bold">Berhasil!</p>
                        <p id="success-message"></p>
                    </div>

                    <!-- Alert Error -->
                    <div id="alert-error" class="hidden bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                        <p class="font-bold">Error!</p>
                        <p id="error-message"></p>
                    </div>

                    <form id="contact-form">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                                <span id="name-error" class="text-red-500 text-sm hidden"></span>
                            </div>
                            <div>
                                <label for="phone" class="block text-gray-700 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                                <span id="phone-error" class="text-red-500 text-sm hidden"></span>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                            <span id="email-error" class="text-red-500 text-sm hidden"></span>
                        </div>

                        <div class="mb-6">
                            <label for="service" class="block text-gray-700 mb-2">Layanan yang Dibutuhkan <span class="text-red-500">*</span></label>
                            <select id="service" name="service" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="">Pilih Layanan</option>
                                <option value="tune-up">Tune Up</option>
                                <option value="service">Servis Berkala</option>
                                <option value="repair">Perbaikan</option>
                                <option value="body">Body Repair</option>
                                <option value="emergency">Layanan Darurat</option>
                                <option value="other">Lainnya</option>
                            </select>
                            <span id="service-error" class="text-red-500 text-sm hidden"></span>
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 mb-2">Pesan <span class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                            <span id="message-error" class="text-red-500 text-sm hidden"></span>
                        </div>

                        <button type="submit" id="submit-btn" class="w-full bg-primary text-dark font-bold py-3 px-6 rounded-lg hover:bg-dark hover:text-primary transition-colors">
                            Kirim Pesan
                        </button>
                    </form>

                    <script>
                    // Pastikan jQuery tersedia
                    if (typeof jQuery === 'undefined') {
                        console.error('jQuery is not loaded! Contact form will not work.');
                        document.getElementById('error-message').innerHTML = 'Error: jQuery tidak tersedia. Silakan refresh halaman atau hubungi administrator.';
                        document.getElementById('alert-error').classList.remove('hidden');
                    }

                    $(document).ready(function() {
                        console.log('Contact form initialized');

                        // Handle form submission
                        $('#contact-form').submit(function(e) {
                            e.preventDefault();
                            console.log('Form submitted');

                            // Reset error messages
                            $('.text-red-500.text-sm').addClass('hidden');
                            $('#alert-success, #alert-error').addClass('hidden');

                            // Disable submit button
                            $('#submit-btn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Mengirim...');

                            // Get form data
                            var formData = {
                                name: $('#name').val(),
                                phone: $('#phone').val(),
                                email: $('#email').val(),
                                service: $('#service').val(),
                                message: $('#message').val()
                            };

                            console.log('Form data:', formData);

                            // Send AJAX request
                            $.ajax({
                                url: '<?= base_url('landing/submit_contact') ?>',
                                type: 'POST',
                                data: formData,
                                dataType: 'json',
                                success: function(response) {
                                    console.log('AJAX success response:', response);

                                    // Re-enable submit button
                                    $('#submit-btn').prop('disabled', false).html('Kirim Pesan');

                                    if (response.status) {
                                        // Show success message
                                        $('#success-message').text(response.message);
                                        $('#alert-success').removeClass('hidden');

                                        // Reset form
                                        $('#contact-form')[0].reset();

                                        // Scroll to success message
                                        $('html, body').animate({
                                            scrollTop: $('#alert-success').offset().top - 100
                                        }, 500);
                                    } else {
                                        // Show error message
                                        if (response.errors) {
                                            // Show field-specific errors
                                            $.each(response.errors, function(field, error) {
                                                $('#' + field + '-error').text(error).removeClass('hidden');
                                            });
                                        } else {
                                            // Show general error
                                            $('#error-message').html(response.message);
                                            $('#alert-error').removeClass('hidden');
                                        }

                                        // Scroll to error message
                                        $('html, body').animate({
                                            scrollTop: $('#alert-error').offset().top - 100
                                        }, 500);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX error:', status, error);
                                    console.error('Response:', xhr.responseText);

                                    // Re-enable submit button
                                    $('#submit-btn').prop('disabled', false).html('Kirim Pesan');

                                    // Show error message
                                    $('#error-message').html('Terjadi kesalahan saat mengirim pesan: ' + error + '<br>Silakan coba lagi nanti atau hubungi administrator.');
                                    $('#alert-error').removeClass('hidden');

                                    // Scroll to error message
                                    $('html, body').animate({
                                        scrollTop: $('#alert-error').offset().top - 100
                                    }, 500);
                                }
                            });
                        });
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
