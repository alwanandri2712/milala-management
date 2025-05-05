<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('control_landing/Artikel_model');
    }

    public function index() {
        $data['title'] = 'AutoCare - Bengkel Mobil Premium';
        $data['active'] = 'home';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/home');
        $this->load->view('templates/footer');
    }

    public function about() {
        $data['title'] = 'Tentang Kami - AutoCare';
        $data['active'] = 'about';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/about');
        $this->load->view('templates/footer');
    }

    public function services() {
        $data['title'] = 'Layanan Kami - AutoCare';
        $data['active'] = 'services';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/services');
        $this->load->view('templates/footer');
    }

    public function artikel() {
        $data['title'] = 'Artikel - AutoCare';
        $data['active'] = 'artikel';

        // Ambil semua artikel dari database
        $data['articles'] = $this->Artikel_model->get_all(0, 6, 'created_date', 'desc');

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
        $data['title'] = 'Detail Artikel - AutoCare';
        $data['active'] = 'artikel';

        // Ambil detail artikel berdasarkan slug
        $data['article'] = $this->Artikel_model->get_article_by_slug($slug);

        if (!$data['article']) {
            show_404();
        }

        // Ambil artikel terkait
        $data['related_articles'] = $this->Artikel_model->get_all(0, 3, 'created_date', 'desc',
            ['where' => ['artikel_id !=' => $data['article']->artikel_id]]);

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/artikel_detail', $data);
        $this->load->view('templates/footer');
    }

    public function contact() {
        $data['title'] = 'Hubungi Kami - AutoCare';
        $data['active'] = 'contact';

        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/contact');
        $this->load->view('templates/footer');
    }
}
