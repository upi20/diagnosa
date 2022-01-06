<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Render_Controller {


	public function index()
	{
		// Page Settings
		$this->title 					= 'Home';
		$this->content 					= 'home';
		$this->navigation 				= ['Home'];
		$this->plugins 					= [];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Home';
		$this->breadcrumb_1_url 		= base_url() . 'home';

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

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */