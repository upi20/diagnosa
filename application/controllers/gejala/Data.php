<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends Render_Controller
{


	public function index()
	{
		// Page Settings
		$this->title 					= 'Gejala Data';
		$this->content 					= 'gejala-data';
		$this->navigation 				= ['Gejala'];
		$this->plugins 					= ['datatables'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'Gejala';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Data';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->gejala->getAllData();
		$this->render();
	}


	// Get data detail
	public function getDataDetail()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->gejala->getDataDetail($id);

		$this->output_json(
			[
				'id' 			=> $exe['id_gejala'],
				'nama' 			=> $exe['nama'],
				'nilai' 		=> $exe['nilai'],
			]
		);
	}


	// Insert data
	public function insert()
	{
		$nama 							= $this->input->post('nama');
		$nilai 							= $this->input->post('nilai');

		$exe 							= $this->gejala->insert($nama, $nilai);

		$this->output_json(
			[
				'id' 			=> $exe['id'],
				'code' 			=> $exe['code'],
				'nama' 			=> $nama,
				'nilai' 		=> $nilai,
			]
		);
	}


	// Update data
	public function update()
	{
		$id 							= $this->input->post('id');
		$nama 							= $this->input->post('nama');
		$nilai 							= $this->input->post('nilai');

		$exe 							= $this->gejala->update($id, $nama, $nilai);

		$this->output_json(
			[
				'id' 			=> $id,
				'code' 			=> $exe['code'],
				'nama' 			=> $nama,
				'nilai' 		=> $nilai,
			]
		);
	}


	// Delete data
	public function delete()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->gejala->delete($id);

		$this->output_json(
			[
				'id' 			=> $id
			]
		);
	}


	function __construct()
	{
		parent::__construct();
		$this->load->model('gejala/dataModel', 'gejala');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}
}

/* End of file Data.php */
/* Location: ./application/controllers/gejala/Data.php */