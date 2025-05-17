<?php
/**
 * 
 */
class Kirim_email
{
	protected $ci;

    /* Gmail */
	// public $config = array(
	// 	'protocol'    => 'smtp',
	// 	'smtp_host'   => 'smtp.gmail.com',
	// 	'smtp_port'   => '587',
	// 	'smtp_user'   => 'emailkamu@gmail.com',
	// 	'smtp_pass'   => 'password_secret',
	// 	'smtp_crypto' => 'tls',
	// 	'mailtype'    => 'html',
	// 	'charset'     => 'utf-8',
    //     'newline'     => "\r\n"
	// );

    /* SMTP */
    public $config = array(
		'protocol'    => 'smtp',
		'smtp_host'   => 'mail.milalaautoservice.com',
		'smtp_port'   => 587,
		'smtp_user'   => 'info@milalaautoservice.com',
		'smtp_pass'   => '#!MiL4L4366PSM!',
		'smtp_crypto' => 'tls',
		'mailtype'    => 'text',
		'charset'     => 'utf-8',
        'newline'     => "\r\n",
        'wordwrap'    => TRUE,
        'wrapchars'   => 70,
        'validate'    => FALSE,
        'priority'    => 3,
        'crlf'        => "\r\n"
	);

	public $email;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('email',$this->config);
	}
	public function send($data)
	{
        // Reset email settings
        $this->ci->email->clear(TRUE);
        
        // Clone config untuk menghindari perubahan pada config global
        $config = $this->config;
        
        // Set mailtype berdasarkan parameter
        if (isset($data['is_html']) && $data['is_html'] === true) {
            $config['mailtype'] = 'html';
        } else {
            $config['mailtype'] = 'text';
            // Pastikan pesan teks diproses dengan wordwrap
            if (isset($data['message'])) {
                $data['message'] = wordwrap($data['message'], 70, "\r\n");
            }
        }
        
        // Initialize with config
        $this->ci->email->initialize($config);
        
        // Set email data
        $this->ci->email->from('info@milalaautoservice.com', 'Milala Auto Service');
        $this->ci->email->to($data['to']);
        $this->ci->email->subject($data['subject']);
        $this->ci->email->message($data['message']);
        
        // Send email
        $send = $this->ci->email->send(FALSE); // FALSE untuk mendapatkan debug info
        
        if (!$send) {
            // Log the error
            log_message('error', 'Email Error: ' . $this->ci->email->print_debugger());
            
            // Return error details
            return [
                'status' => false,
                'error' => $this->ci->email->print_debugger()
            ];
        }
        
        return ['status' => true];
	}
	public function send_test($to)
	{
		$this->ci->email->from('info@milalaautoservice.com','No Reply');
		$this->ci->email->to($to);
		$this->ci->email->subject("Test Send Email");
		$this->ci->email->message("Test Send Email Dengan Smtp");

		if($this->ci->email->send(TRUE)){
			return "Ok";
		} else {
			return $this->email->print_debugger('body');
		}
	}
}
