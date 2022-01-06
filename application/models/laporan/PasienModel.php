<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasienModel extends Render_Model
{


    public function getAllData()
    {
        $exe                         = $this->db->join('role_users b', 'role_user_id = a.user_id')
            ->join('diagnosa d', 'd.id_user = a.user_id')
            ->where("keterangan <> ''")
            // ->group_by('user_id')
            ->order_by('d.created_at', 'DESC')
            ->get_where('users a', ['role_lev_id' => 5]);

        return $exe->result_array();
    }


    public function filter_tanggal()
    {
        $tgl1 = $this->input->get('start_date');
        $tgl2 = $this->input->get('end_date');
        $tgl2 = date('Y-m-d', strtotime($tgl2) + (60 * 60 * 24));
        $query = $this->db->join('role_users b', 'role_user_id = a.user_id')
            ->join('diagnosa d', 'd.id_user = a.user_id')
            ->where("keterangan <> ''")
            ->where("d.created_at >= '$tgl1' AND d.created_at <= '$tgl2'")
            // ->group_by('user_id')
            ->order_by('d.created_at', 'DESC')
            ->get_where('users a', ['role_lev_id' => 5]);
        return $query->result_array();
    }
}
