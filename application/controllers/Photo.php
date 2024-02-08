<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Photo extends CI_Controller
{
    var $site_url = 'Photo';

    public function __construct()
    {
      parent::__construct();
      $this->access->logged_in();
      $this->data['site_url'] = $this->site_url;
      // $this->load->model('Gallery_model');
    }
    public function index()
    {
      $this->data['tittle']   = 'Photo';
      $this->data['content']  = 'tracking/photo/index';
      $this->load->view('layout/themes', $this->data);
    }
}
