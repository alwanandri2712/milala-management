<?php
// require_once APPPATH . '/libraries/Libredis/autoload.php';
// set location asia jakarta
date_default_timezone_set('Asia/Jakarta');
header('Access-Control-Allow-Origin: *');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');

        // if ($this->session->userdata('logged_in') == true) {
        //     redirect('home');
        // }
    }

    public function index()
    {
        $this->load->view('v_login');
    }
    function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function get_browser()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "-";
        if (preg_match('/MSIE/i', $user_agent)) {
            $browser = "Internet Explorer";
        } else if (preg_match('/Firefox/i', $user_agent)) {
            $browser = "Mozilla Firefox";
        } else if (preg_match('/Chrome/i', $user_agent)) {
            $browser = "Google Chrome";
        } else if (preg_match('/Safari/i', $user_agent)) {
            $browser = "Apple Safari";
        } else if (preg_match('/Opera/i', $user_agent)) {
            $browser = "Opera";
        } else if (preg_match('/Netscape/i', $user_agent)) {
            $browser = "Netscape";
        }
        return $browser;
    }

    function getLocationCountry()
    {
    }
    public function history_login($user_id)
    {
        $ip = $this->get_client_ip();
        $browser = $this->get_browser();
        $data = array(
            'user_id'     => $user_id,
            'ip_address'  => $ip,
            'browser'     => $browser,
            'user_agents' => $_SERVER["HTTP_USER_AGENT"],
            'last_login'  => date("Y-m-d H:i:s")
        );

        return $data;
    }

    public function auth()
    {
        $username  = $this->input->post('username');
        $password  = $this->input->post('password');

        $where = array(
            "username" => $username,
        );

        $cek = $this->auth->action("v_users", $where)->num_rows();
        // Pengecekan data ,jika valid muncul datanya
        if ($cek > 0) {
            $nik           = array('username' => $username);
            $data          = $this->auth->action('v_users', $nik)->row_array();
            // dd($data['password']);
            if ($data['is_delete'] == 0) { // jika user aktif

                $checkPassword = password_verify($password, $data['password']);

                if ($checkPassword) {
                    $dataLogin     = array(
                        'last_login' => date("Y-m-d H:i:s")
                    );

                    $whereId = array(
                        'id_user' => $data['id_user']
                    );

                    $this->db->update('user', $dataLogin, $whereId);
                    $session_data = array_merge(
                        $data,
                        array(
                            'logged_in' => true,
                            'id_user'   => $data['id_user'],
                            'id_role'   => $data['id_role'],
                            'nama_role' => $data['nama_role'],
                            'fullname'  => $data['fullname'],
                            'username'  => $data['username'],
                            'nama_role' => $data['nama_role'],
                            'foto'      => $data['img_usr'],
                            'is_delete' => $data['is_delete'],
                        )
                    );

                    $dataHistoryLogin = $this->history_login($data['id_user']);
                    $this->db->insert('history_login', $dataHistoryLogin);
                    $this->session->set_userdata($session_data);

                    echo 'valid_login';
                } else {
                    echo 'wrong_password';
                }
            } else {
                echo 'inactive_account';
            }
        } else {
            echo "invalid_login";
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
