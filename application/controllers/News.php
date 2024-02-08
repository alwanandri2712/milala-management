<?php
defined('BASEPATH') or exit('No direct script access allowed');


class News extends CI_Controller
{
    var $site_url = 'News';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('News_model');
        $this->load->model('News_category_model');
        $this->load->model('Artikel_model');
    }

    public function index()
    {
        $this->data['tittle']   = 'News';
        $this->data['tittle_2'] = 'News';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'news/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function artikel()
    {
        $this->data['tittle']   = 'News';
        $this->data['tittle_2'] = 'Artikel';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'news/artikel/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function category()
    {
        $this->data['tittle']   = 'News';
        $this->data['tittle_2'] = 'Category';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'news/category/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function add_news()
    {
        $this->data['kategori_berita'] = $this->News_category_model->getCategory();
        // dd($this->data['kategori_berita']);
        $this->data['tittle']          = 'News';
        $this->data['tittle_2']        = 'add';
        $this->data['tittle_3']        = '';
        $this->data['content']         = 'news/add';
        $this->load->view('layout/themes', $this->data);
    }

    public function add_artikel()
    {
        $this->data['kategori_berita'] = $this->News_category_model->getCategory();
        $this->data['tittle']          = 'Artikel';
        $this->data['tittle_2']        = 'add';
        $this->data['tittle_3']        = '';
        $this->data['content']         = 'news/artikel/add';
        $this->load->view('layout/themes', $this->data);
    }

    public function ajax_datatable()
    {
        $list = $this->News_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $news_id = "'" . $field->news_id . "'";
            $user_id = "'" . $field->user_id . "'";
            // $row[] = $no;
            if ($this->session->userdata('id_role') == 1) {
                $row[] = '
                  <a href="javascript:;" onclick="publish(' . $news_id . ',' . $user_id . ')" data-toggle="tooltip" data-placement="top" title="Publish"><i class="fas fa-check wd-15 ht-15 stroke-wd-3 text-success"></i></a>
                  <a href="' . base_url('news/edit_news/') . $field->news_id . '" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
                  <a href="javascript:;" onclick="deleteRow(' . $news_id . ')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
                ';
            } else {
                $row[] = '
                  <a href="' . base_url('news/edit_news/') . $field->news_id . '" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
                  <a href="javascript:;" onclick="deleteRow(' . $news_id . ')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
                ';
            }

            $row[] = '<img src="' . base_url() . 'upload/news/' . $field->news_image . '" style="width:50px;height:50px"/>';
            $row[] = $field->news_title;
            $row[] = $field->news_pageview;
            $row[] = $field->news_category_name;
            $row[] = $field->news_status == 0 ? "<button class='btn btn-danger btn-sm'>Pending</button>" : "<button class='btn btn-success btn-sm'>Published</button>";
            $row[] = $field->news_publish;
            $row[] = $field->created_by;
            $data[] = $row;
        }
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->News_model->count_all(),
            "recordsFiltered" => $this->News_model->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_datatable_artikel()
    {
        $list = $this->Artikel_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $row = array();
            $news_id = "'" . $field->news_id . "'";
            // $row[] = $no;
            if ($this->session->userdata('id_role') == 1) {
                $row[] = '
                  <a href="javascript:;" onclick="publish(' . $news_id . ')" data-toggle="tooltip" data-placement="top" title="Publish"><i class="fas fa-check wd-15 ht-15 stroke-wd-3 text-success"></i></a>
                  <a href="' . base_url('news/edit_artikel/') . $field->news_id . '" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
                  <a href="javascript:;" onclick="deleteRow(' . $news_id . ')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
                ';
            } else {
                $row[] = '
                <a href="' . base_url('news/edit_artikel/') . $field->news_id . '" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
                <a href="javascript:;" onclick="deleteRow(' . $news_id . ')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
              ';
            }

            $row[] = '<img src="' . base_url() . 'upload/news/' . $field->news_image . '" style="width:50px;height:50px"/>';
            $row[] = $field->news_title;
            $row[] = $field->news_pageview;
            $row[] = $field->news_category_name;
            $row[] = $field->news_status == 0 ? "<button class='btn btn-danger btn-sm'>Pending</button>" : "<button class='btn btn-success btn-sm'>Published</button>";
            $row[] = $field->news_publish;
            $row[] = $field->created_by;
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
    }

    public function ajax_datatable_category()
    {
        $list = $this->News_category_model->get_datatables();
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
            "recordsTotal"    => $this->News_category_model->count_all(),
            "recordsFiltered" => $this->News_category_model->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        if ($this->input->post('news_title') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'failed',
                'message' => 'News Title is required',
                'meta'    => [
                    'header_status_code' => 400
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        if ($this->input->post('news_category') == '') {
            $response = [
                'code'    => 400,
                'status'  => 'failed',
                'message' => 'News Category is required',
                'meta'    => [
                    'header_status_code' => 400
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }

        $config['upload_path']   = "./upload/news";
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('news_image')) {
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
            'user_id'          => $this->session->userdata('id_users'),
            'news_category'    => $this->input->post('news_category'),
            'news_title'       => $this->security->xss_clean($this->input->post('news_title')),
            'news_tittle_slug' => strtolower(url_title($this->input->post('news_title'))),
            'news_content'     => $this->input->post('content_news'),
            'news_image'       => $filename,
            'created_by'       => $this->session->userdata('fullname'),
            'created_date'     => date('Y-m-d H:i:s'),
        ];

        $insert = $this->News_model->add($data);

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
                        'title'        => 'Meminta Verifikasi Publish News/Artikel - Dari User ' . $this->session->userdata('fullname'),
                        'description'  => '[Judul : ' . $data['news_title'] . ']',
                        'url'          => 'news/newslist'
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
            'name'         => $this->security->xss_clean($this->input->post('name_category')),
            'created_by'   => $this->session->userdata('fullname'),
            'created_date' => date('Y-m-d H:i:s'),
        );

        $insert = $this->News_category_model->add($data);

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

    public function edit_news($id = null)
    {
        $param['where']['news_id']  = $id;
        $getData = $this->News_model->get_all(0, 1, 'news_id', 'desc', $param);
        if ($getData['results'][0]->user_id == $this->session->userdata('id_users') || $this->session->userdata('id_role') == 1) {
            $this->data['data_news']    = $getData['results'][0];
            $this->data['kategori_berita'] = $this->News_category_model->getCategory();
            $this->data['tittle']         = 'News';
            $this->data['tittle_2']       = 'edit';
            $this->data['tittle_3']       = '';
            $this->data['content']        = 'news/edit';
            $this->load->view('layout/themes', $this->data);
        } else {
            redirect(base_url('news'));
        }
    }

    public function edit_artikel($id = null)
    {
        $param['where']['news_id']  = $id;
        $getData = $this->News_model->get_all(0, 1, 'news_id', 'desc', $param);
        $this->data['data_news']    = $getData['results'][0];
        $this->data['kategori_berita'] = $this->News_category_model->getCategory();
        $this->data['tittle']         = 'Artikel';
        $this->data['tittle_2']       = 'edit';
        $this->data['tittle_3']       = '';
        $this->data['content']        = 'news/artikel/edit';
        $this->load->view('layout/themes', $this->data);
    }

    public function edit($id = null)
    {
        /* ini buat proses simpan perubahan edit */
        if ($this->input->post('id')) {
            $id = $this->input->post('id');

            $param['where']['news_id'] = $id;
            $getImages = $this->News_model->get_all(0, 1, 'news_id', 'desc', $param);

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

            if ($this->input->post('news_image') != 'kosong') {
                /* ini buat remove gambar sebelumnya biar ga beratin server */
                $dataImages = $getImages['results'][0]->news_image;
                @unlink('./upload/news/' . $dataImages);

                $config['upload_path']   = "./upload/news";
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 2048;
                $config['encrypt_name']  = true;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('news_image')) {
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
                    'news_category'    => $this->input->post('news_category'),
                    'news_title'       => $this->security->xss_clean($this->input->post('news_title')),
                    'news_tittle_slug' => strtolower(url_title($this->input->post('news_title'))),
                    'news_content'     => $this->input->post('content_news'),
                    'news_image'       => $filename,
                ];
            } else {
                $data = [
                    'news_category'    => $this->input->post('news_category'),
                    'news_title'       => $this->security->xss_clean($this->input->post('news_title')),
                    'news_tittle_slug' => strtolower(url_title($this->input->post('news_title'))),
                    'news_content'     => $this->input->post('content_news'),
                ];
            }

            $update = $this->News_model->edit($id, $data);

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
        $getData = $this->News_model->get_all(0, 1, 'id', 'desc', $param);
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

    public function edit_category($id = null)
    {
        /* ini buat proses simpan perubahan edit */
        if ($this->input->post('id')) {
            $payload = ['name' => $this->security->xss_clean($this->input->post('nama_kategori'))];
            $update  = $this->News_category_model->edit($this->input->post('id'), $payload);

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
        $getData = $this->News_category_model->get_all(0, 1, 'id', 'desc', $param);
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
        $param['where']['news_id'] = $id;
        $getImages = $this->News_model->get_all(0, 1, 'news_id', 'desc', $param);
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

        $dataImages = $getImages['results'][0]->news_image;
        $delete = $this->News_model->delete($id);
        @unlink('./upload/news/' . $dataImages);

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

    public function delete_category($id = null)
    {
        $delete = $this->News_category_model->delete($id);
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

    public function publish()
    {
        if ($this->input->post()) {

            if ($this->session->userdata('id_role') == 1) { /* hanya role administrator Yang boleh publish */
                $id      = $this->input->post('id');
                $user_id = $this->input->post('user_id');

                $data = [
                    'news_status'  => '1',
                    'news_publish' => date('Y-m-d H:i:s')
                ];

                $update = $this->News_model->edit($id, $data);

                if ($update) {
                    $response = array(
                        'code'    => 200,
                        'status'  => 'success',
                        'message' => 'Berhasil Publish Berita',
                        'data'    => $update,
                        'meta'    => [
                            'header_status_code' => 200
                        ]
                    );


                    /* Kirim Ke List  Notifikasi */
                    $paramNews['where']['news_id'] = $id;
                    $getNews = $this->News_model->get_all(0, 1, 'news_id', 'desc', $paramNews);
                    $judulNews = $getNews['results'][0]->news_title;

                    $dataNotif = [
                        'title'       => 'Approved Publish Berita',
                        'description' => '[Judul : ' . $judulNews . '],Berhasil Publish Berita, Approve By ' . $this->session->userdata('fullname'),
                        'url'         => 'news/newslist'
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
