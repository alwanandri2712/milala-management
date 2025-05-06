<?php
/*
 Developer : Alwan Putra Andriansyah
*/

defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    var $site_url = 'control_landing/Artikel';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('control_landing/Artikel_model');
    }

    public function index()
    {
        $this->data['tittle']   = 'Artikel';
        $this->data['tittle_2'] = 'Artikel';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'control_landing/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function ajax_datatable()
    {
        try {
            $list = $this->Artikel_model->get_datatables();
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
                                <a class="dropdown-item" href="javascript:void(0)" onclick="edit_data(' . "'" . $field->artikel_id . "'" . ')"><i class="fas fa-edit"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="hapus_data(' . "'" . $field->artikel_id . "'" . ')"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                        </div>';
                $row[] = !empty($field->artikel_image) ? '<img src="' . base_url() . 'upload/artikel/' . $field->artikel_image . '" style="width:50px;height:50px"/>' : '<img src="' . base_url() . 'assets/img/no-image.png" style="width:50px;height:50px"/>';
                $row[] = $field->artikel_title;
                $row[] = !empty($field->artikel_kategori) ? $field->artikel_kategori : '<span class="text-muted">-</span>'; // Tampilkan kategori jika ada
                $row[] = isset($field->artikel_status) && $field->artikel_status == 1 ?
                    "<button class='btn btn-success btn-sm'>Published</button>" :
                    "<button class='btn btn-secondary btn-sm'>Draft</button>";
                $row[] = $field->created_by;
                $row[] = $field->created_date;
                $data[] = $row;
            }
            $output = array(
                "draw"            => $_POST['draw'],
                "recordsTotal"    => $this->Artikel_model->count_all(),
                "recordsFiltered" => $this->Artikel_model->count_filtered(),
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

    public function add()
    {
        if ($this->input->post()) {
            $config['upload_path']   = "./upload/artikel";
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = true;

            // Create directory if it doesn't exist
            if (!is_dir('./upload/artikel')) {
                mkdir('./upload/artikel', 0777, true);
            }

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('artikel_image')) {
                $response = [
                    'code'    => 400,
                    'message' => "Failed File Upload : " . $this->upload->display_errors(),
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                ];

                toJson($response, $response['meta']['header_status_code']);
            }

            $image_data = $this->upload->data();     // Data dari gambar yang diupload
            $filename   = $image_data['file_name'];  // Nama file gambar
            $data = [
                'user_id'      => $this->session->userdata('id_user'),
                'title'        => $this->security->xss_clean($this->input->post('title')),
                'title_slug'   => strtolower(url_title($this->input->post('title'))),
                'category'     => $this->security->xss_clean($this->input->post('category')),
                'content'      => $this->input->post('content'),
                'image'        => $filename,
                'status'       => $this->input->post('status'),
                'created_by'   => $this->session->userdata('fullname'),
                'created_date' => date('Y-m-d H:i:s'),
            ];

            $insert = $this->Artikel_model->add($data);

            if ($insert) {
                $response = array(
                    'code'    => 200,
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
    }

    public function edit()
    {
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $getImages = $this->Artikel_model->get_all(null, null, 'artikel_id', 'desc', ['where' => ['artikel_id' => $id]]);

            if ($this->input->post('artikel_image') != 'kosong') {
                /* ini buat remove gambar sebelumnya biar ga beratin server */
                $dataImages = $getImages['results'][0]->artikel_image;
                @unlink('./upload/artikel/' . $dataImages);

                $config['upload_path']   = "./upload/artikel";
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 2048;
                $config['encrypt_name']  = true;

                // Create directory if it doesn't exist
                if (!is_dir('./upload/artikel')) {
                    mkdir('./upload/artikel', 0777, true);
                }

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('artikel_image')) {
                    $response = [
                        'code'    => 400,
                        'message' => "Failed File Upload : " . $this->upload->display_errors(),
                        'data'    => [],
                        'meta'    => [
                            'header_status_code' => 400,
                        ]
                    ];

                    toJson($response, $response['meta']['header_status_code']);
                }

                $image_data = $this->upload->data();  // Data dari gambar yang diupload
                $filename   = $image_data['file_name'];
                $data = [
                    'title'      => $this->security->xss_clean($this->input->post('title')),
                    'title_slug' => strtolower(url_title($this->input->post('title'))),
                    'category'   => $this->security->xss_clean($this->input->post('category')),
                    'content'    => $this->input->post('content'),
                    'image'      => $filename,
                    'status'     => $this->input->post('status'),
                    'updated_by' => $this->session->userdata('fullname')
                ];
            } else {
                $data = [
                    'title'      => $this->security->xss_clean($this->input->post('title')),
                    'title_slug' => strtolower(url_title($this->input->post('title'))),
                    'category'   => $this->security->xss_clean($this->input->post('category')),
                    'content'    => $this->input->post('content'),
                    'status'     => $this->input->post('status'),
                    'updated_by' => $this->session->userdata('fullname')
                ];
            }

            $update = $this->Artikel_model->edit($id, $data);

            if ($update) {
                $response = array(
                    'code'    => 200,
                    'status'  => 'success',
                    'message' => 'Data berhasil diupdate',
                    'data'    => $data,
                    'meta'    => [
                        'header_status_code' => 200,
                    ]
                );
            } else {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Data gagal diupdate',
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
            $getImages = $this->Artikel_model->get_all(null, null, 'artikel_id', 'desc', ['where' => ['artikel_id' => $id]]);
            $dataImages = $getImages['results'][0]->artikel_image;
            @unlink('./upload/artikel/' . $dataImages);

            $delete = $this->Artikel_model->delete($id);

            if ($delete) {
                $response = array(
                    'code'    => 200,
                    'status'  => 'success',
                    'message' => 'Data berhasil dihapus',
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 200,
                    ]
                );
            } else {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Data gagal dihapus',
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                );
            }

            toJson($response, $response['meta']['header_status_code']);
        }
    }

    public function get_data()
    {
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $data = $this->Artikel_model->get_all(null, null, 'artikel_id', 'desc', ['where' => ['artikel_id' => $id]]);

            if (!empty($data['results'])) {
                $artikel = $data['results'][0];

                // Konversi nama field untuk kompatibilitas dengan form edit
                $response = array(
                    'id' => $artikel->artikel_id,
                    'title' => $artikel->artikel_title,
                    'title_slug' => $artikel->artikel_slug,
                    'category' => $artikel->artikel_kategori,
                    'content' => $artikel->artikel_content,
                    'image' => $artikel->artikel_image,
                    'status' => isset($artikel->artikel_status) ? $artikel->artikel_status : 1,
                    'created_by' => $artikel->created_by,
                    'created_date' => $artikel->created_date
                );

                echo json_encode($response);
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
}
