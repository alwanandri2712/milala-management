<?php
header('Access-Control-Allow-Origin: *');

class Home extends CI_Controller
{
    var $site_url = 'Home';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        // $this->load->model('Home_model');
    }

    public function index()
    {
        $this->data['current_bulan']          = date('m');
        $this->data['current_tahun']          = date('Y');

        $data_hari_libur = curl_get('https://api-harilibur.vercel.app/api?month=2&year=2024');

        
        $this->data['data_hari_libur'] = $data_hari_libur;
        $this->data['tittle']          = 'Dashboard';
        $this->data['tittle_2']        = 'home';
        $this->data['tittle_3']        = 'Welcome To Dashboard, ' . $this->session->userdata('fullname');

        $this->data['content']  = 'home';
        $this->load->view('layout/themes', $this->data);
    }

    public function getHariLibur(){

    }

}
