<?php

class HistoryLogin extends CI_Controller
{
    var $site_url = 'HistoryLogin';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('RiwayatLogin_model');
    }

    public function index()
    {
        $this->data['tittle']   = 'History Login';
        $this->data['tittle_2'] = 'List';
        $this->data['tittle_3'] = '';

        $this->data['content']  = 'history_login';
        $this->load->view('layout/themes', $this->data);
    }

    public function ajax_datatable()
    {
        $list = $this->RiwayatLogin_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            
            $row[] = $field->last_login;
            $row[] = $field->browser;
            $row[] = $field->ip_address;
            $row[] = $field->user_agents;
            $data[] = $row;
        }
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->RiwayatLogin_model->count_all(),
            "recordsFiltered" => $this->RiwayatLogin_model->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
