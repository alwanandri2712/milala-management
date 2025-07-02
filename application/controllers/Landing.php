<?php
/*
 Developer : Alwan Putra Andriansyah
 Website : Milala Auto Service - Bengkel Spesialis Power Steering & Kaki-Kaki
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    var $site_url = 'Landing';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
        // Load models
        $this->load->model('control_landing/Artikel_model');
        $this->load->model('Contact_model');
        $this->load->model('masterdata/Cabang_model', 'cabang');
        $this->load->model('Reservation_model');
        
        // Load libraries
        $this->load->library('form_validation');
    }

    /**
     * Halaman Beranda
     */
    public function index() {
        $data['title'] = 'Milala Auto Service - Bengkel Spesialis Power Steering & Kaki-Kaki';
        $data['active'] = 'home';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/home');
        $this->load->view('templates/footer');
    }

    /**
     * Halaman Tentang Kami
     */
    public function about() {
        $data['title'] = 'Tentang Kami - Milala Auto Service';
        $data['active'] = 'about';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/about');
        $this->load->view('templates/footer');
    }

    /**
     * Halaman Layanan
     */
    public function services() {
        $data['title'] = 'Layanan Kami - Milala Auto Service';
        $data['active'] = 'services';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/services');
        $this->load->view('templates/footer');
    }

    /**
     * Halaman Artikel
     */
    public function artikel() {
        $data['title'] = 'Artikel - Milala Auto Service';
        $data['active'] = 'artikel';

        // Ambil semua artikel dengan status published dari database
        $data['articles'] = $this->Artikel_model->get_all(0, 6, 'created_date', 'desc', ['where' => ['artikel_status' => 1]]);

        // Jika ada artikel, ambil artikel pertama sebagai featured article
        if (!empty($data['articles']['results'])) {
            $data['featured_article'] = $data['articles']['results'][0];
            // Hapus artikel pertama dari daftar artikel biasa
            array_shift($data['articles']['results']);
        } else {
            $data['featured_article'] = null;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/artikel', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * Mengambil artikel dengan pagination untuk AJAX
     */
    public function get_articles_json() {
        // Validasi dan sanitasi parameter pagination
        $offset = $this->input->get('offset') !== null ? intval($this->input->get('offset')) : 0;
        $offset = max(0, $offset); // Pastikan offset tidak negatif
        
        $limit = $this->input->get('limit') !== null ? intval($this->input->get('limit')) : 6;
        $limit = min(max(1, $limit), 20); // Batasi limit antara 1-20 untuk mencegah overload
        
        // Sanitasi input pencarian
        $search = $this->input->get('search') !== null ? $this->security->xss_clean(trim($this->input->get('search'))) : '';
        
        // Validasi kategori (hanya terima kategori yang valid)
        $valid_categories = ['Perawatan', 'Tips Berkendara', 'Teknologi', 'DIY', 'all', ''];
        $category = $this->input->get('category') !== null ? $this->input->get('category') : '';
        $category = in_array($category, $valid_categories) ? $category : 'all';
        
        // Filter berdasarkan pencarian dan kategori jika ada
        $where = ['artikel_status' => 1]; // Hanya artikel yang dipublish
        
        // Hanya filter berdasarkan pencarian jika search tidak kosong
        if (!empty($search)) {
            // Gunakan query parameter binding untuk mencegah SQL injection
            $where['artikel_title LIKE'] = '%' . $this->db->escape_like_str($search) . '%';
        }
        
        if (!empty($category) && $category !== 'all') {
            $where['artikel_kategori'] = $category;
        }
        
        // Ambil artikel dari database
        $articles = $this->Artikel_model->get_all($offset, $limit, 'created_date', 'desc', ['where' => $where]);
        
        // Format data untuk response JSON
        $formatted_articles = [];
        if (!empty($articles['results'])) {
            foreach ($articles['results'] as $article) {
                $formatted_articles[] = [
                    'id'              => $article->artikel_id,
                    'title'           => $article->artikel_title,
                    'slug'            => $article->artikel_slug,
                    'image'           => base_url('upload/artikel/' . $article->artikel_image),
                    'content_preview' => substr(strip_tags($article->artikel_content), 0, 120) . '...',
                    'date'            => date('d M Y', strtotime($article->created_date)),
                    'author'          => $article->created_by,
                    'category'        => $article->artikel_kategori
                ];
            }
        }
        
        // Buat response
        $response = [
            'code'    => 200,
            'status'  => 'success',
            'message' => 'Data berhasil diambil',
            'data'    => [
                'articles' => $formatted_articles,
                'pagination' => [
                    'offset'   => $offset,
                    'limit'    => $limit,
                    'total'    => $articles['total_rows'],
                    'has_more' => ($offset + $limit < $articles['total_rows'])
                ]
            ],
            'meta' => [
                'header_status_code' => 200
            ]
        ];
        
        // Kirim response JSON
        toJson($response, $response['meta']['header_status_code']);
    }

    /**
     * Halaman Detail Artikel
     *
     * @param string $slug Slug artikel
     */
    public function artikel_detail($slug) {
        $data['title'] = 'Detail Artikel - Milala Auto Service';
        $data['active'] = 'artikel';

        // Ambil detail artikel berdasarkan slug
        $data['article'] = $this->Artikel_model->get_article_by_slug($slug);

        if (!$data['article']) {
            show_404();
        }

        // Ambil artikel terkait yang berstatus published
        $data['related_articles'] = $this->Artikel_model->get_all(0, 3, 'created_date', 'desc',
            ['where' => [
                'artikel_id !=' => $data['article']->artikel_id,
                'artikel_status' => 1
            ]]);

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/artikel_detail', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Halaman Kontak
     */
    public function contact() {
        $data['title'] = 'Hubungi Kami - Milala Auto Service';
        $data['active'] = 'contact';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/contact');
        $this->load->view('templates/footer');
    }

    /**
     * Halaman Reservasi
     */
    public function reservation() {
        $data['title'] = 'Reservasi Layanan - Milala Auto Service';
        $data['active'] = 'reservation';

        // Get all branches
        $branches = $this->cabang->get_all();
        $data['branches'] = $branches['results'];

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/reservation', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Menangani pengiriman form kontak
     */
    public function submit_contact() {
        // Cek apakah request adalah AJAX
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        // Set aturan validasi
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('service', 'Layanan', 'required|trim');
        $this->form_validation->set_rules('message', 'Pesan', 'required|trim');

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal
            $errors = $this->form_validation->error_array();

            $response = [
                'code'    => 400,
                'status'  => false,
                'message' => validation_errors(),
                'errors'  => $errors,
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        } else {
            try {
                // Jika validasi berhasil, simpan data
                $data = [
                    'name'       => $this->security->xss_clean($this->input->post('name')),
                    'phone'      => $this->security->xss_clean($this->input->post('phone')),
                    'email'      => $this->security->xss_clean($this->input->post('email')),
                    'service'    => $this->security->xss_clean($this->input->post('service')),
                    'message'    => $this->security->xss_clean($this->input->post('message')),
                    'status'     => 'unread',
                    'created_at' => date('Y-m-d H:i:s')
                ];

                // Cek apakah tabel contact_messages ada
                $this->_create_contact_table_if_not_exists();

                $result = $this->Contact_model->save_message($data);

                if ($result) {
                    $response = [
                        'code'    => 200,
                        'status'  => true,
                        'message' => 'Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda.',
                        'data'    => $data,
                        'meta'    => [
                            'header_status_code' => 200,
                        ]
                    ];
                } else {
                    $response = [
                        'code'    => 400,
                        'status'  => false,
                        'message' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.',
                        'data'    => [],
                        'meta'    => [
                            'header_status_code' => 400,
                        ]
                    ];
                }

                toJson($response, $response['meta']['header_status_code']);
            } catch (Exception $e) {
                $response = [
                    'code'    => 500,
                    'status'  => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 500,
                    ]
                ];

                toJson($response, $response['meta']['header_status_code']);
            }
        }
    }

    public function test_email() {
        $data = $this->kirim_email->send_test("alwanputra2712@gmail.com");
        var_dump($data);
    }

    /**
     * Test email with HTML
     * URL: /landing/test_email_html
     */
    public function test_email_html()
    {
        // Sample data for testing
        $test_data = [
            'reservation_id' => 'TEST' . rand(1000, 9999),
            'name' => 'John Doe',
            'email' => 'alwanputra2712@gmail.com',
            'phone' => '081234567890',
            'service_type' => 'Service Berkala',
            'vehicle_type' => 'Mobil',
            'vehicle_brand' => 'Toyota Avanza',
            'reservation_date' => date('Y-m-d'),
            'reservation_time' => '10:00:00',
            'notes' => 'Ini adalah pesan test untuk mengirim email dengan format teks.'
        ];

        // Generate email content
        $email_content = $this->_email_template_customer($test_data);

        // Send email
        $email_data = [
            'to' => $test_data['email'],
            'subject' => 'Test Email HTML - ' . $test_data['reservation_id'],
            'message' => $email_content,
            'is_html' => false // Set ke false untuk format teks
        ];

        $result = $this->kirim_email->send($email_data);

        if (is_array($result) && isset($result['status']) && $result['status']) {
            echo 'Email dengan format teks berhasil dikirim ke ' . $test_data['email'];
            echo '<br><br>Reservation ID: ' . $test_data['reservation_id'];
            echo '<hr><h3>Preview Email:</h3><pre>' . htmlspecialchars($email_content) . '</pre>';
        } else {
            echo 'Gagal mengirim email. Error: ' . (isset($result['error']) ? $result['error'] : 'Tidak diketahui');
            echo '<hr><h3>Preview Email:</h3><pre>' . htmlspecialchars($email_content) . '</pre>';
        }
    }

    /**
     * Test email with HTML (simple version)
     * URL: /landing/test_email_simple
     */
    public function test_email_simple()
    {
        $this->load->library('email');
        
        // Konfigurasi email
        $config = [
            'protocol'    => 'smtp',
            'smtp_host'   => 'mail.milalaautoservice.com',
            'smtp_port'   => 587,
            'smtp_user'   => 'info@milalaautoservice.com',
            'smtp_pass'   => '#!MiL4L4366PSM!',
            'smtp_crypto' => 'tls',
            'mailtype'    => 'text',
            'charset'     => 'utf-8',
            'newline'     => "\r\n",
            'wordwrap'    => TRUE,
            'wrapchars'   => 70,
            'validate'    => FALSE,
            'priority'    => 3,
            'crlf'        => "\r\n"
        ];

        $this->email->initialize($config);
        
        // Isi email - format teks biasa
        $text = "" . str_repeat("=", 50) . "

TEST EMAIL SEDERHANA

" . str_repeat("-", 50) . "

Halo,

Ini adalah email test sederhana untuk memastikan konfigurasi SMTP berfungsi dengan baik.

Email ini dikirim dalam format teks biasa untuk menghindari masalah 'line too long' yang dapat terjadi pada email HTML.

Detail Teknis:
- Server: mail.milalaautoservice.com
- Port: 587
- Protocol: SMTP dengan TLS
- Format: Plain Text
- Tanggal: " . date('d F Y H:i:s') . "

" . str_repeat("-", 50) . "

Email ini dikirim otomatis dari sistem Milala Auto Service.
© " . date('Y') . " Milala Auto Service. All rights reserved.

" . str_repeat("=", 50) . "";

        $this->email->from('info@milalaautoservice.com', 'Milala Auto Service');
        $this->email->to('alwanputra2712@gmail.com');
        $this->email->subject('Test Email Teks Sederhana - ' . date('Y-m-d H:i:s'));
        $this->email->message($text);

        if ($this->email->send(FALSE)) {
            echo 'Email sederhana berhasil dikirim!';
            echo '<hr><h3>Preview Email:</h3><pre>' . htmlspecialchars($text) . '</pre>';
        } else {
            echo 'Gagal mengirim email. Error: ' . $this->email->print_debugger();
            echo '<hr><h3>Preview Email:</h3><pre>' . htmlspecialchars($text) . '</pre>';
        }
    }

    /**
     * Menangani pengiriman form reservasi
     */
    public function submit_reservation() {
        // Cek apakah request adalah AJAX
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        // Set aturan validasi
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('branch_id', 'Cabang', 'required|trim');
        $this->form_validation->set_rules('service_type', 'Jenis Layanan', 'required|trim');
        $this->form_validation->set_rules('vehicle_type', 'Jenis Kendaraan', 'required|trim');
        $this->form_validation->set_rules('vehicle_brand', 'Merek Kendaraan', 'required|trim');
        $this->form_validation->set_rules('reservation_date', 'Tanggal Reservasi', 'required|trim');
        $this->form_validation->set_rules('reservation_time', 'Waktu Reservasi', 'required|trim');
        $this->form_validation->set_rules('notes', 'Catatan', 'trim');

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal
            $errors = $this->form_validation->error_array();

            $response = [
                'code'    => 400,
                'status'  => false,
                'message' => validation_errors(),
                'errors'  => $errors,
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        } else {
            try {
                // Jika validasi berhasil, simpan data
                $data = [
                    'name'             => $this->security->xss_clean($this->input->post('name')),
                    'phone'            => $this->security->xss_clean($this->input->post('phone')),
                    'email'            => $this->security->xss_clean($this->input->post('email')),
                    'branch_id'        => $this->security->xss_clean($this->input->post('branch_id')),
                    'service_type'     => $this->security->xss_clean($this->input->post('service_type')),
                    'vehicle_type'     => $this->security->xss_clean($this->input->post('vehicle_type')),
                    'vehicle_brand'    => $this->security->xss_clean($this->input->post('vehicle_brand')),
                    'reservation_date' => $this->security->xss_clean($this->input->post('reservation_date')),
                    'reservation_time' => $this->security->xss_clean($this->input->post('reservation_time')),
                    'notes'            => $this->security->xss_clean($this->input->post('notes')),
                    'status'           => 'pending',
                    'created_at'       => date('Y-m-d H:i:s')
                ];

                // Cek apakah tabel reservations ada
                $this->_create_reservation_table_if_not_exists();

                $result = $this->Reservation_model->save_reservation($data);

                if ($result) {
                    // Siapkan data untuk email
                    $payload = [
                        'name'             => $data['name'],
                        'reservation_id'   => $result,
                        'service_type'     => $data['service_type'],
                        'vehicle_type'     => $data['vehicle_type'],
                        'vehicle_brand'    => $data['vehicle_brand'],
                        'reservation_date' => $data['reservation_date'],
                        'reservation_time' => $data['reservation_time'],
                        'notes'            => $data['notes'],
                        'phone'            => $data['phone'],
                        'email'            => $data['email']
                    ];
                    
                    // Kirim email ke customer
                    $email_customer = [
                        'to'      => $data['email'],
                        'subject' => 'Konfirmasi Reservasi - ' . $result,
                        'message' => $this->_email_template_customer($payload),
                        'is_html' => false // Kirim sebagai teks biasa
                    ];
                    
                    $email_result = $this->kirim_email->send($email_customer);
                    
                    if ($email_result['status']) {
                        $email_message = 'Reservasi Anda berhasil dikirim. Konfirmasi telah dikirim ke email Anda.';
                    } else {
                        log_message('error', 'Gagal mengirim email: ' . print_r($email_result['error'], TRUE));
                        $email_message = 'Reservasi Anda berhasil dikirim, tetapi gagal mengirim email konfirmasi. Mohon simpan nomor reservasi Anda.';
                    }

                    $response = [
                        'code'    => 200,
                        'status'  => true,
                        'message' => $email_message,
                        'data'    => array_merge($data, ['reservation_id' => $result]),
                        'meta'    => [
                            'header_status_code' => 200,
                        ]
                    ];
                } else {
                    $response = [
                        'code'    => 400,
                        'status'  => false,
                        'message' => 'Terjadi kesalahan saat mengirim reservasi. Silakan coba lagi nanti.',
                        'data'    => [],
                        'meta'    => [
                            'header_status_code' => 400,
                        ]
                    ];
                }

                toJson($response, $response['meta']['header_status_code']);
            } catch (Exception $e) {
                $response = [
                    'code'    => 500,
                    'status'  => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 500,
                    ]
                ];

                toJson($response, $response['meta']['header_status_code']);
            }
        }
    }

    /**
     * Membuat tabel contact_messages jika belum ada
     */
    private function _create_contact_table_if_not_exists() {
        if (!$this->db->table_exists('contact_messages')) {
            // Buat tabel jika belum ada
            $this->load->dbforge();

            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ),
                'phone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                ),
                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ),
                'service' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                ),
                'message' => array(
                    'type' => 'TEXT',
                ),
                'status' => array(
                    'type' => 'ENUM',
                    'constraint' => array('unread', 'read'),
                    'default' => 'unread',
                ),
                'created_at' => array(
                    'type' => 'DATETIME',
                )
            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('contact_messages', TRUE);
        }
    }

    /**
     * Template email untuk customer
     *
     * @param array $data Data untuk template email
     * @return string
     */
    private function _email_template_customer($data)
    {
        // Format tanggal dan waktu
        $reservation_datetime = date('d F Y H:i', strtotime($data['reservation_date'] . ' ' . $data['reservation_time']));
        $current_datetime = date('d F Y H:i');
        
        // Buat template teks biasa
        $text = "\n";
        $text .= str_repeat("=", 50) . "\n";
        $text .= "KONFIRMASI RESERVASI - " . $data['reservation_id'] . "\n";
        $text .= str_repeat("=", 50) . "\n\n";
        
        $text .= "Halo " . $data['name'] . ",\n\n";
        $text .= "Terima kasih telah melakukan reservasi di Milala Auto Service.\n";
        $text .= "Berikut adalah detail reservasi Anda:\n\n";
        
        $text .= "DETAIL RESERVASI\n";
        $text .= str_repeat("-", 50) . "\n";
        $text .= "Nomor Reservasi : " . $data['reservation_id'] . "\n";
        $text .= "Tanggal & Waktu : " . $reservation_datetime . " WIB\n";
        $text .= "Jenis Layanan   : " . $data['service_type'] . "\n";
        $text .= "Jenis Kendaraan : " . $data['vehicle_type'] . "\n";
        $text .= "Merk/Tipe       : " . $data['vehicle_brand'] . "\n\n";
        
        $text .= "DETAIL PELANGGAN\n";
        $text .= str_repeat("-", 50) . "\n";
        $text .= "Nama    : " . $data['name'] . "\n";
        $text .= "Email   : " . $data['email'] . "\n";
        $text .= "Telepon : " . $data['phone'] . "\n\n";
        
        // Tambahkan catatan jika ada
        if (!empty($data['notes'])) {
            $text .= "CATATAN TAMBAHAN\n";
            $text .= str_repeat("-", 50) . "\n";
            $text .= wordwrap($data['notes'], 50, "\n") . "\n\n";
        }
        
        // Tambahkan informasi penting
        $text .= "INFORMASI PENTING\n";
        $text .= str_repeat("-", 50) . "\n";
        $text .= "- Harap datang 15 menit sebelum waktu reservasi\n";
        $text .= "- Bawa surat-surat kendaraan yang diperlukan\n";
        $text .= "- Jika ada perubahan jadwal, hubungi kami di 081234567890\n\n";
        
        // Tambahkan footer
        $text .= str_repeat("-", 50) . "\n";
        $text .= "Terima kasih telah mempercayakan kendaraan Anda kepada kami.\n";
        $text .= "Tim kami akan segera menghubungi Anda untuk konfirmasi lebih lanjut.\n\n";
        $text .= str_repeat("=", 50) . "\n";
        $text .= "© " . date('Y') . " Milala Auto Service. All rights reserved.\n";
        $text .= "Email ini dikirim secara otomatis, mohon tidak membalas email ini.\n";
        
        return $text;
    }

    /**
     * Template email untuk admin (jika diperlukan)
     *
     * @param array $data Data untuk template email
     * @return string
     */
    private function _email_template_admin($data)
    {
        return $this->load->view('email/reservation_notification', $data, TRUE);
    }

    /**
     * Membuat tabel reservations jika belum ada
     */
    private function _create_reservation_table_if_not_exists() {
        if (!$this->db->table_exists('reservations')) {
            // Buat tabel jika belum ada
            $this->load->dbforge();

            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'phone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                ),
                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'branch_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
                'service_type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'vehicle_type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ),
                'vehicle_brand' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'reservation_date' => array(
                    'type' => 'DATE',
                ),
                'reservation_time' => array(
                    'type' => 'TIME',
                ),
                'notes' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'status' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'default' => 'pending',
                ),
                'created_at' => array(
                    'type' => 'DATETIME',
                ),
                'updated_at' => array(
                    'type' => 'DATETIME',
                    'null' => TRUE,
                ),
            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('reservations', TRUE);
        }
    }
}
