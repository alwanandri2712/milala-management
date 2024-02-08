<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Role extends CI_Controller
{
    var $site_url = 'Masterdata/Role';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->access->is_admin();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('masterdata/Role_model', "role");
    }

    public function index()
    {
        $this->data['tittle']    = 'Data Role';
        $this->data['tittle_2'] = 'User';
        $this->data['tittle_3'] = '';
        $this->data['content']   = 'masterdata/role/index';
        $this->load->view('layout/themes', $this->data);
    }


    public function ajax_datatable()
    {
        $list = $this->role->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $id_role = "'" . $field->id_role . "'";
            // $row[] = $no;
            $row[] = '
              <a href="javascript:;" onclick="edit(' . $id_role . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
              <a href="javascript:;" onclick="deleteRow(' . $id_role . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
            ';
            
            $row[] = $field->id_role;
            $row[] = $field->nama_role;
            $row[] = $field->created_by;
            $row[] = $field->is_delete > 0 ? "<button class='btn btn-danger btn-sm'>Inactived</button>" : "<button class='btn btn-success btn-sm'>Actived</button>";
            $data[] = $row;
        }
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->role->count_all(),
            "recordsFiltered" => $this->role->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        $data = array(
            'nama_role'          => $this->security->xss_clean($this->input->post('nama_role')),
            'created_by'         => $this->session->userdata('fullname'),
            'created_date'       => date('Y-m-d H:i:s'),
            'is_delete'          => $this->input->post('is_delete'),
        );

        $insert = $this->role->add($data);

        if ($insert) {
            $response = array(
                'id'      => $insert,
                'status'  => 'success',
                'message' => 'Data berhasil ditambahkan',
                'data'    => $data,
                'meta'    => [
                    'header_status_code' => 200,
                ]
            );
        } else {
            $response = array(
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
            $update = $this->role->edit($this->input->post('id'));
            if ($update) {
                $response = array(
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
        $param['where']['id_role']  = $id;
        $getData = $this->role->get_all(0, 1, 'id_role', 'desc', $param);
        if (!$getData['results']) {
            $response = array(
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
        $delete = $this->role->delete($id);
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


/* End of file Role.php */
/* Location: ./application/controllers/Role.php */
