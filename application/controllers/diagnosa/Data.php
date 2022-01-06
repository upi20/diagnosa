<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends Render_Controller
{


	public function index()
	{
		// Page Settings
		$this->title 					= 'Diagnosa';
		$this->content 					= 'diagnosa-data';
		$this->navigation 				= ['Diagnosa'];
		$this->plugins 					= ['select2'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Home';
		$this->breadcrumb_1_url 		= base_url() . 'home';
		$this->breadcrumb_2 			= 'Diagnosa';
		$this->breadcrumb_2_url 		= '#';

		// Send data to view
		$this->data['gejala'] 			= $this->diagnosa->getGejala();

		$this->render();
	}


	// Insert data
	public function insert()
	{
		$hittung 						= $this->input->post('hittung');

		$exedi 							= $this->diagnosa->insert_diagnosa();

		for ($i = 1; $i <= count($hittung); $i++) {
			$id 						= $this->input->post('id-' . $i);
			$optradio 					= $this->input->post('optradio-' . $i);
			$exede 						= $this->diagnosa->insert_diagnosa_detail($id, $optradio, $exedi);
		}
		$exeup 							= $this->diagnosa->update_diagnosa($exedi);
		redirect('diagnosa/data/hasil?diagnosa=' . $exedi, 'refresh');
	}

	// Hasil akhir
	public function hasil()
	{
		$q 								= $this->input->get('diagnosa');
		$cek 							= $this->diagnosa->cek_diagnosa($q);

		// Page Settings
		$this->title 					= 'Hasil Diagnosa';
		$this->content 					= 'diagnosa-detail';
		$this->navigation 				= ['Diagnosa'];
		$this->plugins 					= ['select2'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Home';
		$this->breadcrumb_1_url 		= base_url() . 'home';
		$this->breadcrumb_2 			= 'Diagnosa';
		$this->breadcrumb_2_url 		= base_url() . 'diagnosa/data';
		$this->breadcrumb_3 			= 'Hasil';
		$this->breadcrumb_3_url 		= base_url() . 'diagnosa/data/hasil?diagnosa=' . $q;

		// Send data to view
		$this->data['hasil'] 			= $cek;

		$this->render();
	}


	function __construct()
	{
		parent::__construct();
		$this->load->model('diagnosa/dataModel', 'diagnosa');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}
}

/* End of file Data.php */
/* Location: ./application/controllers/diagnosa/Data.php */