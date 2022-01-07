<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends Render_Controller
{

	public function index()
	{
		$this->sesion->cek_login();

		// Page Settings
		$this->title 				= 'Registrasi';
		$this->content 				= 'registrasi';
		$this->navigation 			= [];

		$this->render();
	}


	public function submit()
	{
		$email 		= $this->input->post('email');
		$phone 		= $this->input->post('phone');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');

		// Cek login ke model
		$login 		= $this->registrasi->submit($email, $phone, $username, $password);


		$this->output_json(1);
	}


	function __construct()
	{
		parent::__construct();
		$this->load->model('registrasiModel', 'registrasi');
		$this->default_template = 'templates/registrasi';
		$this->load->library('plugin');
		$this->load->helper('url');
	}
}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */