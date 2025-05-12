<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('control_landing/Artikel_model');
        $this->load->model('Contact_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Milala Auto Service - Spesialis Power Steering Mobil';
        $data['active'] = 'home';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/home');
        $this->load->view('templates/footer');
    }

    public function about() {
        $data['title'] = 'Tentang Kami - Milala Auto Service';
        $data['active'] = 'about';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/about');
        $this->load->view('templates/footer');
    }

    public function services() {
        $data['title'] = 'Layanan Kami - Milala Auto Service';
        $data['active'] = 'services';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/services');
        $this->load->view('templates/footer');
    }

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

    public function contact() {
        $data['title'] = 'Hubungi Kami - Milala Auto Service';
        $data['active'] = 'contact';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/contact');
        $this->load->view('templates/footer');
    }

    /**
     * Menangani pengiriman form kontak
     */
    public function submit_contact() {
        // Aktifkan error reporting untuk debugging
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        // Log input yang diterima
        log_message('debug', 'Contact form submission received: ' . json_encode($_POST));

        // Cek apakah request adalah AJAX
        if (!$this->input->is_ajax_request()) {
            log_message('error', 'Contact form: Not an AJAX request');
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
            log_message('debug', 'Contact form validation failed: ' . json_encode($errors));

            $response = [
                'status' => false,
                'message' => validation_errors(),
                'errors' => $errors
            ];
        } else {
            try {
                // Jika validasi berhasil, simpan data
                $data = [
                    'name'       => $this->input->post('name', true),
                    'phone'      => $this->input->post('phone', true),
                    'email'      => $this->input->post('email', true),
                    'service'    => $this->input->post('service', true),
                    'message'    => $this->input->post('message', true),
                    'status'     => 'unread',
                    'created_at' => date('Y-m-d H:i:s')
                ];

                log_message('debug', 'Contact form data to save: ' . json_encode($data));

                // Cek apakah tabel contact_messages ada
                if (!$this->db->table_exists('contact_messages')) {
                    log_message('error', 'Table contact_messages does not exist');

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

                    log_message('info', 'Table contact_messages created successfully');
                }

                $result = $this->Contact_model->save_message($data);
                log_message('debug', 'Contact form save result: ' . ($result ? 'success' : 'failed'));

                if ($result) {
                    $response = [
                        'status' => true,
                        'message' => 'Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda.'
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.'
                    ];
                }
            } catch (Exception $e) {
                log_message('error', 'Contact form exception: ' . $e->getMessage());
                $response = [
                    'status' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ];
            }
        }

        // Kirim response dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
