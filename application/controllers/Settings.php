<?php

class Settings extends CI_Controller
{
    var $site_url = 'settings';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('UserGuide_model');
    }

    public function server()
    {
        $paramsSmtpUser['where']['name']      = 'smtp_email';
        $paramsSmtpPw['where']['name']        = 'smtp_password';
        $paramsApiGmaps['where']['name']      = 'api_key_gmaps';
        $paramsApiYoutube['where']['name']    = 'api_key_youtube';
        $paramsChannelIDYt['where']['name']   = 'channel_id_youtube';
        $paramsTokenFirebase['where']['name'] = 'token_firebase';

        $getDataApiKeyGmaps   = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $paramsApiGmaps);
        $getDataApiKeyYoutube = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $paramsApiYoutube);
        $getDataChannelIDYt   = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $paramsChannelIDYt);
        $getDataTokenFirebase = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $paramsTokenFirebase);
        $getDataSmtpEmail     = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $paramsSmtpUser);
        $getDataSmtpPw        = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $paramsSmtpPw);

        $this->data['data_smtp_email']      = $getDataSmtpEmail['results'][0]->value;
        $this->data['data_smtp_pw']         = $getDataSmtpPw['results'][0]->value;
        $this->data['data_api_key_gmaps']   = $getDataApiKeyGmaps['results'][0]->value;
        $this->data['data_api_key_youtube'] = $getDataApiKeyYoutube['results'][0]->value;
        $this->data['data_channel_id_yt']   = $getDataChannelIDYt['results'][0]->value;
        $this->data['data_token_firebase']  = $getDataTokenFirebase['results'][0]->value;
        $this->data['tittle']               = 'Setting';
        $this->data['tittle_2']             = 'Server';
        $this->data['tittle_3']             = '';
        $this->data['content']              = 'settings/server/index';
        $this->load->view('layout/themes', $this->data);
    }

    public function user_guide()
    {
        $params['where']['name'] = 'user_guide';
        $getDataUserGuide = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $params);
        $getRoles         = $this->api_model->get_all('roles', 0, 0, 'id_role', 'desc');

        $this->data['data_user_guide'] = base_url() . $getDataUserGuide['results'][0]->value;
        $this->data['data_roles']      = $getRoles['results'];
        $this->data['tittle']          = 'Setting';
        $this->data['tittle_2']        = 'User Guide';
        $this->data['tittle_3']        = '';
        $this->data['content']         = 'settings/server/user_guide';
        $this->load->view('layout/themes', $this->data);
    }

    public function ajax_datatable_user_guide()
    {
        $Idrole = $this->session->userdata('id_role');
        $list = $this->UserGuide_model->get_datatables($Idrole);
        $data = array();
        $no   = $_POST['start'];
  
        foreach ($list as $field) {
            $no++;
  
            $row = array();
            $id = "'" . $field->id . "'";

            if($Idrole == 1) {
                $row[] = '
                <a href="javascript:;" onclick="edit(' . $id . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
                <a href="javascript:;" onclick="deleteRow(' . $id . ')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
                ';
            }else{
                $row[] = '
                    <a target="_blank" href="' . base_url() . "upload/settings_server/" .$field->file.'"><i class="fas fa-info wd-15 ht-15 stroke-wd-3"></i></a>
                ';
            }
  
            $row[]  = $field->name;
            $row[]  = $field->nama_role;
            $row[]  = "<a href='" . base_url() . "upload/settings_server/" . $field->file . "' target='_blank'>" . $field->file . "</a>";
            $row[]  = $field->created_by;
            $row[]  = $field->created_date;
            $data[] = $row;
        }
  
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->UserGuide_model->count_all($Idrole),
            "recordsFiltered" => $this->UserGuide_model->count_filtered($Idrole),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function syarat_ketentuan()
    {
        $param['where']['name'] = 'syarat_ketentuan';
        $getDataVisi = $this->api_model->get_all('settings', 0, 1, 'id', 'desc', $param);

        $this->data['data']     = $getDataVisi['results'][0]->value;
        $this->data['tittle']   = 'Settings';
        $this->data['tittle_2'] = 'Syarat & Ketentuan';
        $this->data['tittle_3'] = '';
        $this->data['content']  = 'settings/pages/syarat_ketentuan';
        $this->load->view('layout/themes', $this->data);
    }

    public function add_userguide()
    {
        if ($this->session->userdata('id_role') == 1) {

            $config['upload_path']   = "./upload/settings_server";
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size']      = 10048;
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_user_guide')) {
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

            $dataInsert = [
                'name'         => $this->input->post('name'),
                'file'         => $filename,
                'id_role'      => $this->input->post('role'),
                'created_by'   => $this->session->userdata('username'),
                'created_date' => date('Y-m-d H:i:s')
            ];

            try {
                $insert = $this->UserGuide_model->add($dataInsert);
                if($insert) {
                    $response = [
                        'code'    => 200,
                        'id'      => $insert,
                        'status'  => 'success',
                        'message' => 'Data berhasil ditambahkan',
                        'data'    => $dataInsert,
                        'meta'    => [
                            'header_status_code' => 200,
                        ]
                    ];
                }else{
                    $response = [
                        'code'    => 400,
                        'status'  => 'error',
                        'message' => 'Data gagal ditambahkan',
                        'data'    => [],
                        'meta'    => [
                            'header_status_code' => 400,
                        ]
                    ];
                }

                toJson($response, $response['meta']['header_status_code']);

            } catch (\Throwable $th) {
                $response = [
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Failed : ' . $th->getMessage(),
                    'data'    => [],
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                ];

                toJson($response, $response['meta']['header_status_code']);
            }
            
        } else {
            $response = [
                'code'    => 401,
                'message' => "Unauthorized",
                'data'    => [],
                'meta'    => [
                    'header_status_code' => 401,
                ]
            ];
            toJson($response, $response['meta']['header_status_code']);
        }
    }

    public function edit_userguide($id = null)
    {
        if ($this->session->userdata('id_role') == 1) {
            /* ini buat proses simpan perubahan edit */
            if ($this->input->post('id')) {
                $id = $this->input->post('id');

                $param['where']['id'] = $id;
                $getData = $this->UserGuide_model->get_all(0, 1, 'id', 'desc', $param);
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
                }

                if ($_FILES && @$_FILES['file_user_guide']['name'] != null) {
                    
                    $config['upload_path']   = "./upload/settings_server";
                    $config['allowed_types'] = 'pdf|doc|docx';
                    $config['max_size']      = 10048;
                    $config['encrypt_name']  = true;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file_user_guide')) {
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
                    @unlink("./upload/settings_server/" . $getData['results'][0]->file);  
                }

                $data = [
                    'name'         => $this->input->post('name'),
                    'id_role'      => $this->input->post('role') ?? $getData['results'][0]->id_role,
                    'file'         => $filename ?? $getData['results'][0]->file,
                    'created_by'   => $this->session->userdata('username'),
                    'created_date' => date('Y-m-d H:i:s')
                ];

                $update = $this->UserGuide_model->edit($id, $data);

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
            $getData = $this->UserGuide_model->get_all(0, 1, 'id', 'desc', $param);
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
        } else {
            $response = [
                'code'    => 401,
                'message' => "Unauthorized",
                'data'    => [],
                'meta'    => [
                    'header_status_code' => 401,
                ]
            ];
            toJson($response, $response['meta']['header_status_code']);
        }
    }

    public function delete_userguide($id = null)
    {
        if ($this->session->userdata('id_role') == 1) {
            $param['where']['id'] = $id;
            $getData = $this->UserGuide_model->get_all(0, 1, 'id', 'desc', $param);
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
            }
            @unlink("./upload/settings_server/" . $getData['results'][0]->file);
            $delete = $this->UserGuide_model->delete($id);
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
        }else{
            $response = [
                'code'    => 401,
                'message' => "Unauthorized",
                'data'    => [],
                'meta'    => [
                    'header_status_code' => 401,
                ]
            ];
            toJson($response, $response['meta']['header_status_code']);
        }
    }

    public function update_server()
    {
        if ($this->input->post()) {
            $payloadEmailSmtp     = ['value'      => $this->input->post('email_smtp')];
            $payloadPaswordSmtp   = ['value'      => $this->input->post('password_smtp')];
            $payloadApiKeyGmaps   = ['value'      => $this->input->post('api_key_gmaps')];
            $payloadApiKeyYoutube = ['value'      => $this->input->post('api_key_youtube')];
            $payloadChannelIDYt   = ['value'      => $this->input->post('channel_id_youtube')];
            $payloadTokenFireBase = ['value'      => $this->input->post('token_firebase')];

            $paramEmailSmtp['where']['name']     = 'smtp_email';
            $paramPasswordSmtp['where']['name']  = 'smtp_password';
            $paramApiKeyGmaps['where']['name']   = 'api_key_gmaps';
            $paramApiKeyYoutube['where']['name'] = 'api_key_youtube';
            $paramChannelIDYt['where']['name']   = 'channel_id_youtube';
            $paramTokenFireBase['where']['name'] = 'token_firebase';

            $this->api_model->edit_where('settings', $paramEmailSmtp, $payloadEmailSmtp);
            $this->api_model->edit_where('settings', $paramPasswordSmtp, $payloadPaswordSmtp);
            $this->api_model->edit_where('settings', $paramApiKeyGmaps, $payloadApiKeyGmaps);
            $this->api_model->edit_where('settings', $paramApiKeyYoutube, $payloadApiKeyYoutube);
            $this->api_model->edit_where('settings', $paramChannelIDYt, $payloadChannelIDYt);
            $this->api_model->edit_where('settings', $paramTokenFireBase, $payloadTokenFireBase);

            $response = [
                'code'    => 200,
                'message' => "Update Berhasil",
                'data'    => [],
                'meta'    => [
                    'header_status_code' => 200,
                ]
            ];
        } else {
            $response = [
                'code'    => 400,
                'message' => "Method Not Allowed",
                'data'    => [],
                'meta'    => [
                    'header_status_code' => 400,
                ]
            ];
        }


        toJson($response, $response['meta']['header_status_code']);
    }

    public function update_syarat_ketentuan()
    {
        if ($this->input->post()) {

            $dataSejarah = [
                'value' => $this->input->post('description_syarat'),
            ];

            try {
                $param['where']['name'] = 'syarat_ketentuan';
                $update = $this->api_model->edit_where('settings', $param, $dataSejarah);

                $response = array(
                    'code'    => 200,
                    'status'  => 'success',
                    'message' => 'Data berhasil disimpan',
                    'meta'    => [
                        'header_status_code' => 200,
                    ]
                );
            } catch (\Throwable $th) {
                $response = [
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => $th->getMessage(),
                    'meta'    => [
                        'header_status_code' => 400
                    ]
                ];
            }

            toJson($response, $response['meta']['header_status_code']);
        }
    }
}
