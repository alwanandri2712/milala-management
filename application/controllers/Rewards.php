<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Rewards extends CI_Controller
{
  var $site_url = 'Rewards';

  public function __construct()
  {
    parent::__construct();
    $this->access->logged_in();
    $this->data['site_url'] = $this->site_url;
    $this->load->model('Rewards_track');
  }
  public function index()
  {
    $this->data['tittle']   = 'Rewards';
    $this->data['tittle_2']  = 'Rewards Track';
    $this->data['content']  = 'rewards/index';
    $this->load->view('layout/themes', $this->data);
  }

  public function ajax_datatable()
  {
    $list = $this->Rewards_track->get_datatables();
    $data = array();
    $no   = $_POST['start'];

    foreach ($list as $field) {
      $no++;

      $row = array();
      $id = "'" . $field->id . "'";
      $judul_laporan = "'" . $field->title . "'";
      // $row[] = $no;
      $row[] = '
              <a href="javascript:;" onclick="edit(' . $id . ')"><i class="fas fa-edit wd-15 ht-15 stroke-wd-3"></i></a>
              <a href="javascript:;" onclick="deleteRow(' . $id . ')"><i class="fas fa-trash wd-15 ht-15 stroke-wd-3 text-danger"></i></a>
            ';

      if ($field->image == '') {
        $is_image = '<span class="badge badge-warning">No Image</span>';
      } else {
        $is_image = '<img src="' . base_url() . 'upload/tracker-photo/' . $field->image . '" style="width:60px;height:60px"/>';
      }

      $row[] = $is_image;
      $row[] = $field->title;
      $row[] = $field->fullname;
      $row[] = $field->status == 0 ? "<button class='btn btn-success btn-sm'>Open</button>" : "<button class='btn btn-danger btn-sm'>Closed</button>";
      $row[] = $field->created_by;
      $row[] = $field->created_date;
      $data[] = $row;
    }
    $output = array(
      "draw"            => $_POST['draw'],
      "recordsTotal"    => $this->Rewards_track->count_all(),
      "recordsFiltered" => $this->Rewards_track->count_filtered(),
      "data"            => $data,
    );
    //output to json format
    echo json_encode($output);
  }

  public function addPhotos()
  {
    if ($this->input->post()) {

      $imageBase64 = $this->input->post('image');
      $folderPath     = "./upload/tracker-photo/";
      $image_parts    = explode(";base64,", $imageBase64);
      $image_type_aux = explode("image/", $image_parts[0]);
      $image_type     = $image_type_aux[1];
      $image_base64   = base64_decode($image_parts[1]);
      $fileName       = uniqid() . '.png';
      $file           = $folderPath . $fileName;

      $title       = $this->input->post('title');
      $fullname    = $this->input->post('fullname');
      $description = $this->input->post('description');
      $latLong     = $this->input->post('lat_long');

      // Validation
      $this->load->library('form_validation');
      $errorMessages = ['required' => '{field} Tidak Boleh Kosong.',];
      $this->form_validation->set_error_delimiters('', ''); // Remove the default error delimiters
      $this->form_validation->set_rules('title', 'Judul Tracker', 'required', $errorMessages);
      $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required', $errorMessages);
      $this->form_validation->set_rules('description', 'Deskripsi', 'required', $errorMessages);
      // $this->form_validation->set_rules('imageBase64', 'Gambar', 'required', $errorMessages);

      if ($this->form_validation->run() == FALSE) {
        $errors = $this->form_validation->error_array();
        $response = [
          'code'    => 402,
          'message' => array_values($errors)[0],
          'data'    => [],
          'meta'    => [
            'header_status_code' => 200,
          ]
        ];
        toJson($response, $response['meta']['header_status_code']);
        exit();
      }

      @file_put_contents($file, $image_base64);
      $data = array(
        'title'        => $title,
        'fullname'     => $fullname,
        'image'        => $fileName,
        'status'       => '0',
        'description'  => $description,
        'lat_long'     => $latLong,
        'created_date' => date('Y-m-d H:i:s'),
        'created_by'   => $this->session->userdata('username'),
      );

      try {
        $result = $this->Rewards_track->add($data);

        if ($result) {
          $response = array(
            'code'    => 200,
            'status'  => 'success',
            'message' => 'Success Insert Photos Tracker',
            'meta'    => [
              'header_status_code' => 200,
            ]
          );
        } else {
          $response = array(
            'code'    => 400,
            'status'  => 'error',
            'message' => 'Gagal Insert Photos Tracker',
            'meta'    => [
              'header_status_code' => 200,
            ]
          );
        }
        toJson($response, $response['meta']['header_status_code']);
      } catch (Exception $e) {
        $response = array(
          'code'    => 500,
          'status'  => 'error',
          'message' => $e->getMessage(),
          'meta'    => [
            'header_status_code' => 500,
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
          $getImages = $this->Rewards_track->get_all(0, 1, 'id', 'desc', $param);

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

      /* ini buat tampilin data ketika mau di edit */
      $param['where']['id']  = $id;
      $getData = $this->Rewards_track->get_all(0, 1, 'id', 'desc', $param);
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
      $getImages = $this->Rewards_track->get_all(0, 1, 'id', 'desc', $param);
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
      $delete = $this->Rewards_track->delete($id);
      
      /* ini buat hapus gambar di dalam folder bantuan */
      @unlink('./upload/tracker-photo/' . $dataImages);
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
