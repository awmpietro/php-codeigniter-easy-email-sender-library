<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_email{

	public $ci;
	public $data;
	
	public function __construct() {
		$this->ci =& get_instance();
		$this->ci->load->library('Email');
		$this->ci->config->load('send_email');
	}
	
	public function custom_email($user_data, $email_data, $template){
		$config = array(
			'protocol' => $this->ci->config->item('protocol'),
			'smtp_host' => $this->ci->config->item('smtp_host'),
			'smtp_port' => $this->ci->config->item('smtp_port'),
			'smtp_user' => $this->ci->config->item('smtp_user'),
			'smtp_pass' => $this->ci->config->item('smtp_pass'),
			'charset' => $this->ci->config->item('charset'),
			'wordwrap'=> TRUE,
			'mailtype' => 'html'
		);
		$this->ci->email->initialize($config);
		$this->ci->email->set_newline("\r\n");
		$this->ci->email->from($this->ci->config->item('smtp_user'), $user_data['sender_name']));
		$this->ci->email->to($user_data['dest_email']);
		$this->ci->email->subject($user_data['subject']);
		$this->data = $email_data;
		$c['content'] = $this->ci->load->view("emails/{$template}", $this->data, true);
		$msg = $this->ci->load->view('emails/Layout', $c, true); 
		$this->ci->email->message($msg);
		if($this->ci->email->send()){
			return true;
		}else{
			throw new Exception($this->ci->email->print_debugger());
		}
	}
}
