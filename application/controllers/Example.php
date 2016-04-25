<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {
	
	function __construct(){
	    parent::__construct();
	}
	
	public function index() {
		/**
		* 1 - Create an array with the email address of dest, email subject and email name of the sender, just like this:
		*/
		$user_data = array(
			'dest_email' => 'johndoe@gmail.com', 
			'subject' => 'Email Test',
			'sender_name' => "John Doe"
		);
		/**
		* 2 - Create an array with the data you want to have access in email template, just like this:
		*/
		$email_data = array(
			'name' => 'My Dest User', 
			'link' => 'A link to send to user'
		);
		/**
		* 3 - Load Library
		*/
		$this->load->library('email_sender');
		
		/**
		* 3 - Call function custom_email, which will send the email, passing the arrays you just create in the following order, and a last parameter called $template, which is the email template to use, located in application/views/emails folder
		*/
		$template = 'test_email' //No .php in the end
		if($this->send_email->custom_email($user_data, $email_data, $template)){
			echo "Email sent succesfully"
		}
	}
}
