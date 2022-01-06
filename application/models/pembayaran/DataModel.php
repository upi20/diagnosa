<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataModel extends Render_Model
{
    public function getData()
    {
        return $this->db->get('pembayaran')->result_array();
    }

    public function acc($id, $data)
    {
        $exe = $this->db->where('id_pembayaran', $id);
        $exe  = $this->db->update('pembayaran', $data);

        return $exe;
    }

    public function detail($id)
    {
        $exe = $this->db->select('p.*,u.user_nama,u.user_email,pr.judul,pr.masa_berlaku')
            ->join('users u', 'u.user_id = p.user_id')
            ->join('program pr', 'pr.id_program = p.id_program')
            ->where('p.id_pembayaran', $id)
            ->get('pembayaran p');
        return $exe->result_array();
    }

    public function reject($id, $data)
    {
        $exe = $this->db->where('id_pembayaran', $id);
        $exe  = $this->db->update('pembayaran', $data);

        return $exe;
    }
}
