<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Render_Controller {


	public function index()
	{
		if($this->session->userdata('data')['level'] == 'Pengguna')
		{
			redirect('home','refresh');
		}

		// Page Settings
		$this->title 					= 'Home';
		$this->content 					= '';
		$this->navigation 				= ['Dashboard'];
		$this->plugins 					= [];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';

		// Send data to view

		$this->render();
	}


	function __construct()
	{
		parent::__construct();
		$this->load->model('pengaturan/hakAksesModel', 'hakAkses');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */