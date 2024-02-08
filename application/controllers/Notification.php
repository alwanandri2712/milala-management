<?php

class Notification extends CI_Controller
{
  var $site_url = 'Notification';
  public function __construct()
  {
    parent::__construct();
    $this->access->logged_in();
    $this->data['site_url'] = $this->site_url;
  }

  public function index()
  {
    $this->data['tittle']       = 'Notification';
    $this->data['tittle_2']     = 'List';
    $this->data['tittle_3']     = '';
    $this->data['content']      = 'notification/index';
    $this->load->view('layout/themes', $this->data);
  }

  public function list()
  {
    $offset = ($this->input->get('offset')) ? $this->input->get('offset') : 0;
    $limit  = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
    $order  = ($this->input->get('order')) ? $this->input->get('order') : 'created_date';
    $sort   = ($this->input->get('sort')) ? $this->input->get('sort') : 'desc';

    $param = array();

    $param['where']['to_user_id'] = $this->session->userdata('id_users');
    $res  = $this->api_model->get_all('notification', $offset, $limit, $order, $sort, $param, true, 0);
    $data = $res['results_array'];

    if ($res['total_results'] > 0) {
      $response = [
        'code'        => 200,
        'status'      => 'success',
        'total_items' => $res['total_results'],
        'data'        => $data,
        'meta'        => [
          'header_status_code' => 200
        ]
      ];
      toJson($response, $response['meta']['header_status_code']);
    } else {
      $response = [
        'code'   => 200,
        'status' => 'Not Found',
        'data'   => [],
        'meta'   => [
          'header_status_code' => 200
        ]
      ];
      toJson($response, $response['meta']['header_status_code']);
    }
  }

  public function mark_as_read_all()
  {
    $userID = $this->session->userdata('id_users');

    $param['where']['to_user_id'] = $userID;
    $data = [
      'read_notif' => '1'
    ];

    $update = $this->api_model->edit_where('notification', $param, $data);

    if ($update) {
      $response = [
        'code'   => 200,
        'status' => 'success',
        'meta'   => [
          'header_status_code' => 200
        ]
      ];

      toJson($response, $response['meta']['header_status_code']);
    } else {
      $response = [
        'code'   => 400,
        'status' => 'Failed',
        'meta'   => [
          'header_status_code' => 400
        ]
      ];

      toJson($response, $response['meta']['header_status_code']);
    }
  }
}
