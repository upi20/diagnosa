<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataModel extends Render_Model
{


	public function getAllData()
	{
		$exe 						= $this->db->get('gejala');

		return $exe->result_array();
	}


	public function getPenyakit()
	{
		$exe 						= $this->db->get('penyakit');

		return $exe->result_array();
	}


	public function getDataDetail($id)
	{
		$exe 						= $this->db->get_where('gejala', ['id_gejala' => $id]);

		return $exe->row_array();
	}


	public function insert($nama, $nilai)
	{
		// Auto code config
		$config['table'] 			= 'gejala';
		$config['field'] 			= 'kode_gejala';
		$config['jumlah'] 			= 3;
		$config['return'] 			= 'G';


		// Code barang
		$code 						= $this->_generate($config);

		$data['kode_gejala'] 		= $code;
		$data['nama'] 				= $nama;
		$data['nilai'] 				= $nilai;

		$exe 						= $this->db->insert('gejala', $data);
		$exe2['id'] 				= $this->db->insert_id();
		$exe2['code'] 				= $code;

		return $exe2;
	}


	public function update($id, $nama, $nilai)
	{
		$data['nama'] 				= $nama;
		$data['nilai'] 				= $nilai;

		$exe 						= $this->db->where('id_gejala', $id);
		$exe 						= $this->db->update('gejala', $data);

		$exe2['code'] 				= $this->_cek('gejala', 'id_gejala', $id, 'kode_gejala');

		return $exe2;
	}


	public function delete($id)
	{
		$exe 						= $this->db->where('id_gejala', $id);
		$exe 						= $this->db->delete('gejala');

		return $exe;
	}
}

/* End of file DataModel.php */
/* Location: ./application/models/gejala/DataModel.php */