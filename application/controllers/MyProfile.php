<?php

class MyProfile extends CI_Controller
{
  var $site_url = 'MyProfile';
  public function __construct()
  {
    parent::__construct();
    $this->access->logged_in();
    $this->data['site_url'] = $this->site_url;
    $this->load->model('masterdata/User_model');
  }

  public function index()
  {
    $this->data['data_profile'] = $this->User_model->myAccount($this->session->userdata('id_user'))[0];
    // dd($this->data['data_profile']);
    $this->data['tittle']       = 'My profiles';
    $this->data['tittle_2']     = '';
    $this->data['tittle_3']     = '';

    $this->data['content']      = 'my_profile';

    $this->load->view('layout/themes', $this->data);
  }

  public function update()
  {
    if ($this->input->post()) {
      $id_user = $this->input->post('id_user');
      $param['where']['id_user'] = $id_user;
      $getImages = $this->User_model->get_all(0, 1, 'id_user', 'desc', $param);

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
        $dataImages = $getImages['results'][0]->img_usr;
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
            'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
            'phone'        => $this->security->xss_clean($this->input->post('phone')),
            'password'     => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'img_usr'      => $filename,
            'update_date' => date('Y-m-d H:i:s'),
            'update_by'   => $this->session->userdata('username'),
          );
        } else {
          $data = array(
            'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
            // 'username'     => $this->security->xss_clean($this->input->post('username')),
            'phone'        => $this->input->post('phone'),
            'img_usr'      => $filename,
            'update_date' => date('Y-m-d H:i:s'),
            'update_by'   => $this->session->userdata('fullname'),
          );
        }
      } else {
        if (!empty($this->input->post('password')) || $this->input->post('password') != '') {
          $data = array(
            'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
            // 'username'     => $this->security->xss_clean($this->input->post('username')),
            'phone'        => $this->security->xss_clean($this->input->post('phone')),
            'password'     => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'update_date' => date('Y-m-d H:i:s'),
            'update_by'   => $this->session->userdata('username'),
          );
        } else {
          $data = array(
            'fullname'     => $this->security->xss_clean($this->input->post('fullname')),
            // 'username'     => $this->security->xss_clean($this->input->post('username')),
            'phone'        => $this->input->post('phone'),
            'update_date' => date('Y-m-d H:i:s'),
            'update_by'   => $this->session->userdata('fullname'),
          );
        }
      }

      $result = $this->User_model->update($id_user, $data);

      if ($result) {
        $response = array(
          'code'    => 200,
          'status'  => 'success',
          'data'    => $result,
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

}
