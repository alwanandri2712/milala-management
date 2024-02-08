<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access
{

    private $CI;

    function __construct()
    {
        $this->CI = &get_instance();
        $this->load->database('default', TRUE);
        return TRUE;
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

    public function logged_in($redirect_to = null)
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            if ($redirect_to == null) {
                return TRUE;
            } else {
                redirect($redirect_to);
                return TRUE;
            }
        } else {
            redirect(base_url('login'));
        }
    }

    public function is_admin()
    {
        if ($this->session->userdata('id_role') == 1) {
            return TRUE;
        } else {
            redirect(base_url('Home'));
        }
    }

    public function UploadFile($input_name, $folder, $image = true)
    {
        $config['upload_path']   = "./upload/$folder/";
        if($image == true){
            $config['allowed_types'] = 'jpeg|jpg|png';
        }else{
            $config['allowed_types'] = 'pdf';
        }
        $config['max_size']      = 2048;
        $config['encrypt_name']  = true;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($input_name)) {
            $error = array('error' => $this->upload->display_errors());
            return false;
        } else {
            $image_data = $this->upload->data();  // Data dari gambar yang diupload
            $filename   = $image_data['file_name'];
            return $filename;
        }
    }

    public function UploadFileV2($input_name, $folder,$allowed_types)
    {
        $config['upload_path']   = "./upload/$folder/";
        $config['allowed_types'] = $allowed_types;
        $config['max_size']      = 2048;
        $config['encrypt_name']  = true;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($input_name)) {
            $error = array('error' => $this->upload->display_errors());
            return false;
        } else {
            $image_data = $this->upload->data();  // Data dari gambar yang diupload
            $filename   = $image_data['file_name'];
            return $filename;
        }
    }
}
