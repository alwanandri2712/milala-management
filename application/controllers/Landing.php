<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
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
        
        $this->load->view('templates/header', $data);
        $this->load->view('landing/pages/artikel');
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
