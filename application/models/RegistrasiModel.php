<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegistrasiModel extends CI_Model
{

	public function submit($email, $phone, $username, $password)
	{
		$data['user_nama'] 		= $username;
		$data['user_password'] 	= $this->b_password->create_hash($password);
		$data['user_email'] 	= $email;
		$data['user_phone'] 	= $phone;
		$data['user_status'] 	= 'Aktif';

		$exe 					= $this->db->insert('users', $data);
		$exe 					= $this->db->insert_id();

		$data2['role_user_id'] 	= $exe;
		$data2['role_lev_id'] 	= 5;

		$exe1 					= $this->db->insert('role_users', $data2);

		return $exe;
	}
}

/* End of file RegistrasiModel.php */
/* Location: ./application/models/RegistrasiModel.php */