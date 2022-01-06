<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends Render_Controller {


	public function index()
	{
		// Page Settings
		$this->title 					= 'Saran Data';
		$this->content 					= 'saran-data';
		$this->navigation 				= ['Saran'];
		$this->plugins 					= ['datatables'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'Saran';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Data';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->saran->getAllData();
		$this->data['penyakit'] 		= $this->saran->getPenyakit();

		$this->render();
	}


	// Get data detail
	public function getDataDetail()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->saran->getDataDetail($id);

		$this->output_json(
		[
			'id' 			=> $exe['id_saran'],
			'penyakit' 		=> $exe['id_penyakit'],
			'user' 			=> $exe['id_user'],
			'judul' 		=> $exe['judul'],
			'keterangan' 	=> $exe['keterangan'],
		]);
	}


	// Insert data
	public function insert()
	{
		$penyakit 						= $this->input->post('penyakit');
		$judul 							= $this->input->post('judul');
		$keterangan 					= $this->input->post('keterangan');

		$exe 							= $this->saran->insert($penyakit, $judul, $keterangan);

		$this->output_json(
		[
			'id' 			=> $exe['id'],
			'dokter' 		=> $exe['dokter'],
			'penyakit' 		=> $exe['penyakit'],
			'judul' 		=> $judul,
			'keterangan' 	=> $keterangan,
		]);
	}


	// Update data
	public function update()
	{
		$id 							= $this->input->post('id');
		$penyakit 						= $this->input->post('penyakit');
		$judul 							= $this->input->post('judul');
		$keterangan 					= $this->input->post('keterangan');

		$exe 							= $this->saran->update($id, $penyakit, $judul, $keterangan);

		$this->output_json(
		[
			'id' 			=> $id,
			'dokter' 		=> $exe['dokter'],
			'penyakit' 		=> $exe['penyakit'],
			'judul' 		=> $judul,
			'keterangan' 	=> $keterangan,
		]);
	}


	// Delete data
	public function delete()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->saran->delete($id);

		$this->output_json(
		[
			'id' 			=> $id
		]);
	}


	function __construct()
	{
		parent::__construct();
		$this->load->model('saran/dataModel', 'saran');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}


}

/* End of file Data.php */
/* Location: ./application/controllers/saran/Data.php */