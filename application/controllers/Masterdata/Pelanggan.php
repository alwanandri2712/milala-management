<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pelanggan extends CI_Controller
{
    var $site_url = 'Masterdata/Pelanggan';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->access->is_admin();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('masterdata/Pelanggan_model');
    }

    public function index()
    {
        $this->data['tittle']   = 'Data Master';
        $this->data['tittle_2'] = 'Pelanggan';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'masterdata/pelanggan/index';
        $this->load->view('layout/themes', $this->data);
    }


    public function ajax_datatable()
    {
        $list = $this->Pelanggan_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $id_pelanggan = "'" . $field->id_pelanggan . "'";   
            // $row[] = $no;
            $row[] = '
              <a href="javascript:;" onclick="edit(' . $id_pelanggan . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
              <a href="javascript:;" onclick="deleteRow(' . $id_pelanggan . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
            ';
            
            $row[]  = $field->nama_lengkap;
            $row[]  = $field->nomor_polisi;
            $row[]  = $field->phone;
            $row[]  = $field->created_by;
            $row[]  = $field->created_date;
            $data[] = $row;
        }
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Pelanggan_model->count_all(),
            "recordsFiltered" => $this->Pelanggan_model->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        $data = array(
            'nama_lengkap' => $this->security->xss_clean($this->input->post('nama_lengkap')),
            'nomor_polisi' => $this->security->xss_clean($this->input->post('nomor_polisi')),
            'phone'        => $this->security->xss_clean($this->input->post('phone')),
            'created_by'   => $this->session->userdata('fullname'),
            'created_date' => date('Y-m-d H:i:s'),
        );

        $insert = $this->Pelanggan_model->add($data);

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
                'data'    => $data,
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
            $update = $this->Pelanggan_model->edit($this->input->post('id'));
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
        $param['where']['id_pelanggan']  = $id;
        $getData = $this->Pelanggan_model->get_all(0, 1, 'id_pelanggan', 'desc', $param);
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
        $delete = $this->Pelanggan_model->delete($id);
        if ($delete) {
            $response = array(
                'code'    => 200,
                'status'  => 'success',
                'message' => 'Data berhasil dihapus',
                'data'    => $delete,
                'meta'    => [
                    'header_status_code' => 200,
                ]
            );
        } else {
            $response = array(
                'code'    => 400,
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

