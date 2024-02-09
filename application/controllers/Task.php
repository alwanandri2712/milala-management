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
            <select class='form-control change-status' name='status' id='status' data-id='" . $field->id_ticket . "'>
                <option value='0' " . ($field->status == '0' ? 'selected' : '') . " style='color:red;'>Pending</option>
                <option value='1' " . ($field->status == '1' ? 'selected' : '') . ">On Progress</option>
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

        if ($this->input->post('judul') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Judul harus diisi',
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

        if ($this->input->post('status') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Status harus diisi',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        $data = array(
            'judul'        => $this->security->xss_clean($this->input->post('judul')),
            'description'  => $this->security->xss_clean($this->input->post('description')),
            'status'       => $this->input->post('status'),
            'created_by'   => $this->session->userdata('fullname'),
            'created_date' => date('Y-m-d H:i:s'),
        );

        $insert = $this->Task_model->add($data);

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
            $update = $this->Task_model->edit($this->input->post('id'));
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
        $param['where']['id_ticket']  = $id;
        $getData = $this->Task_model->get_all(0, 1, 'id_ticket', 'desc', $param);
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

    public function change_status()
    {
        $getGroup = $this->whatsapp->watzap_get_group();

        $id     = $this->input->post('id');
        $status = $this->input->post('status');

        $update = $this->Task_model->change_status($id, $status);

        if ($update) {
            $response = array(
                'code'    => 200,
                'status'  => 'success',
                'message' => 'Berhasil Ganti Status',
                'meta'    => [
                    'header_status_code' => 200,
                ]
            );


            $getData     = $this->db->query("SELECT judul,description,status,created_by FROM list_task WHERE id_ticket = $id ")->result();

            $judul       = $getData[0]->judul;
            $desc        = $getData[0]->description;
            $status      = $getData[0]->status;
            $dibuat_oleh = $getData[0]->created_by;

            if ($status == '0') {
                $text_stat = 'Pending 🕑';
            } else if ($status == '1') {
                $text_stat = 'On Progress 🕒';
            } else if ($status == '2') {
                $text_stat = 'Selesai ✅';
            } else if ($status == '3') {
                $text_stat = 'Cancel ❌';
            }

            
            if ($status == '1' || $status == '2') {
                /* Group MILALA  */
                // $this->whatsapp->watzap_send_group('120363181634308281', "🔔*MANAGEMENT TASK*🔔\n\nJUDUL : " . $judul . "\nDESKRIPSI : " . $desc . "\nStatus : $text_stat\nDibuat oleh : " . $dibuat_oleh . "\nTanggal : " . date("Y-m-d H:i:s")  . "\n\nDitangani Oleh : " . $this->session->userdata('fullname') . "\n\n");

                /* Nomor Alwan */
                // $this->whatsapp->watzap_send('62895327120214', "🔔 * LIST TASK * 🔔\n\nJUDUL : " . $judul . "\nDESKRIPSI : " . $desc . "\nStatus : $text_stat\ndibuat oleh : " . $dibuat_oleh . "\n\nDitangani Oleh : " . $this->session->userdata('username') . "\n\n");
            }
        } else {
            $response = array(
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Data gagal diubah',
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
