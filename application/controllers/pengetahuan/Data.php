<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends Render_Controller
{


    public function index()
    {
        // Page Settings
        $this->title                     = 'Pengetahuan Data';
        $this->content                     = 'pengetahuan-data';
        $this->navigation                 = ['Pengetahuan'];
        $this->plugins                     = ['datatables'];

        // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'dashboard';
        $this->breadcrumb_2             = 'Pengetahuan';
        $this->breadcrumb_2_url         = '#';
        $this->breadcrumb_3             = 'Data';
        $this->breadcrumb_3_url         = '#';

        // Send data to view
        $this->data['data']             = $this->model->getAllData();
        $this->data['penyakit']         = $this->model->getPenyakit();
        $this->data['gejala']         = $this->model->getGejala();

        $this->render();
    }

    public function insert()
    {
        $id_penyakit                 = $this->input->post('id_penyakit');
        $id_gejala            = $this->input->post('id_gejala');

        $exe                   = $this->model->insert($id_penyakit, $id_gejala);
        $getPenyakit = $this->db->get_where('penyakit', ['id_penyakit' => $id_penyakit])->row_array();
        $getGejala = $this->db->get_where('gejala', ['id_gejala' => $id_gejala])->row_array();
        $this->output_json(
            [
                'id'    => $this->db->insert_id(),
                'kode_penyakit'         => $getPenyakit['kode_penyakit'],
                'nama_penyakit'         => $getPenyakit['nama'],
                'kode_gejala'         => $getGejala['kode_gejala'],
                'nama_gejala'         => $getGejala['nama']
            ]
        );
    }

    public function update()
    {
        $id                     = $this->input->post('id');
        $id_penyakit                  = $this->input->post('id_penyakit');
        $id_gejala             = $this->input->post('id_gejala');

        $exe                    = $this->model->update($id, $id_penyakit, $id_gejala);

        $getPenyakit = $this->db->get_where('penyakit', ['id_penyakit' => $id_penyakit])->row_array();
        $getGejala = $this->db->get_where('gejala', ['id_gejala' => $id_gejala])->row_array();
        $this->output_json(
            [
                'id'    => $id,
                'kode_penyakit'         => $getPenyakit['kode_penyakit'],
                'nama_penyakit'         => $getPenyakit['nama'],
                'kode_gejala'         => $getGejala['kode_gejala'],
                'nama_gejala'         => $getGejala['nama']
            ]
        );
    }

    public function delete()
    {
        $id                             = $this->input->post('id');

        $exe                             = $this->model->delete($id);

        $this->output_json(
            [
                'id'             => $id
            ]
        );
    }

    public function getDataDetail()
    {
        $id                    = $this->input->post('id');

        $exe                   = $this->model->getDataDetail($id);

        $this->output_json(
            [
                'id'            => $exe['id'],
                'id_penyakit'         => $exe['id_penyakit'],
                'id_gejala'    => $exe['id_gejala']
            ]
        );
    }

    function __construct()
    {
        parent::__construct();
        $this->load->model('pengetahuan/dataModel', 'model');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }
}
