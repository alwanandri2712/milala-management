<?php
/* 
 Developer : Alwan Putra Andriansyah
*/

defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi extends CI_Controller
{
    var $site_url = 'Kompetensi';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('Kompetensi_model');
        $this->load->model('masterdata/User_model');
    }

    public function index()
    {
        $this->data['data_karyawan'] = $this->User_model->getNamaKaryawan();

        $this->data['tittle']   = 'Kompetensi';
        $this->data['tittle_2'] = 'Kompetensi';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'kompetensi/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function ajax_datatable()
    {
        $list = $this->Kompetensi_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $id = "'" . $field->id_kompetensi . "'";
            // $row[] = $no;
            $row[] = '
              <a href="javascript:;" onclick="edit(' . $id . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
              <a href="javascript:;" onclick="deleteRow(' . $id . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
            ';

            $row[]  = $field->fullname;
            $row[]  = $field->nama_role;
            // $row[]  = substr($field->description, 0, 100) . ' ...';
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

    public function add()
    {

        if ($this->input->post('id_user') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Karyawan Tidak Boleh Kosong',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('description') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Deskripsi harus diisi',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }


        $data = array(
            'id_user'      => $this->input->post('id_user'),
            'description'  => $this->security->xss_clean($this->input->post('description')),
            'created_by'   => $this->session->userdata('fullname'),
            'created_date' => date('Y-m-d H:i:s'),
        );

        $insert = $this->Kompetensi_model->add($data);

        if ($insert) {
            $response = array(
                'code'    => 200,
                'status'  => 'success',
                'message' => 'Data berhasil ditambahkan',
                'data'    => $data,
                'meta'    => [
                    'header_status_code' => 200,
                ]
            );
            
        } else {
            $response = array(
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Data gagal ditambahkan',
                'data'    => [],
                'meta'    => [
                    'header_status_code' => 400,
                ]
            );
        }
        toJson($response, $response['meta']['header_status_code']);
    }

    public function edit($id = null)
    {
        /* ini buat proses simpan perubahan edit */
        if ($this->input->post('id')) {
            $update = $this->Kompetensi_model->edit($this->input->post('id'));
            if ($update) {
                $response = array(
                    'code'    => 200,
                    'status'  => 'success',
                    'message' => 'Data berhasil diubah',
                    'data'    => $update,
                    'meta'    => [
                        'header_status_code' => 200,
                    ]
                );
                toJson($response, $response['meta']['header_status_code']);
            } else {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Data gagal diubah',
                    'data'    => $update,
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                );
                toJson($response, $response['meta']['header_status_code']);
            }
        }

        /* ini buat tampilin data ketika mau di edit */
        $param['where']['id_kompetensi']  = $id;
        $getData = $this->Kompetensi_model->get_all(0, 1, 'id_kompetensi', 'desc', $param);
        if (!$getData['results']) {
            $response = array(
                'code'    => 404,
                'status'  => 'error',
                'message' => 'Data tidak ditemukan',
                'data'    => new stdClass(),
                'meta'    => [
                    'header_status_code' => 404
                ]
            );
            toJson($response, $response['meta']['header_status_code']);
        } else {
            $response = array(
                'code'    => 200,
                'status'  => 'success',
                'message' => 'Data ditemukan',
                'data'    => $getData['results'],
                'meta'    => [
                    'header_status_code' => 200
                ]
            );
            toJson($response, $response['meta']['header_status_code']);
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata('id_role') == 1) { /* super administrator */
            $delete = $this->Kompetensi_model->delete($id);
            if ($delete) {
                $response = array(
                    'status'  => 'success',
                    'message' => 'Data berhasil dihapus',
                    'data'    => $delete,
                    'meta'    => [
                        'header_status_code' => 200,
                    ]
                );
            } else {
                $response = array(
                    'status'  => 'error',
                    'message' => 'Data gagal dihapus',
                    'data'    => $delete,
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                );
            }

            toJson($response, $response['meta']['header_status_code']);
        } else {
            $response = array(
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Anda tidak punya akses untuk delete ini',
                'data'    => [],
                'meta'    => [
                    'header_status_code' => 400,
                ]
            );

            toJson($response, $response['meta']['header_status_code']);
        }
    }
}


/* End of file Kompetensi_model.php */
/* Location: ./application/controllers/Kompetensi_model.php */
