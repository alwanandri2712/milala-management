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
        $this->load->model('Home_model');
    }

    public function index()
    {
        $current_bulan = date('m');
        $current_tahun = date('Y');

        $this->data['current_bulan']                         = date('m');
        $this->data['current_tahun']                         = date('Y');
        $this->data['count_users']                           = $this->Home_model->count_users();
        $this->data['total_tugas']                           = $this->Home_model->count_task();
        $this->data['total_tugas_pending']                   = $this->Home_model->count_task_pending();
        $this->data['total_tugas_progress']                  = $this->Home_model->count_task_onproggress();
        $this->data['total_tugas_completed']                 = $this->Home_model->count_task_done();
        $this->data['total_pengajuan_fasilitas_selesai']     = $this->Home_model->count_pengajuan_fasilitas_selesai();
        $this->data['total_pengajuan_fasilitas_onproggress'] = $this->Home_model->count_pengajuan_fasilitas_onproggress();
        $this->data['count_pengajuan_fasilitas_ditolak']     = $this->Home_model->count_pengajuan_fasilitas_ditolak();

        $data_hari_libur = curl_get("https://api-harilibur.vercel.app/api?month=$current_bulan&year=$current_tahun");

        
        $this->data['data_hari_libur'] = $data_hari_libur;
        $this->data['tittle']          = 'Dashboard';
        $this->data['tittle_2']        = 'home';
        $this->data['tittle_3']        = 'Welcome To Dashboard, ' . $this->session->userdata('fullname');

        $this->data['content']  = 'home';
        $this->load->view('layout/themes', $this->data);
    }


}
