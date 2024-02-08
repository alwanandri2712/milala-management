<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    var $site_url = 'Masterdata/User';

    public function __construct()
    {
        parent::__construct();
        $this->access->logged_in();
        // $this->access->is_admin();
        $this->data['site_url'] = $this->site_url;
        $this->load->model('masterdata/User_model', "user");
    }

    public function index()
    {
        $this->data['role']     = $this->user->getRole();
        
        if ($this->session->userdata('id_role') == 1) {
            $this->data['tittle']   = 'Data Master';
            $this->data['tittle_2'] = 'User';
            $this->data['tittle_3'] = '';   
            $this->data['content']  = 'masterdata/user/index';
        }

        $this->load->view('layout/themes', $this->data);
    }


    public function ajax_datatable()
    {
        $role = $this->input->post('role') ?? null;
        $list = $this->user->get_datatables($role);
        $data = array();
        $no   = $_POST['start'];

        foreach ($list as $field) {
            $no++;

            $id_user = "'" . $field->id_user . "'";
            $is_delete = $field->is_delete;
            if ($is_delete == 1) {
                $status = "<button class='btn btn-xs  btn-danger rounded-pill'>Inactived</button>";
            } elseif ($is_delete == 2) {
                $status = "<button class='btn btn-xs btn-warning rounded-pill'>Pending</button>";
            } elseif ($is_delete == 0) {
                $status = "<button class='btn btn-xs btn-success rounded-pill'>Actived</button>";
            } else {
                $status = "<button class='btn btn-xs  btn-danger rounded-pill'>Inactived</button>";
            }

            if ($field->img_usr == '') {
                $is_image = '<span class="badge badge-warning">No Image</span>';
            } else {
                $is_image = '<img src="' . base_url() . 'upload/users/' . $field->img_usr . '" style="width:50px;height:50px"/>';
            }

            $row = array();
            // $row[] = $no;

            $row[] = '
            <a href="javascript:;" onclick="editRow(' . $id_user . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
            <a href="javascript:;" onclick="deleteRow(' . $id_user . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
            ';
            
            $row[] = $field->id_user;
            $row[] = $is_image;
            $row[] = $field->fullname;
            $row[] = $field->username;
            $row[] = $field->nama_role;
            $row[] = $field->phone;
            $row[] = $field->is_delete > 0 ? "<button class='btn btn-danger btn-sm'>Inactived</button>" : "<button class='btn btn-success btn-xs'>Actived</button>";
            $row[] = $field->last_login;

            $data[] = $row;
        }
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->user->count_all($role),
            "recordsFiltered" => $this->user->count_filtered($role),
            "data"            => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        if ($this->input->post()) {

            if ($this->input->post('id_role') == '') {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Role tidak boleh kosong',
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                );

                toJson($response, $response['meta']['header_status_code']);
            }

            if ($this->input->post('username') == '') {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Username tidak boleh kosong',
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                );

                toJson($response, $response['meta']['header_status_code']);
            }

            if ($this->input->post('phone') == '') {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Phone tidak boleh kosong',
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                );

                toJson($response, $response['meta']['header_status_code']);
            }

            if ($this->input->post('password') == '') {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Password tidak boleh kosong',
                    'meta'    => [
                        'header_status_code' => 400,
                    ]
                );

                toJson($response, $response['meta']['header_status_code']);
            }

            if ($this->input->post('foto_user') != 'kosong') {
                $config['upload_path']   = "./upload/users";
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 2048;
                $config['encrypt_name']  = true;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto_user')) {
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

                if ($this->session->userdata('id_role') == 5) { // role koordinator
                    $data = array(
                        'id_role'        => $this->input->post('id_role'),
                        'id_koordinator' => $this->session->userdata('id_user'),
                        'phone'          => $this->input->post('phone'),
                        'username'       => $this->security->xss_clean($this->input->post('username')),
                        'fullname'       => $this->security->xss_clean($this->input->post('fullname')),
                        'password'       => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'img_usr'        => $filename,
                        'is_delete'      => 0,
                        'created_date'   => date('Y-m-d H:i:s'),
                        'created_by'     => $this->session->userdata('username'),
                    );
                } else {
                    $data = array(
                        'id_role'       => $this->input->post('id_role'),
                        'phone'         => $this->input->post('phone'),
                        'username'      => $this->security->xss_clean($this->input->post('username')),
                        'fullname'      => $this->security->xss_clean($this->input->post('fullname')),
                        'password'      => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'img_usr'       => $filename,
                        'is_delete'     => 0,
                        'created_date'  => date('Y-m-d H:i:s'),
                        'created_by'    => $this->session->userdata('username'),
                    );

                }

            } else {

                if ($this->session->userdata('id_role') == 5) {
                    $data = array(
                        'id_koordinator' => $this->session->userdata('id_user'),
                        'id_role'        => $this->input->post('id_role'),
                        'phone'          => $this->input->post('phone'),
                        'username'       => $this->security->xss_clean($this->input->post('username')),
                        'fullname'       => $this->security->xss_clean($this->input->post('fullname')),
                        'password'       => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'is_delete'      => 0,
                        'created_date'   => date('Y-m-d H:i:s'),
                        'created_by'     => $this->session->userdata('username'),
                    );
                } else { 
                    $data = array(
                        'id_role'       => $this->input->post('id_role'),
                        'phone'         => $this->input->post('phone'),
                        'username'      => $this->security->xss_clean($this->input->post('username')),
                        'fullname'      => $this->security->xss_clean($this->input->post('fullname')),
                        'password'      => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'is_delete'     => 0,
                        'created_date'  => date('Y-m-d H:i:s'),
                        'created_by'    => $this->session->userdata('username'),
                    );
                }
            }


            $query = $this->user->add($data);

            if ($query) {
                $response = array(
                    'code'    => 200,
                    'id'      => $query,
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
    }

    public function delete()
    {
        if ($this->input->post()) {
            $this->user->delete($this->input->post('id'));

            $response = array(
                'code'    => 200,
                'status'  => 'success',
                'message' => 'Data berhasil di hapus',
                'meta'    => [
                    'header_status_code' => 200,
                ]
            );
        } else {
            $response = array(
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Data gagal Di hapus',
                'meta'    => [
                    'header_status_code' => 400,
                ]
            );
        }

        toJson($response, $response['meta']['header_status_code']);
    }

    public function edit()
    {
        if ($this->input->post()) {
            $id_user = $this->input->post('id');
            $params['where']['id_user'] = $id_user;
            $result = $this->user->get_all(null, null, 'id_user', 'asc', $params);

            $response = $result['results'][0] ?? new stdClass;
            echo json_encode($response);
        }
    }

    public function update()
    {
        if ($this->input->post()) {
            $id_user = $this->input->post('id_user');
            $param['where']['id_user'] = $id_user;
            $getImages = $this->user->get_all(0, 1, 'id_user', 'desc', $param);

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

            if ($this->input->post('foto_user') != 'kosong') {
                /* ini buat remove gambar sebelumnya biar ga beratin server */
                $dataImages = $getImages['results'][0]->foto;
                unlink('./upload/users/' . $dataImages);

                $config['upload_path']   = "./upload/users";
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 2048;
                $config['encrypt_name']  = true;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto_user')) {
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

                if (!empty($this->input->post('password')) || $this->input->post('password') != '') {
                    $data = array(
                        'id_role'       => $this->input->post('id_role'),
                        'fullname'      => $this->security->xss_clean($this->input->post('fullname')),
                        'username'      => $this->security->xss_clean($this->input->post('username')),
                        'phone'         => $this->security->xss_clean($this->input->post('phone')),
                        'password'      => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'is_delete'     => $this->input->post('status'),
                        'img_usr'          => $filename,
                        'update_date'  => date('Y-m-d H:i:s'),
                        'update_by'    => $this->session->userdata('username'),
                    );
                } else {
                    $data = array(
                        'id_role'      => $this->input->post('id_role'),
                        'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
                        'username'     => $this->security->xss_clean($this->input->post('username')),
                        'email'        => $this->security->xss_clean($this->input->post('email')),
                        'phone'        => $this->input->post('phone'),
                        'is_delete'    => $this->input->post('status'),
                        'img_usr'      => $filename,
                        'update_date' => date('Y-m-d H:i:s'),
                        'update_by'   => $this->session->userdata('fullname'),
                    );
                }
            } else {
                if (!empty($this->input->post('password')) || $this->input->post('password') != '') {
                    $data = array(
                        'id_role'      => $this->input->post('id_role'),
                        'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
                        'username'     => $this->security->xss_clean($this->input->post('username')),
                        'phone'        => $this->security->xss_clean($this->input->post('phone')),
                        'password'     => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'is_delete'    => $this->input->post('status'),
                        'update_date' => date('Y-m-d H:i:s'),
                        'update_by'   => $this->session->userdata('username'),
                    );
                } else {
                    $data = array(
                        'id_role'      => $this->input->post('id_role'),
                        'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
                        'username'     => $this->security->xss_clean($this->input->post('username')),
                        'phone'        => $this->input->post('phone'),
                        'is_delete'    => $this->input->post('status'),
                        'update_date' => date('Y-m-d H:i:s'),
                        'update_by'   => $this->session->userdata('fullname'),
                    );
                }
            }

            $result = $this->user->update($id_user, $data);

            if ($result) {
                $response = array(
                    'code'    => 200,
                    'status'  => 'success',
                    'message' => 'Data berhasil diubah',
                    'meta'    => [
                        'header_status_code' => 200
                    ]
                );
            } else {
                $response = array(
                    'code'    => 400,
                    'status'  => 'error',
                    'message' => 'Data gagal diubah',
                    'meta'    => [
                        'header_status_code' => 400
                    ]
                );
            }
        } else {
            $response = array(
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Data gagal diubah',
                // 'data'    => $data,
                'meta'    => [
                    'header_status_code' => 400
                ]
            );
        }

        toJson($response, $response['meta']['header_status_code']);
    }

    public function verify()
    {
        if ($this->input->post()) {
            if ($this->session->userdata('id_role') == 1) { /* hanya role administrator Yang boleh Verifikasi  */
                $id = $this->input->post('id');

                $data = [
                    'is_verified' => '1'
                ];

                $update = $this->user->update($id, $data);

                if ($update) {
                    $response = array(
                        'code'    => 200,
                        'status'  => 'success',
                        'message' => 'Berhasil Verifikasi',
                        'data'    => $update,
                        'meta'    => [
                            'header_status_code' => 200
                        ]
                    );
                    toJson($response, $response['meta']['header_status_code']);
                } else {
                    $response = array(
                        'code'    => 400,
                        'status'  => 'error',
                        'message' => 'Gagal Verifikasi',
                        'data'    => $update,
                        'meta'    => [
                            'header_status_code' => 400
                        ]
                    );
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
