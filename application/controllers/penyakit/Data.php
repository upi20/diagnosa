<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends Render_Controller {


	public function index()
	{
		// Page Settings
		$this->title 					= 'Penyakit Data';
		$this->content 					= 'penyakit-data';
		$this->navigation 				= ['Penyakit'];
		$this->plugins 					= ['datatables'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'Penyakit';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Data';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->penyakit->getAllData();

		$this->render();
	}


	// Get data detail
	public function getDataDetail()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->penyakit->getDataDetail($id);

		$this->output_json(
		[
			'id' 			=> $exe['id_penyakit'],
			'nama' 			=> $exe['nama'],
			'min' 			=> $exe['min_persentase'],
			'max' 			=> $exe['max_persentase'],
		]);
	}


	// Insert data
	public function insert()
	{
		$nama 							= $this->input->post('nama');
		$min 							= $this->input->post('min');
		$max 							= $this->input->post('max');

		$exe 							= $this->penyakit->insert($nama, $min, $max);

		$this->output_json(
		[
			'id' 			=> $exe['id'],
			'code' 			=> $exe['code'],
			'nama' 			=> $nama,
			'min' 			=> $min,
			'max' 			=> $max,
		]);
	}


	// Update data
	public function update()
	{
		$id 							= $this->input->post('id');
		$nama 							= $this->input->post('nama');
		$min 							= $this->input->post('min');
		$max 							= $this->input->post('max');

		$exe 							= $this->penyakit->update($id, $nama, $min, $max);

		$this->output_json(
		[
			'id' 			=> $id,
			'code' 			=> $exe['code'],
			'nama' 			=> $nama,
			'min' 			=> $min,
			'max' 			=> $max,
		]);
	}


	// Delete data
	public function delete()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->penyakit->delete($id);

		$this->output_json(
		[
			'id' 			=> $id
		]);
	}


	function __construct()
	{
		parent::__construct();
		$this->load->model('penyakit/dataModel', 'penyakit');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}


}

/* End of file Data.php */
/* Location: ./application/controllers/penyakit/Data.php */