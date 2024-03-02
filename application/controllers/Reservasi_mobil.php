<?php
/* 
 Developer : Alwan Putra Andriansyah
*/

defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi_mobil extends CI_Controller
{
    var $site_url = 'Reservasi_mobil';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('Reservasi_mobil_model');
    }

    public function index()
    {
        $this->data['tittle']   = 'Reservasi';
        $this->data['tittle_2'] = 'Mobil';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'reservasi_mobil/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function ajax_datatable()
    {
        $list = $this->Reservasi_mobil_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $id = "'" . $field->id_reserve . "'";
            // $row[] = $no;
            $row[] = '
              <a href="javascript:;" onclick="edit(' . $id . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
              <a href="javascript:;" onclick="deleteRow(' . $id . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
            ';
            

            $row[]  = $field->no_polisi;
            $row[]  = $field->no_rangka;
            $row[]  = $field->type_mobil;
            $row[]  = $field->tahun;
            $row[]  = $field->cabang;
            $row[]  = $field->created_by;
            $row[]  = $field->created_date;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Reservasi_mobil_model->count_all(),
            "recordsFiltered" => $this->Reservasi_mobil_model->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {

        if ($this->input->post('nama_pemilik') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Nama pemlik harus diisi',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('nomor_polisi') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Nomor Polisi Tidak Boleh Kosong',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('nomor_rangka') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Nomor Polisi harus diisi',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('type_mobil') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Type / Merek Mobil harus diisi',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('tahun') == '') {
            $response = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Tahun harus diisi',
                'meta' => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('tgl_reservasi') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Tgl. Reservasi harus diisi',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }


        $data = array(
            'user_id'       => $this->session->userdata('id_user'),
            'nama_pemilik'  => $this->input->post('nama_pemilik'),
            'no_polisi'     => $this->input->post('nomor_polisi'),
            'type_mobil'    => $this->input->post('type_mobil'),
            'tahun'         => $this->input->post('tahun'),
            'tgl_reservasi' => $this->input->post('tgl_reservasi'),
            'no_rangka'     => $this->input->post('nomor_rangka'),
            'cabang'        => $this->input->post('cabang'),
            'created_by'    => $this->session->userdata('fullname'),
            'created_date'  => date('Y-m-d H:i:s'),
        );

        $insert = $this->Reservasi_mobil_model->add($data);

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
            $update = $this->Reservasi_mobil_model->edit($this->input->post('id'));
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
        $param['where']['id_reserve']  = $id;
        $getData = $this->Reservasi_mobil_model->get_all(0, 1, 'id_reserve', 'desc', $param);
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
        $delete = $this->Reservasi_mobil_model->delete($id);
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
    }
}


/* End of file Reservasi_mobil.php */
/* Location: ./application/controllers/Reservasi_mobil.php */
