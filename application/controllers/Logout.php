<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->access->logged_in();
    }
    
    public function index()
    {
        // session_destroy();
        $this->session->sess_destroy();
        redirect('Login');
    }
}
        
    /* End of file  Logout.php */
