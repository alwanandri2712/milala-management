<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Bantuan extends CI_Controller
{
    var $site_url = 'Bantuan';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('Bantuan_model');
        $this->load->library('kirim_email');
    }

    public function index()
    {
        $this->data['tittle']   = 'Bantuan';
        $this->data['tittle_2'] = 'Bantuan';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'bantuan/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function email_view()
    {

        $this->data['judul_laporan'] = 'Jalan Rusak	';
        $this->data['message']       = 'hehe';
        $message                     = $this->load->view('email/balasan_bantuan', $this->data);

        $data_kirim = array(
            'to'      => 'alwanputra2712@gmail.com',
            'subject' => 'Balasan Laporan Bantuan',
            'message' => $message
        );

        $send = $this->kirim_email->send($data_kirim);
        dd($send);
    }

    public function send_email_balasan()
    {
        $this->data['judul_laporan'] = $this->input->post('judul_laporan');
        $this->data['message']       = $this->input->post('tanggapan');
        $message                     = $this->load->view('email/balasan_bantuan', $this->data, true);

        $data_kirim = array(
            'to'      => $this->input->post('email'),
            'subject' => 'Balasan Laporan Bantuan',
            'message' => $message
        );

        $send = $this->kirim_email->send($data_kirim);

        if ($send) {
            $response = array(
                'code'    => 200,
                'status'  => 'success',
                'message' => 'Berhasil Mengirim Balasan',
                'meta'    => [
                    'header_status_code' => 200,
                ]
            );
        } else {
            $response = array(
                'code'    => 400,
                'status'  => 'failed',
                'message' => 'Gagal Mengirim Balasan',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            );
        }

        toJson($response, $response['meta']['header_status_code']);
    }


    public function ajax_datatable()
    {
        $list = $this->Bantuan_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $id = "'" . $field->id . "'";
            $email = "'" . $field->email . "'";
            $judul_laporan = "'" . $field->title . "'";
            // $row[] = $no;
            $row[] = '
              <a href="javascript:;" onclick="kirim_balasan(' . $email . ','.$judul_laporan.')"><i class="fa fa-paper-plane wd-15 ht-15 stroke-wd-3 text-warning"></i></a>
              <a href="javascript:;" onclick="edit(' . $id . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
              <a href="javascript:;" onclick="deleteRow(' . $id . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
            ';

            if ($field->image == '') {
                $is_image = '<span class="badge badge-warning">No Image</span>';
            } else {
                $is_image = '<img src="' . base_url() . 'upload/bantuan/' . $field->image . '" style="width:60px;height:60px"/>';
            }

            $row[] = $is_image;
            $row[] = $field->title;
            $row[] = $field->fullname;
            $row[] = $field->email;
            $row[] = $field->status == 0 ? "<button class='btn btn-success btn-sm'>Open</button>" : "<button class='btn btn-danger btn-sm'>Closed</button>";
            $row[] = $field->created_by;
            $row[] = $field->created_date;
            $data[] = $row;
        }
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Bantuan_model->count_all(),
            "recordsFiltered" => $this->Bantuan_model->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        if ($this->input->post('title') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'failed',
                'message' => 'Judul Laporan is required',
                'meta'    => [
                    'header_status_code' => 400
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('fullname') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'failed',
                'message' => 'Nama Pelapor is required',
                'meta'    => [
                    'header_status_code' => 400
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('email') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'failed',
                'message' => 'Email is required',
                'meta'    => [
                    'header_status_code' => 400
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('status') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'failed',
                'message' => 'Status is required',
                'meta'    => [
                    'header_status_code' => 400
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }


        if ($this->input->post('logo_mitra') != 'kosong') {
            $config['upload_path']   = "./upload/bantuan";
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo_mitra')) {
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
                'image'        => $filename,
                'title'        => $this->security->xss_clean($this->input->post('title')),
                'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
                'email'        => $this->security->xss_clean($this->input->post('email')),
                'status'       => $this->input->post('status'),
                'description'  => $this->input->post('description'),
                'created_date' => date('Y-m-d H:i:s'),
                'created_by'   => $this->session->userdata('fullname'),
            ];
        } else {
            $data = [
                'title'        => $this->security->xss_clean($this->input->post('title')),
                'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
                'email'        => $this->security->xss_clean($this->input->post('email')),
                'status'       => $this->input->post('status'),
                'description'  => $this->input->post('description'),
                'created_date' => date('Y-m-d H:i:s'),
                'created_by'   => $this->session->userdata('fullname'),
            ];
        }


        $insert = $this->Bantuan_model->add($data);

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
            $id = $this->input->post('id');

            $param['where']['id'] = $id;
            $getImages = $this->Bantuan_model->get_all(0, 1, 'id', 'desc', $param);

            if (!$getImages['results']) {
                $response = array(
                    'status'  => 'error',
                    'message' => 'Data tidak ditemukan',
                    'data'    => new stdClass(),
                    'meta'    => [
                        'header_status_code' => 404
                    ]
                );

                toJson($response, $response['meta']['header_status_code']);
            }

            if ($this->input->post('logo_mitra') != 'kosong') {
                /* ini buat remove gambar sebelumnya biar ga beratin server */
                $dataImages = $getImages['results'][0]->image;
                @unlink('./upload/bantuan/' . $dataImages);

                $config['upload_path']   = "./upload/bantuan";
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 2048;
                $config['encrypt_name']  = true;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('logo_mitra')) {
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
                    'image'        => $filename,
                    'title'        => $this->security->xss_clean($this->input->post('title')),
                    'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
                    'email'        => $this->security->xss_clean($this->input->post('email')),
                    'status'       => $this->input->post('status'),
                    'description'  => $this->input->post('description'),
                    'created_date' => date('Y-m-d H:i:s'),
                ];
            } else {
                $data = [
                    'title'        => $this->security->xss_clean($this->input->post('title')),
                    'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
                    'email'        => $this->security->xss_clean($this->input->post('email')),
                    'status'       => $this->input->post('status'),
                    'description'  => $this->input->post('description'),
                ];
            }

            $update = $this->Bantuan_model->edit($id, $data);

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
        $param['where']['id']  = $id;
        $getData = $this->Bantuan_model->get_all(0, 1, 'id', 'desc', $param);
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
        $param['where']['id'] = $id;
        $getImages = $this->Bantuan_model->get_all(0, 1, 'id', 'desc', $param);
        if (!$getImages['results']) {
            $response = array(
                'status'  => 'error',
                'message' => 'Data tidak ditemukan',
                'data'    => new stdClass(),
                'meta'    => [
                    'header_status_code' => 404
                ]
            );
            toJson($response, $response['meta']['header_status_code']);
        }

        $dataImages = $getImages['results'][0]->image;
        $delete = $this->Bantuan_model->delete($id);

        /* ini buat hapus gambar di dalam folder bantuan */
        @unlink('./upload/bantuan/' . $dataImages);
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
                'meta'    => [
                    'header_status_code' => 400,
                ]
            );
        }
        toJson($response, $response['meta']['header_status_code']);
    }
}
