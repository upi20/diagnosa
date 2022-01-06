<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataModel extends Render_Model
{


	public function getPenyakit()
	{
		$exe 						= $this->db->get('penyakit');

		return $exe->result_array();
	}


	public function getGejala()
	{
		$exe 						= $this->db->get('gejala');

		return $exe->result_array();
	}


	public function insert_diagnosa()
	{
		$user_id 					= $this->session->userdata('data')['id'];

		$data['id_user'] 			= $user_id;
		$data['score'] 				= 0;
		$data['keterangan'] 		= '';
		$data['status'] 			= 'Aktif';
		$exe 						= $this->db->insert('diagnosa', $data);
		$exe 						= $this->db->insert_id();
		return $exe;
	}


	public function insert_diagnosa_detail($id, $optradio, $exedi)
	{
		if (is_null($optradio)) {
			return true;
		}
		$user_id 					= $this->session->userdata('data')['id'];
		$nilai 						= $this->db->get_where('gejala', ['id_gejala' => $id])->row_array()['nilai'];

		$data['id_diagnosa'] 		= $exedi;
		$data['id_gejala'] 			= $id;
		$data['jawaban'] 			= $optradio;
		$data['nilai'] 				= ($optradio > 0) ? $nilai : 0;

		$exe 						= $this->db->insert('diagnosa_detail', $data);

		return $exe;
	}


	public function update_diagnosa($exedi)
	{
		$nilai 						= $this->db->select('sum(nilai) as score')
			->get_where('diagnosa_detail', ['id_diagnosa' => $exedi])
			->row_array()['score'];

		$data['score'] 				= $nilai;

		$exe 						= $this->db->where('id_diagnosa', $exedi);
		$exe 						= $this->db->update('diagnosa', $data);

		return $exe;
	}


	public function cek_diagnosa($q)
	{
		$hasil 						= array();
		$hasilfinal 				= array();
		$diagnosis 					= array();

		/*
		*
		*	GET DATA DIAGNOSA
		*
		*/
		$total 						= $this->db->get_where('diagnosa', ['id_diagnosa' => $q])->row_array()['score'];
		$diagnosa 					= $this->db->select('*')
			->where_not_in('jawaban', 0)
			->where('id_diagnosa', $q)
			->get('diagnosa_detail');

		/*
		*
		*	GET DATA PENYAKIT
		*
		*/

		$penyakit 					= $this->db->get('penyakit')->result_array();

		foreach ($penyakit as $p) {

			/*
			*
			*	GET DATA GEJALA PER PENYAKIT
			*
			*/
			$data_gejala 			= $this->db->get_where('basis_pengetahuan', ['id_penyakit' => $p['id_penyakit']])
				->result_array();
			foreach ($data_gejala as $g) {
				/*
				*
				*	CEK GEJALA POSITIF DENGAN PENYAKIT
				*
				*/

				foreach ($diagnosa->result_array() as $d) {
					$data['penyakit'] 	= $p['id_penyakit'];
					$data['gejala'] 	= $g['id_gejala'];
					$data['jawaban'] 	= ($g['id_gejala'] == $d['id_gejala']) ? 1 : 0;
					$data['nilai'] 		= ($g['id_gejala'] == $d['id_gejala']) ? $d['nilai'] : 0;

					array_push($diagnosis, $data);
				}
			}

			/*
			*
			*	JIKA NO SEMUA
			*
			*/
			if ($diagnosis == null) {
				break;
			}

			$group_dianosa 				= $this->group_by('penyakit', $diagnosis);

			/*
			*
			*	GROUP BY DIAGNOSA
			*
			*/
			$where_diagnosa 			= $group_dianosa[$p['id_penyakit']];

			$dat['total'] 				= 0;
			foreach ($where_diagnosa as $w) {
				$dat['penyakit'] 	= $p['id_penyakit'];
				$dat['nama'] 		= $p['nama'];
				$dat['total'] 		+= (int)$w['nilai'];
			}

			array_push($hasil, $dat);
		}

		/*
		*
		*	CEK HASIL
		*
		*/
		foreach ($hasil as $h) {
			$exeh 					= $this->db->get_where('penyakit', ['id_penyakit' => $h['penyakit']])
				->row_array();

			$dah['penyakit'] 		= $h['penyakit'];
			$dah['nama'] 			= $h['nama'];
			$dah['total'] 			= $h['total'];
			$dah['status'] 			= ((int)$h['total'] >= (int)$exeh['min_persentase'] or (int)$exeh['max_persentase'] <= (int)$h['total']) ? 1 : 0;
			$dah['data'] 			= $this->db->get_where('saran', ['id_penyakit' => $h['penyakit']])->row_array();

			array_push($hasilfinal, $dah);
		}

		if (count($hasilfinal) == 0) {
			$this->db->where('id_diagnosa', $q);
			$this->db->update('diagnosa', ['keterangan' => 'Sehat']);
		} else {
			$count = count($hasilfinal);
			for ($i = 0; $i < $count; $i++) {
				if ($hasilfinal[$i]['status'] == 1) {
					$this->db->where('id_diagnosa', $q);
					$this->db->update('diagnosa', ['keterangan' => $hasilfinal[$i]['nama']]);
					break;
				} else {
					$this->db->where('id_diagnosa', $q);
					$this->db->update('diagnosa', ['keterangan' => 'Sehat']);
				}
			}
		}
		return $hasilfinal;
	}

	// GROUP BY ARRAY
	function group_by($key, $data)
	{
		$result = array();

		foreach ($data as $val) {
			if (array_key_exists($key, $val)) {
				$result[$val[$key]][] = $val;
			} else {
				$result[""][] = $val;
			}
		}

		return $result;
	}
}

/* End of file DataModel.php */
/* Location: ./application/models/diagnosa/DataModel.php */