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
		'mailtype'    => 'html',
		'charset'     => 'utf-8',
        'newline'     => "\r\n"
	);

	public $email;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('email',$this->config);
	}
	public function send($data)
	{
        // $this->ci->email->initialize($this->config);
		$this->ci->email->from('info@milalaautoservice.com','No Reply');
		$this->ci->email->to($data['to']);
		$this->ci->email->subject($data['subject']);
		$this->ci->email->message($data['message']);
		if($this->ci->email->send(TRUE)){
			return true;
		} else {
            return false;
        } 
        // else {
        //     return false;
        //     // return $this->email->print_debugger(array('body'));
        // } 
		// else {
		// 	return $this->email->print_debugger(array('body'));
		// }
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
