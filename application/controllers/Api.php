<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Api extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');

		$this->message_success = 'berhasil';
		$this->message_fail = 'gagal';
		$this->load->model('diagnosa/dataModel', 'diagnosa');
	}

	public function masuk_post()
	{
		$this->load->model('apiModel', 'login');
		$email 	= $this->input->post('email');
		$password 	= $this->input->post('password');

		// Cek login ke model
		$login 		= $this->login->cekLogin($email, $password);


		if ($login['status'] == 0) {
			// Set session value
			$message = array(
				'status' => true,
				'data'	 => array(
					'id' => $login['data'][0]['user_id'],
					'nama' => $login['data'][0]['user_nama'],
					'email' => $login['data'][0]['user_email'],
					'level' => $login['data'][0]['lev_nama'],
				)
			);
		} else {
			$message = array(
				'status' => false,
				'data'   => null
			);
		}

		$this->set_response($message, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
	}

	public function gejala_cek()
	{
		$hittung 						= $this->input->post('hittung');

		$exedi 							= $this->diagnosa->insert_diagnosa();

		for ($i = 1; $i <= count($hittung); $i++) {
			$id 						= $this->input->post('id-' . $i);
			$optradio 					= $this->input->post('optradio-' . $i);
			$exede 						= $this->diagnosa->insert_diagnosa_detail($id, $optradio, $exedi);
		}

		$exeup 							= $this->diagnosa->update_diagnosa($exedi);

		$cek 							= $this->diagnosa->cek_diagnosa($exeup);

		$message = array(
			'status' => true,
			'data'   => $cek
		);

		$this->set_response($message, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code


	}

	public function daftar_post()
	{
		$this->load->model('registrasiModel', 'registrasi');
		$email 		= $this->input->post('email');
		$phone 		= $this->input->post('phone');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');

		// Cek login ke model
		$login 		= $this->registrasi->submit($email, $phone, $username, $password);
		if ($login) {
			$message = array(
				'id'    => $login,
				'status'    => true,
				'message'   => 'Daftar berhasil'
			);
		} else {
			$message = array(
				'id'    => $login,
				'status'    => false,
				'message'   => 'Daftar gagal'
			);
		}
		$this->set_response($message, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
	}

	// $value = array(
	//       "id" => 1,
	//       "data" =>
	//       		array(
	//       			0 => array(
	// 	             "kode"=> 222,
	// 	             "value"=> 1
	//       			),
	//       			1 => array(
	// 	             "kode"=>111,
	// 	             "value"=> 1
	//       			)
	//       		)
	//      );

	function aasort($array, $key)
	{
		$sorter = array();
		$ret = array();
		reset($array);
		foreach ($array as $ii => $va) {
			$sorter[$ii] = $va[$key];
		}
		arsort($sorter);
		foreach ($sorter as $ii => $va) {
			$ret[$ii] = $array[$ii];
		}
		return $ret;
	}

	public function testarray_get()
	{
		$array = array(
			0 => array(
				'id' => 1,
				'total' => 80
			),
			1 => array(
				'id' => 2,
				'total' => 30
			),
			2 => array(
				'id' => 3,
				'total' => 90
			),
			3 => array(
				'id' => 4,
				'total' => 50
			)
		);


		$nilai = $this->aasort($array, "total");
		$message = $nilai;
		$get_penyakit = $this->db->join('penyakit b', 'b.nama = a.keterangan')->join('saran c', 'c.id_penyakit = b.id_penyakit')->get_where('diagnosa a', array('a.id_diagnosa' => 3))->row_array();
		$message = $get_penyakit;
		$this->set_response($message, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
	}

	public function diagnosa_post()
	{

		$inputJSON 						= file_get_contents('php://input');
		$value 							= json_decode($inputJSON, TRUE);

		$save['id_user'] 			= $value['id'];
		$save['score'] 				= 0;
		$save['keterangan'] 		= '';
		$save['status'] 			= 'Aktif';

		$exedi 						= $this->db->insert('diagnosa', $save);
		$exedi 						= $this->db->insert_id();

		for ($i = 0; $i < count($value['data']); $i++) {
			$id 						= $value['data'][$i]['kode'];
			$optradio 					= $value['data'][$i]['value'];
			$exede 						= $this->insert_diagnosa_detail($id, $optradio, $exedi);
		}

		$exeup 							= $this->update_diagnosa($exedi);

		$get = $this->cek_diagnosa($exedi);
		$return = $this->aasort($get, "total");
		$return = null;
		$get = null;
		$get = $this->cek_diagnosa($exedi);
		$return = $this->aasort($get, "total");
		$get_penyakit = $this->db->join('penyakit b', 'b.nama = a.keterangan')->join('saran c', 'c.id_penyakit = b.id_penyakit')->get_where('diagnosa a', array('a.id_diagnosa' => $exedi))->row_array();
		if (count($return) > 0) {
			if ($return[0]['total'] >= 50) {
				$upd['keterangan'] = $return[0]['nama'];
				// $upd['keterangan'] = "soni";
				$exes = $this->db->where('id_diagnosa', $exedi);
				$exes = $this->db->update('diagnosa', $upd);

				$message = array(
					'id_diagnosa' => $exedi,
					'status' => true,
					'penyakit' => $get_penyakit['nama'],
					'saran' => $get_penyakit['keterangan'],
					'derajat_kepercayaan' => $get_penyakit['derajat_kepercayaan'],
				);
			} else {
				$message = array(
					'id_diagnosa' => $exedi,
					'status' => true,
					'penyakit' => $get_penyakit['nama'],
					'saran' => $get_penyakit['keterangan'],
					'derajat_kepercayaan' => $get_penyakit['derajat_kepercayaan'],
				);
			}
		} else {
			$message = array(
				'id_diagnosa' => $exedi,
				'status' => false,
				'penyakit' => 'tidak ada',
				'saran' => '',
				'derajat_kepercayaan' => 0,
			);
		}

		// $message = $newreturn;
		$this->set_response($message, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
	}

	public function hasildiagnosa_get()
	{
		$id = $this->input->get('id');
		$get = $this->cek_diagnosa($id);
		$newget = $this->aasort($get, "total");
		$this->set_response($newget, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
	}


	public function insert_diagnosa_detail($id, $optradio, $exedi)
	{
		$user_id 					= $this->session->userdata('data')['id'];
		$nilai 						= $this->db->get_where('gejala', ['id_gejala' => $id])->row_array()['nilai'];
		if ($optradio == 1) {
			$nilai = $nilai;
		} else {
			$nilai = 0;
		}
		$data['id_diagnosa'] 		= $exedi;
		$data['id_gejala'] 			= $id;
		$data['jawaban'] 			= $optradio;
		$data['nilai'] 				= $nilai;

		$exe 						= $this->db->insert('diagnosa_detail', $data);

		return $exe;
	}


	public function update_diagnosa($exedi)
	{
		$nilai 						= $this->db->select('sum(nilai) as score')
			->get_where('diagnosa_detail', ['id_diagnosa' => $exedi])
			->row_array()['score'];

		$data['score'] 	= $nilai;
		$exe 						= $this->db->where('id_diagnosa', $exedi);
		$exe 						= $this->db->update('diagnosa', $data);

		return $exe;
	}

	public function gejala_get()
	{
		$this->load->model('registrasiModel', 'registrasi');

		// Cek login ke model
		$get 		= $this->db->get('gejala')->result_array();
		if ($get) {
			$message = array(
				'status'    => true,
				'data'   => $get
			);
		} else {
			$message = array(
				'status'    => false,
				'data'   => $get
			);
		}
		$this->set_response($message, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
	}

	public function cek_diagnosa($q)
	{
		ini_set('display_errors', 0);
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

	public function gantiPassword_post()
	{
		$this->load->model('Api_model', 'model');
		$user_id = $this->input->post('user_id');
		$password_baru = $this->input->post('password_baru');
		$password_lama = $this->input->post('password_lama');
		$cekPassword = $this->model->cekPassword($user_id, $password_lama);
		// $message = $cekPassword;
		if ($cekPassword == true) {
			$password = $this->b_password->create_hash($password_baru);
			$ubah_password = $this->model->ubahPassword($user_id, $password);
		} else {
			$ubah_password = false;
		}

		if ($ubah_password) {
			$message = [
				'status' => 0,
				'message' => $this->message_success
			];
		} else {
			$message = [
				'status' => 1,
				'message' => $this->message_fail
			];
		}
		$this->set_response($message, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
	}


	public function lupaPassword_post()
	{
		$this->load->model('Api_model', 'model');
		$email = $this->input->post('email');
		$execute = $this->model->lupaPassword($email);
		if ($execute) {
			$this->load->library('send_email');
			$email = $this->send_email->send($email);
			$message = [
				'status' => 0,
				'message' => 'Berhasil, cek email anda untuk merubah password'
			];
		} else {
			$message = [
				'status' => 1,
				'message' => $this->message_fail
			];
		}
		$this->set_response($message, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './assets/gambar/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = uniqid();
		$config['overwrite']            = true;
		$config['max_size']             = 2024;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('photo')) {
			return $this->upload->data("file_name");
		}
	}
}
