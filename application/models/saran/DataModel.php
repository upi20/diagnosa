<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataModel extends Render_Model {

	
	public function getAllData()
	{
		$exe 						= $this->db->select('saran.*, penyakit.nama as penyakit, users.user_nama as dokter')
												->join('penyakit', 'penyakit.id_penyakit = saran.id_penyakit')
												->join('users', 'users.user_id = saran.id_user')
												->get('saran');

		return $exe->result_array();
	}


	public function getPenyakit()
	{
		$exe 						= $this->db->get('penyakit');

		return $exe->result_array();
	}


	public function getDataDetail($id)
	{
		$exe 						= $this->db->get_where('saran', ['id_saran' => $id]);

		return $exe->row_array();
	}


	public function insert($penyakit, $judul, $keterangan)
	{
		$user_id 					= $this->session->userdata('data')['id'];
		$data['id_user'] 			= $user_id;
		$data['id_penyakit'] 		= $penyakit;
		$data['judul'] 				= $judul;
		$data['keterangan'] 		= $keterangan;

		$exe 						= $this->db->insert('saran', $data);
		$exe2['id'] 				= $this->db->insert_id();
		$exe2['penyakit'] 			= $this->_cek('penyakit', 'id_penyakit', $penyakit);
		$exe2['dokter'] 			= $this->_cek('users', 'user_id', $user_id, 'user_nama');

		return $exe2;
	}


	public function update($id, $penyakit, $judul, $keterangan)
	{
		$user_id 					= $this->session->userdata('data')['id'];
		$data['id_user'] 			= $user_id;
		$data['id_penyakit'] 		= $penyakit;
		$data['judul'] 				= $judul;
		$data['keterangan'] 		= $keterangan;

		$exe 						= $this->db->where('id_saran', $id);
		$exe 						= $this->db->update('saran', $data);

		$exe2['penyakit'] 			= $this->_cek('penyakit', 'id_penyakit', $penyakit);
		$exe2['dokter'] 			= $this->_cek('users', 'user_id', $user_id, 'user_nama');

		return $exe2;
	}


	public function delete($id)
	{
		$exe 						= $this->db->where('id_saran', $id);
		$exe 						= $this->db->delete('saran');

		return $exe;
	}


}

/* End of file DataModel.php */
/* Location: ./application/models/saran/DataModel.php */