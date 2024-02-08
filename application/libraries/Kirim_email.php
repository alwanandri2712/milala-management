<?php
/**
 * 
 */
class Kirim_email
{
	protected $ci;

    /* Gmail */
	public $config = array(
		'protocol'    => 'smtp',
		'smtp_host'   => 'smtp.gmail.com',
		'smtp_port'   => '587',
		'smtp_user'   => 'disnakerenim@gmail.com',
		'smtp_pass'   => 'phgfipnvibfarrlp',
		'smtp_crypto' => 'tls',
		'mailtype'    => 'html',
		'charset'     => 'utf-8',
        'newline'     => "\r\n"
	);

    /* SMTP */
    // public $config = array(
	// 	'protocol'    => 'smtp',
	// 	'smtp_host'   => 'mail.domain.id',
	// 	'smtp_port'   => 465,
	// 	'smtp_user'   => 'alwan@domain.id',
	// 	'smtp_pass'   => 'xxxxxx',
	// 	'smtp_crypto' => 'ssl',
	// 	'mailtype'    => 'html',
	// 	'charset'     => 'iso-8859-1'
	// );

	public $email;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('email',$this->config);
	}
	public function send($data)
	{
        // $this->ci->email->initialize($this->config);
		$this->ci->email->from('disnakerenim@gmail.com','No Reply');
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
		$this->ci->email->from('disnakerenim@gmail.com','No Reply');
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
