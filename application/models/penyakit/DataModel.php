<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataModel extends Render_Model {

	
	public function getAllData()
	{
		$exe 						= $this->db->get('penyakit');

		return $exe->result_array();
	}


	public function getDataDetail($id)
	{
		$exe 						= $this->db->get_where('penyakit', ['id_penyakit' => $id]);

		return $exe->row_array();
	}


	public function insert($nama, $min, $max)
	{
		// Auto code config
		$config['table'] 			= 'penyakit';
		$config['field'] 			= 'kode_penyakit';
		$config['jumlah'] 			= 2;
		$config['return'] 			= 'P';


		// Code barang
		$code 						= $this->_generate($config);

		$data['kode_penyakit'] 		= $code;
		$data['nama'] 				= $nama;
		$data['min_persentase'] 	= $min;
		$data['max_persentase'] 	= $max;

		$exe 						= $this->db->insert('penyakit', $data);
		$exe2['id'] 				= $this->db->insert_id();
		$exe2['code'] 				= $code;

		return $exe2;
	}


	public function update($id, $nama, $min, $max)
	{
		$data['nama'] 				= $nama;
		$data['min_persentase'] 	= $min;
		$data['max_persentase'] 	= $max;

		$exe 						= $this->db->where('id_penyakit', $id);
		$exe 						= $this->db->update('penyakit', $data);
		$exe2['code'] 				= $this->_cek('penyakit', 'id_penyakit', $id, 'kode_penyakit');

		return $exe2;
	}


	public function delete($id)
	{
		$exe 						= $this->db->where('id_penyakit', $id);
		$exe 						= $this->db->delete('penyakit');

		return $exe;
	}


}

/* End of file DataModel.php */
/* Location: ./application/models/penyakit/DataModel.php */