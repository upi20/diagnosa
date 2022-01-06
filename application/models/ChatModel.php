<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChatModel extends CI_Model
{

	public function getProgram()
	{
		return $this->db->get('program')->result_array();
	}
	public function getDokter()
	{
		$exe 		= $this->db->join('users a', 'a.user_id = c.role_user_id')
			->join('level b', 'b.lev_id = c.role_lev_id')
			->get_where('role_users c', ['b.lev_nama' => 'Dokter']);

		return $exe->result_array();
	}
	public function member()
	{
		return $this->db->get_where('pembayaran', ['user_id' => $this->session->userdata('data')['id'], 'status' => 'valid'])->num_rows();
	}
	public function getPasien()
	{
		$exe 		= $this->db->join('users a', 'a.user_id = c.role_user_id')
			->join('level b', 'b.lev_id = c.role_lev_id')
			->get_where('role_users c', ['b.lev_nama' => 'Pengguna']);

		return $exe->result_array();
	}

	public function getListPasien()
	{
		$user_id 	= $this->session->userdata('data')['id'];
		$exe  		= $this->db->select('*')
			->from('chat a')
			->join('users c', 'c.user_id = a.id_pengirim', 'left')
			->where(" (a.id_dokter = '{$user_id}') ")
			->get();

		return $exe->result_array();
	}


	public function getLastChat($q)
	{
		$user_id 	= $this->session->userdata('data')['id'];
		$exe  		= $this->db->select('*')
			->from('chat a')
			->join('chat_detail b', 'a.id_chat = b.id_chat', 'right')
			->join('users d', 'd.user_id = b.id_penerima', 'left')
			->join('users c', 'c.user_id = b.id_pengirim', 'left')
			->where(" (a.id_pengirim = '{$user_id}' or a.id_dokter = '{$q}') ")
			->get();

		return $exe;
	}


	public function getLastChatDokter($q)
	{
		$user_id 	= $this->session->userdata('data')['id'];
		$exe  		= $this->db->select('*')
			->from('chat a')
			->join('chat_detail b', 'a.id_chat = b.id_chat', 'right')
			->join('users d', 'd.user_id = b.id_penerima', 'left')
			->join('users c', 'c.user_id = b.id_pengirim', 'left')
			->where(" (a.id_pengirim = '{$q}' or a.id_dokter = '{$user_id}') ")
			->get();

		return $exe;
	}


	function cek_chat($user_id, $id)
	{
		if ($this->session->userdata('data')['level'] == 'Pengguna') {
			$exe 		= $this->db->get_where('chat', ['id_pengirim' => $user_id, 'id_dokter' => $id]);
		} else {
			$exe 		= $this->db->get_where('chat', ['id_pengirim' => $id, 'id_dokter' => $user_id]);
		}

		return $exe->row_array()['id_chat'];
	}


	public function sendMessageUser($message, $id)
	{
		$user_id 				= $this->session->userdata('data')['id'];
		$data['id_chat'] 		= $this->cek_chat($user_id, $id);
		$data['id_pengirim'] 	= $user_id;
		$data['id_penerima'] 	= $id;
		$data['message'] 		= $message;

		$exe 					= $this->db->insert('chat_detail', $data);

		return $exe;
	}


	public function create_chat($q)
	{
		if ($this->session->userdata('data')['level'] == 'Pengguna') {
			$user_id 				= $this->session->userdata('data')['id'];

			$cekChat 				= $this->db->get_where('chat', ['id_pengirim' => $user_id, 'id_dokter' => $q]);

			if ($cekChat->num_rows() == 0) {
				$data['id_pengirim'] 	= $user_id;
				$data['id_dokter'] 		= $q;
				$exe 					= $this->db->insert('chat', $data);
			}

			return $cekChat;
		}
	}
}

/* End of file ChatModel.php */
/* Location: ./application/models/ChatModel.php */