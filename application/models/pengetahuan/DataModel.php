<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataModel extends Render_Model
{


    public function getAllData()
    {
        $exe                         = $this->db->select('a.*,b.nama nama_penyakit,b.id_penyakit,b.kode_penyakit,c.nama nama_gejala,c.id_gejala,c.kode_gejala')
            ->join('penyakit b', 'b.id_penyakit = a.id_penyakit')
            ->join('gejala c', 'c.id_gejala = a.id_gejala')
            ->get('basis_pengetahuan a');

        return $exe->result_array();
    }

    public function getPenyakit()
    {
        $exe                         = $this->db->get('penyakit');

        return $exe->result_array();
    }


    public function getGejala()
    {
        $exe                         = $this->db->get('gejala');

        return $exe->result_array();
    }

    public function getDataDetail($id)
    {
        $exe                         = $this->db->get_where('basis_pengetahuan', ['id' => $id]);
        return $exe->row_array();
    }


    public function insert($id_penyakit, $id_gejala)
    {
        $data['id_penyakit']               = $id_penyakit;
        $data['id_gejala']          = $id_gejala;
        $exe                         = $this->db->insert('basis_pengetahuan', $data);
        return $data;
    }


    public function update($id, $id_penyakit, $id_gejala)
    {
        $data['id_penyakit']        = $id_penyakit;
        $data['id_gejala']          = $id_gejala;

        $exe                         = $this->db->where('id', $id);
        $exe                         = $this->db->update('basis_pengetahuan', $data);
        return $data;
    }


    public function delete($id)
    {
        $exe                         = $this->db->where('id', $id);
        $exe                         = $this->db->delete('basis_pengetahuan');

        return $exe;
    }
}

/* End of file DataModel.php */
/* Location: ./application/models/gejala/DataModel.php */