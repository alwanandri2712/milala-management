<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My404 extends CI_Controller
{

  public function index()
  {
    // $this->data['tittle']   = '';
    // $this->data['tittle_2'] = '';
    // $this->data['tittle_3'] = '';
    // $this->data['content']  = 'notfound';
    // $this->load->view('layout/themes', $this->data);
    $this->load->view('notfound');
  }

  public function icikiwir()
  {
    $this->load->view('icikiwir');
  }
}


/* End of file My404.php */
/* Location: ./application/controllers/My404.php */