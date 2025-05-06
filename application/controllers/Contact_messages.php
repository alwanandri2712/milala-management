<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_messages extends CI_Controller
{
    var $site_url = 'Contact_messages';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('Contact_model');
    }

    public function index()
    {
        $this->data['tittle']   = 'Pesan Kontak';
        $this->data['tittle_2'] = 'Pesan Kontak';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'contact_messages/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function ajax_datatable()
    {
        try {
            $list = $this->Contact_model->get_all_messages();
            $data = array();
            $no   = $_POST['start'];

            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = '<div class="dropdown">
                            <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="javascript:void(0)" onclick="view_data(' . "'" . $field->id . "'" . ')"><i class="fas fa-eye"></i> Lihat</a>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="mark_as_read(' . "'" . $field->id . "'" . ')"><i class="fas fa-check"></i> Tandai Dibaca</a>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="hapus_data(' . "'" . $field->id . "'" . ')"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                        </div>';
                $row[] = $field->name;
                $row[] = $field->phone;
                $row[] = $field->email;
                $row[] = $field->service;
                $row[] = substr($field->message, 0, 50) . (strlen($field->message) > 50 ? '...' : '');
                $row[] = $field->status == 'unread' ? "<span class='badge badge-danger'>Belum Dibaca</span>" : "<span class='badge badge-success'>Sudah Dibaca</span>";
                $row[] = date('d M Y H:i', strtotime($field->created_at));
                $data[] = $row;
            }
            $output = array(
                "draw"            => $_POST['draw'],
                "recordsTotal"    => count($list),
                "recordsFiltered" => count($list),
                "data"            => $data,
            );
            //output to json format
            echo json_encode($output);
        } catch (Exception $e) {
            // Log error
            log_message('error', 'Error in ajax_datatable: ' . $e->getMessage());
            
            // Return error response
            $output = array(
                "draw"            => isset($_POST['draw']) ? $_POST['draw'] : 0,
                "recordsTotal"    => 0,
                "recordsFiltered" => 0,
                "data"            => [],
                "error"           => $e->getMessage()
            );
            echo json_encode($output);
        }
    }

    public function get_data()
    {
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $data = $this->Contact_model->get_message_by_id($id);
            
            if ($data) {
                echo json_encode($data);
            } else {
                $response = array(
                    'code'    => 404,
                    'status'  => 'error',
                    'message' => 'Data tidak ditemukan',
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 404,
                    ]
                );
                toJson($response, $response['meta']['header_status_code']);
            }
        }
    }

    public function mark_as_read()
    {
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $update = $this->Contact_model->update_status($id, 'read');

            if ($update) {
                $response = array(
                    'code'    => 200,
                    'status'  => 'success',
                    'message' => 'Pesan berhasil ditandai sebagai dibaca',
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 200,
                    ]
                );
            } else {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Gagal menandai pesan sebagai dibaca',
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                );
            }

            toJson($response, $response['meta']['header_status_code']);
        }
    }

    public function delete()
    {
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $delete = $this->Contact_model->delete_message($id);

            if ($delete) {
                $response = array(
                    'code'    => 200,
                    'status'  => 'success',
                    'message' => 'Pesan berhasil dihapus',
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 200,
                    ]
                );
            } else {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Gagal menghapus pesan',
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                );
            }

            toJson($response, $response['meta']['header_status_code']);
        }
    }
}
