<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends Render_Controller
{


    public function index()
    {
        // Page Settings
        $this->title                     = 'Program Data';
        $this->content                     = 'program-data';
        $this->navigation                 = ['Program'];
        $this->plugins                     = ['datatables'];

        // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'dashboard';
        $this->breadcrumb_2             = 'Program';
        $this->breadcrumb_2_url         = '#';
        $this->breadcrumb_3             = 'Data';
        $this->breadcrumb_3_url         = '#';

        // Send data to view
        $this->data['records']             = $this->program->getAllData();

        $this->render();
    }


    // Get data detail
    public function getDataDetail()
    {
        $id                    = $this->input->post('id');
        $exe                   = $this->program->getDataDetail($id);

        $this->output_json(
            [
                'id'            => $exe['id_program'],
                'judul'         => $exe['judul'],
                'keterangan'    => $exe['keterangan'],
                'harga'         => $exe['harga'],
                'masa_berlaku'  => $exe['masa_berlaku']

            ]
        );
    }


    // Insert data
    public function insert()
    {
        $judul                 = $this->input->post('judul');
        $keterangan            = $this->input->post('keterangan');
        $harga                 = $this->input->post('harga');
        $masa_berlaku          = $this->input->post('masa_berlaku');

        $exe                   = $this->program->insert($judul, $keterangan, $harga, $masa_berlaku);

        $this->output_json(
            [
                'id_program'    => $this->db->insert_id(),
                'judul'         => $exe['judul'],
                'keterangan'    => $exe['keterangan'],
                'harga'         => $exe['harga'],
                'masa_berlaku'        => $exe['masa_berlaku']
            ]
        );
    }


    // Update data
    public function update()
    {
        $id                     = $this->input->post('id');
        $judul                  = $this->input->post('judul');
        $keterangan             = $this->input->post('keterangan');
        $harga                  = $this->input->post('harga');
        $masa_berlaku           = $this->input->post('masa_berlaku');

        $exe                    = $this->program->update($id, $judul, $keterangan, $harga, $masa_berlaku);

        $this->output_json(
            [
                'id'            => $exe['id_program'],
                'judul'         => $exe['judul'],
                'keterangan'    => $exe['keterangan'],
                'harga'         => $exe['harga'],
                'masa_berlaku'  => $exe['masa_berlaku']
            ]
        );
    }


    // Delete data
    public function delete()
    {
        $id                             = $this->input->post('id');

        $exe                             = $this->program->delete($id);

        $this->output_json(
            [
                'id'             => $id
            ]
        );
    }


    function __construct()
    {
        parent::__construct();
        $this->load->model('program/dataModel', 'program');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }
}

/* End of file Data.php */
/* Location: ./application/controllers/program/Data.php */