<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $p = "example98";
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function sender(){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'ourexample1@gmail.com',
			'smtp_pass' => $this->p,
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->load->library('email');

		$this->email->from('ourexample1@gmail.com', 'Your Name');
		$this->email->to('marjinyan95@gmail.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class from codeigniter.');

		if($this->email->send())
		{
			echo "email has been sent";
		}else{
			$this->email->print_debugger();
		}
	}
}


