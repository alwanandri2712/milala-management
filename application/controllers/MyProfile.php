<?php

class MyProfile extends CI_Controller
{
  var $site_url = 'myprofile';
  public function __construct()
  {
    parent::__construct();
    $this->access->logged_in();
    $this->data['site_url'] = $this->site_url;
    $this->load->model('masterdata/User_model');
  }

  public function index()
  {
    $this->data['data_profile'] = $this->User_model->myAccount($this->session->userdata('id_users'))[0];
    $this->data['tittle']       = 'My profile';
    $this->data['tittle_2']     = '';
    $this->data['tittle_3']     = '';

    if ($this->session->userdata('id_role') == 3) { /* untuk halaman edit profile user perusahaan */
      $this->data['content']      = 'myprofilept';
    } elseif ($this->session->userdata('id_role') == 6) {
      $this->data['content']      = 'myprofile_peserta';
    } else {
      $this->data['content']      = 'my_profile';
    }

    $this->load->view('layout/themes', $this->data);
  }

  public function update()
  {
    if ($this->input->post()) {
      $id_user = $this->input->post('id_user');
      $param['where']['id_users'] = $id_user;
      $getImages = $this->User_model->get_all(0, 1, 'id_users', 'desc', $param);

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
        @unlink('./upload/mitra/' . $dataImages);

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
            'nik'                 => $this->security->xss_clean($this->input->post('nik_ktp')),
            'nip'                 => $this->input->post('nip_pegawai'),
            'fullname'            => $this->security->xss_clean($this->input->post('fullname')),
            'pendidikan_terakhir' => $this->security->xss_clean($this->input->post('pendidikan_terakhir')),
            'pengalaman_terakhir' => $this->security->xss_clean($this->input->post('pengalaman_terakhir')),
            'username'            => $this->security->xss_clean($this->input->post('username')),
            'no_telp'             => $this->security->xss_clean($this->input->post('phone')),
            'password'            => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
            'jabatan'             => $this->security->xss_clean($this->input->post('jabatan')),
            'tanggal_lahir'       => $this->input->post('tanggal_lahir'),
            'is_delete'           => $this->input->post('status'),
            'foto'                => $filename,
            'updated_date'        => date('Y-m-d H:i:s'),
            'updated_by'          => $this->session->userdata('username'),
          );
        } else {
          $data = array(
            'nik'                 => $this->security->xss_clean($this->input->post('nik_ktp')),
            'nip'                 => $this->input->post('nip_pegawai'),
            'fullname'            => $this->security->xss_clean($this->input->post('fullname')),
            'pendidikan_terakhir' => $this->security->xss_clean($this->input->post('pendidikan_terakhir')),
            'pengalaman_terakhir' => $this->security->xss_clean($this->input->post('pengalaman_terakhir')),
            'username'            => $this->security->xss_clean($this->input->post('username')),
            'email'               => $this->security->xss_clean($this->input->post('email')),
            'no_telp'             => $this->input->post('phone'),
            'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
            'jabatan'             => $this->security->xss_clean($this->input->post('jabatan')),
            'tanggal_lahir'       => $this->input->post('tanggal_lahir'),
            'is_delete'           => $this->input->post('status'),
            'foto'                => $filename,
            'updated_date'        => date('Y-m-d H:i:s'),
            'updated_by'          => $this->session->userdata('fullname'),
          );
        }
      } else {
        if (!empty($this->input->post('password')) || $this->input->post('password') != '') {
          $data = array(
            'nik'                 => $this->security->xss_clean($this->input->post('nik_ktp')),
            'nip'                 => $this->input->post('nip_pegawai'),
            'fullname'            => $this->security->xss_clean($this->input->post('fullname')),
            'pendidikan_terakhir' => $this->security->xss_clean($this->input->post('pendidikan_terakhir')),
            'pengalaman_terakhir' => $this->security->xss_clean($this->input->post('pengalaman_terakhir')),
            'username'            => $this->security->xss_clean($this->input->post('username')),
            'no_telp'             => $this->security->xss_clean($this->input->post('phone')),
            'password'            => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
            'jabatan'             => $this->input->post('jabatan'),
            'tanggal_lahir'       => $this->input->post('tanggal_lahir'),
            'is_delete'           => $this->input->post('status'),
            'updated_date'        => date('Y-m-d H:i:s'),
            'updated_by'          => $this->session->userdata('username'),
          );
        } else {
          $data = array(
            'nik'                 => $this->security->xss_clean($this->input->post('nik_ktp')),
            'nip'                 => $this->input->post('nip_pegawai'),
            'fullname'            => $this->security->xss_clean($this->input->post('fullname')),
            'pendidikan_terakhir' => $this->security->xss_clean($this->input->post('pendidikan_terakhir')),
            'pengalaman_terakhir' => $this->security->xss_clean($this->input->post('pengalaman_terakhir')),
            'username'            => $this->security->xss_clean($this->input->post('username')),
            'email'               => $this->input->post('email'),
            'no_telp'             => $this->input->post('phone'),
            'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
            'jabatan'             => $this->input->post('jabatan'),
            'tanggal_lahir'       => $this->input->post('tanggal_lahir'),
            'is_delete'           => $this->input->post('status'),
            'updated_date'        => date('Y-m-d H:i:s'),
            'updated_by'          => $this->session->userdata('fullname'),
          );
        }
      }

      $result = $this->User_model->update($id_user, $data);

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

  public function update_status_work()
  {
    if ($this->input->post()) {
      $id_users = $this->session->userdata('id_users');
      $status = $this->input->post('status');

      if ($id_users == '') {
        $response = array(
          'code'    => 400,
          'status'  => 'Session Expired',
          'message' => '',
          'meta'    => [
            'header_status_code' => 400
          ]
        );

        toJson($response, $response['meta']['header_status_code']);
      }

      try {
        $data = [
          'status_kerja' => $this->input->post('status'),
        ];

        $update = $this->User_model->update($id_users, $data);

        $response = array(
          'code'    => 200,
          'status'  => 'success',
          'message' => 'Data berhasil diubah',
          'meta'    => [
            'header_status_code' => 200
          ]
        );
      } catch (\Throwable $th) {
        $response = array(
          'code'    => 400,
          'status'  => 'error',
          'message' => 'Data gagal diubah',
          'meta'    => [
            'header_status_code' => 400
          ]
        );
      }
      
      toJson($response, $response['meta']['header_status_code']);
    }
  }
}
