<?php

class LanggananModel extends CI_Model
{
    public function getData($id = null)
    {
        if ($id == null) {
            return $this->db->get('pembayaran')->result_array();
        } else {
            return $this->db->get_where('program', ['id_program' => $id])->row_array();
        }
    }
    public function insert($data)
    {
        return $this->db->insert('pembayaran', $data);
    }
}
