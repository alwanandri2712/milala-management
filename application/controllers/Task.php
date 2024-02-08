<?php
/* 
 Developer : Alwan Putra Andriansyah
*/

defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{
    var $site_url = 'Task';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('Task_model');
    }

    public function index()
    {
        $this->data['tittle']   = 'Task';
        $this->data['tittle_2'] = 'Management Tugas';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'task/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function ajax_datatable()
    {
        $list = $this->Task_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $id_ticket = "'" . $field->id_ticket . "'";
            // $row[] = $no;
            $row[] = '
              <a href="javascript:;" onclick="edit(' . $id_ticket . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
              <a href="javascript:;" onclick="deleteRow(' . $id_ticket . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
            ';

            $status = "
            <select class='form-control change-status' name='status' id='status' data-id='" . $id_ticket . "'>
                <option value='0' " . ($field->status == '0' ? 'selected' : '') . " style='color:red;'>Pending</option>
                <option value='1' " . ($field->status == '1' ? 'selected' : '') . ">Progress</option>
                <option value='2' " . ($field->status == '2' ? 'selected' : '') . ">Selesai</option>
            </select>
            ";
            
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
            "recordsTotal"    => $this->Task_model->count_all(),
            "recordsFiltered" => $this->Task_model->count_filtered(),
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

        $insert = $this->Task_model->add($data);

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
            $update = $this->Task_model->edit($this->input->post('id'));
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
        $param['where']['id_ticket']  = $id;
        $getData = $this->Task_model->get_all(0, 1, 'id_ticket', 'desc', $param);
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
        $delete = $this->Task_model->delete($id);
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


/* End of file Task_model.php */
/* Location: ./application/controllers/Task_model.php */
