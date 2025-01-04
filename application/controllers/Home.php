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
        $this->load->model('Kompetensi_model');
        $this->load->model('Human_error_model');
        $this->load->model('Task_home');
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

    public function datatables_kompetensi()
    {
        $list = $this->Kompetensi_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row    = array();
            $row[]  = $field->fullname;
            $row[]  = $field->nama_role;
            $row[]  = $field->description;
            $row[]  = $field->created_by;
            $row[]  = $field->created_date;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Kompetensi_model->count_all(),
            "recordsFiltered" => $this->Kompetensi_model->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function datatables_human_error()
    {
        $list = $this->Human_error_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row    = array();
            $row[]  = $field->fullname;
            $row[]  = $field->nama_role;
            $row[]  = $field->description;
            $row[]  = $field->created_by;
            $row[]  = $field->created_date;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Human_error_model->count_all(),
            "recordsFiltered" => $this->Human_error_model->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function datatables_list_task()
    {
        $list = $this->Task_home->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $id_ticket = "'" . $field->id_ticket . "'";

            if ($field->status == 0) {
                $status = '<span class="badge badge-danger">Pending</span>';
            } elseif ($field->status == 1) {
                $status = '<span class="badge badge-warning">On Progress</span>';
            } elseif ($field->status == 2) {
                $status = '<span class="badge badge-success">Selesai</span>';
            }

            $row[]  = $field->judul;
            $row[]  = substr($field->description, 0, 30) . ' ...';
            $row[]  = $status;
            $row['status_hide']  = $field->status;
            $row[]  = $field->created_by;
            $row[]  = $field->created_date;
            $data[] = $row;
        }
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Task_home->count_all(),
            "recordsFiltered" => $this->Task_home->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
