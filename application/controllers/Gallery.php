<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gallery extends CI_Controller
{
    var $site_url = 'Gallery';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('Gallery_model');
        $this->load->model('Gallery_category_model');
    }

    public function foto()
    {
        $this->data['kategori'] = $this->Gallery_category_model->getCategory();
        $this->data['tittle']   = 'Gallery';
        $this->data['tittle_2'] = 'Foto';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'gallery/foto/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function video()
    {
        $this->data['kategori'] = $this->Gallery_category_model->getCategory();
        $this->data['tittle']   = 'Gallery';
        $this->data['tittle_2'] = 'Video';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'gallery/video/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function category_gallery()
    {
        $this->data['tittle']   = 'Gallery';
        $this->data['tittle_2'] = 'Category';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'gallery/category/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function ajax_datatable_foto()
    {
        $list = $this->Gallery_model->get_datatables('0');
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row     = array();
            $id      = "'" . $field->id . "'";
            $user_id = "'" . $field->user_id . "'";
            // $row[] = $no;

            if ($this->session->userdata('id_role') == 1) {
                $row[] = '
                  <a href="javascript:;" onclick="publish(' . $id . ',' . $user_id . ')" data-toggle="tooltip" data-placement="top" title="Publish"><i class="fas fa-check wd-15 ht-15 stroke-wd-3 text-success"></i></a>
                  <a href="javascript:;" onclick="edit(' . $id . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
                  <a href="javascript:;" onclick="deleteRow(' . $id . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
                ';
            } else {
                $row[] = '
                  <a href="javascript:;" onclick="edit(' . $id . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
                  <a href="javascript:;" onclick="deleteRow(' . $id . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
                ';
            }

            $row[]  = '<img src="' . base_url() . 'upload/gallery/foto/' . $field->path . '" style="width:60px;height:60px"/>';
            $row[]  = $field->title;
            $row[]  = $field->category_name;
            $row[]  = $field->status_verified == '1' ? "<span class='badge badge-success'>Published</span>" :  "<span class='badge badge-danger'>Pending</span>";
            $row[]  = $field->created_by;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Gallery_model->count_all('0'),
            "recordsFiltered" => $this->Gallery_model->count_filtered('0'),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_datatable_category()
    {
        $list = $this->Gallery_category_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $id = "'" . $field->id . "'";
            // $row[] = $no;
            $row[] = '
              <a href="javascript:;" onclick="deleteRow(' . $id . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
              <a href="javascript:;" onclick="edit(' . $id . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
            ';
            $row[] = $field->id;
            $row[] = $field->name;
            $row[] = $field->created_by;
            $row[] = $field->created_date;
            $data[] = $row;
        }
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Gallery_category_model->count_all(),
            "recordsFiltered" => $this->Gallery_category_model->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_datatable_video()
    {
        $list = $this->Gallery_model->get_datatables('1');
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $id = "'" . $field->id . "'";
            // $row[] = $no;

            if ($this->session->userdata('id_users') == 1) {
                $row[] = '
                  <a href="javascript:;" onclick="deleteRow(' . $id . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
                ';
            } else {
                $row[] = '';
            }

            $row[]  = $field->video_id;
            $row[] = '<img src="' . $field->path . '" style="width:50px;height:50px"/>';
            $row[]  = $field->title;
            $row[]  = '<a class="btn btn-sm btn-primary" href="' . $field->link . '" target="_blank">Click</a>';
            $row[]  = $field->created_by;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Gallery_model->count_all('1'),
            "recordsFiltered" => $this->Gallery_model->count_filtered('1'),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add_foto()
    {
        if ($this->input->post('title') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'failed',
                'message' => 'Mitra name is required',
                'meta'    => [
                    'header_status_code' => 400
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('category_id') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'failed',
                'message' => 'Category is required',
                'meta'    => [
                    'header_status_code' => 400
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        $config['upload_path']   = "./upload/gallery/foto";
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images')) {
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
            'user_id'      => $this->session->userdata('id_users'),
            'title'        => $this->security->xss_clean($this->input->post('title')),
            'category_id'  => $this->input->post('category_id'),
            'path'         => $filename,
            'created_by'   => $this->session->userdata('fullname'),
            'created_date' => date('Y-m-d H:i:s'),
        ];

        $insert = $this->Gallery_model->add($data);

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

            if ($this->session->userdata('id_role') != 1) {
                /* Kirim Ke List Notifikasi ke administrator */
                $getUserAdministrator = $this->db->select('id_users')->get_where('users', array('id_role' => 1))->result(); /* list user_id administrator */
                foreach ($getUserAdministrator as $key => $value) {
                    $to_user_id = $value->id_users;
    
                    $dataNotif = [
                        'title'        => 'Meminta Verifikasi Publish Gallery Foto - Dari User ' . $this->session->userdata('fullname'),
                        'description'  => '[Judul : ' . $data['title'] . ']',
                        'url'          => 'gallery/foto'
                    ];
                    $this->notification_list->insert($to_user_id, $dataNotif['title'], $dataNotif['description'], $dataNotif['url']);
                }
            }
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

    public function add_category()
    {
        $data = array(
            'name'         => $this->security->xss_clean($this->input->post('name')),
            'created_by'   => $this->session->userdata('fullname'),
            'created_date' => date('Y-m-d H:i:s'),
        );

        $insert = $this->Gallery_category_model->add($data);

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

    public function add_video()
    {
        $data = [
            'user_id'      => $this->session->userdata('id_users'),
            'title'        => $this->security->xss_clean($this->input->post('title')),
            'category_id'  => $this->input->post('category_id'),
            'path'         => $this->security->xss_clean($this->input->post('link')),
            'created_by'   => $this->session->userdata('fullname'),
            'type_galery'  => 1,
            'created_date' => date('Y-m-d H:i:s'),
        ];

        $insert = $this->Gallery_model->add($data);

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

    public function edit_video($id = null)
    {
        /* ini buat proses simpan perubahan edit */
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $param['where']['id'] = $id;
            $getImages = $this->Gallery_model->get_all(0, 1, 'id', 'desc', $param);

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
        }
    }

    public function edit($id = null)
    {
        /* ini buat proses simpan perubahan edit */
        if ($this->input->post('id')) {
            $id = $this->input->post('id');

            $param['where']['id'] = $id;
            $getImages = $this->Gallery_model->get_all(0, 1, 'id', 'desc', $param);

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
                $dataImages = $getImages['results'][0]->path;
                @unlink('./upload/gallery/foto/' . $dataImages);

                $config['upload_path']   = "./upload/gallery/foto";
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
                    'title'       => $this->security->xss_clean($this->input->post('mitra_name')),
                    'category_id' => $this->input->post('categori_id'),
                    'path'        => $filename,
                ];
            } else {
                $data = [
                    'title'       => $this->security->xss_clean($this->input->post('mitra_name')),
                    'category_id' => $this->input->post('categori_id'),
                ];
            }

            $update = $this->Gallery_model->edit($id, $data);

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
        $getData = $this->Gallery_model->get_all(0, 1, 'id', 'desc', $param);
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

    public function edit_category($id = null)
    {
        if ($this->input->post('id')) {
            $payload = ['title' => $this->security->xss_clean($this->input->post('nama_kategori'))];
            $update  = $this->Gallery_category_model->edit($this->input->post('id'), $payload);

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
        $getData = $this->Gallery_category_model->get_all(0, 1, 'id', 'desc', $param);
        if (!$getData['results']) {
            $response = array(
                'code'    => 400,
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
        $param['where']['id'] = $id;
        $getImages = $this->Gallery_model->get_all(0, 1, 'id', 'desc', $param);
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

        $dataImages = $getImages['results'][0]->path;
        $delete = $this->Gallery_model->delete($id);
        @unlink('./upload/gallery/foto/' . $dataImages);

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

    public function delete_category($id = null)
    {
        $param['where']['id'] = $id;
        $getImages = $this->Gallery_category_model->get_all(0, 1, 'id', 'desc', $param);
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

        $delete = $this->Gallery_category_model->delete($id);
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

    public function sync_youtube()
    {
        /* remove video sebelumnya  */
        $this->Gallery_model->removeAllAsync();

        $paramsApiYoutube['where']['name']  = 'api_key_youtube';
        $paramsChannelIDYt['where']['name'] = 'channel_id_youtube';

        $getDataChannelIDYt   = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $paramsChannelIDYt);
        $getDataApiKeyYoutube = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $paramsApiYoutube);

        $API_KEY    = $getDataApiKeyYoutube['results'][0]->value;
        $channelID  = $getDataChannelIDYt['results'][0]->value;
        $maxResults = 100;
        $getVideo   = curl_get('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=' . $channelID . '&maxResults=' . $maxResults . '&key=' . $API_KEY . '');

        $data = [];
        foreach ($getVideo->items as $key => $value) {
            if (isset($value->id->videoId)) {

                $checkVideoID = $this->db->get_where('gallery', ['video_id' => $value->id->videoId])->num_rows();

                if ($checkVideoID > 0) {
                    continue;
                }

                $data[] = [
                    'thumbnail' => $value->snippet->thumbnails->default->url,
                    'title'     => $value->snippet->title,
                    'videoId'   => $value->id->videoId,
                    'link'      => 'https://www.youtube.com/embed/' . $value->id->videoId
                ];

                $payloadUpdate = [
                    'video_id'     => $value->id->videoId,
                    'title'        => $value->snippet->title,
                    'path'         => $value->snippet->thumbnails->default->url,
                    'link'         => 'https://www.youtube.com/embed/' . $value->id->videoId,
                    'type_gallery' => '1',
                    'created_by'   => 'SYSTEM',
                    'created_date' => date('Y-m-d H:i:s')
                ];

                $insert = $this->Gallery_model->add($payloadUpdate);
            }
        }

        $response = [
            'code'    => 200,
            'status'  => 'success',
            'message' => 'Berhasil Sync Youtube',
            'data'    => $data,
            'meta'    => [
                'header_status_code' => 200
            ]
        ];

        toJson($response, $response['meta']['header_status_code']);
    }

    public function publish()
    {
        if ($this->input->post()) {

            if ($this->session->userdata('id_role') == 1) { /* hanya role administrator Yang boleh publish */
                $id      = $this->input->post('id');
                $user_id = $this->input->post('user_id');

                $data = [
                    'status_verified'     => '1',
                ];

                $update = $this->Gallery_model->edit($id, $data);

                if ($update) {
                    $response = array(
                        'code'    => 200,
                        'status'  => 'success',
                        'message' => 'Berhasil Publish Gallery Foto',
                        'data'    => $update,
                        'meta'    => [
                            'header_status_code' => 200
                        ]
                    );

                    /* Kirim Ke List Notifikasi */
                    $params['where']['id'] = $id;
                    $getData               = $this->Gallery_model->get_all(0, 1, 'id', 'desc', $params);
                    $judulFoto             = $getData['results'][0]->title;

                    $dataNotif = [
                        'title'        => 'Approved Publish Gallery Foto',
                        'description'  => '[Judul : ' . $judulFoto . '],Berhasil Publish Gallery Foto, Approve By ' . $this->session->userdata('fullname'),
                        'url'          => 'gallery/foto'
                    ];

                    $this->notification_list->insert($user_id, $dataNotif['title'], $dataNotif['description'], $dataNotif['url']);

                    toJson($response, $response['meta']['header_status_code']);
                }
            } else {
                $response = array(
                    'code'    => 401,
                    'status'  => 'error',
                    'message' => 'Unauthorized',
                    'data'    => new stdClass(),
                    'meta'    => [
                        'header_status_code' => 401
                    ]
                );
                toJson($response, $response['meta']['header_status_code']);
            }
        } else {
            $response = array(
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Bad Request',
                'data'    => new stdClass(),
                'meta'    => [
                    'header_status_code' => 400
                ]
            );
            toJson($response, $response['meta']['header_status_code']);
        }
    }
}
