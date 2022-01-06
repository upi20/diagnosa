<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaketModel extends Render_Model
{
    public function getAllData()
    {
        $exe                         = $this->db->select('p.*,u.user_nama,u.user_email,pr.judul,pr.masa_berlaku')
            ->join('users u', 'u.user_id = p.user_id')
            ->join('program pr', 'pr.id_program = p.id_program')
            ->order_by('tanggal', 'ASC')
            ->get('pembayaran p');
        return $exe->result_array();
    }

    public function filter_valid()
    {
        $exe                         = $this->db->select('p.*,u.user_nama,u.user_email,pr.judul,pr.masa_berlaku')
            ->join('users u', 'u.user_id = p.user_id')
            ->join('program pr', 'pr.id_program = p.id_program')
            ->get_where('pembayaran p', ['status' => 'valid']);
        return $exe->result_array();
    }

    public function filter_invalid()
    {
        $exe                         = $this->db->select('p.*,u.user_nama,u.user_email,pr.judul,pr.masa_berlaku')
            ->join('users u', 'u.user_id = p.user_id')
            ->join('program pr', 'pr.id_program = p.id_program')
            ->get_where('pembayaran p', ['status' => 'invalid']);
        return $exe->result_array();
    }

    public function filter_tanggal()
    {
        $tgl1 = $this->input->get('start_date');
        $tgl2 = $this->input->get('end_date');
        $tgl2 = date('Y-m-d', strtotime($tgl2) + (60 * 60 * 24));
        $query = $this->db->select('p.*,u.user_nama,u.user_email,pr.judul,pr.masa_berlaku')
            ->join('users u', 'u.user_id = p.user_id')
            ->join('program pr', 'pr.id_program = p.id_program')
            ->where("p.tanggal >= '$tgl1' AND p.tanggal <= '$tgl2'")
            ->order_by('tanggal', 'ASC')
            ->get('pembayaran p');
        return $query->result_array();
    }
}
