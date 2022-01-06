<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends Render_Controller
{


    public function index()
    {
        // Page Settings
        $this->title                     = 'Laporan Pasien';
        $this->content                     = 'laporan-pasien';
        $this->navigation                 = ['Laporan'];
        $this->plugins                     = ['datatables'];

        // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'dashboard';
        $this->breadcrumb_2             = 'Laporan';
        $this->breadcrumb_2_url         = '#';
        $this->breadcrumb_3             = 'Pasien';
        $this->breadcrumb_3_url         = '#';

        // Send data to view
        if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') {
            $this->data['records'] = $this->pasien->filter_tanggal();
        } else {
            $this->data['records'] = $this->pasien->getAllData();
        }

        $this->render();
    }

    public function cetak()
    {
        if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') {
            $data['records'] = $this->pasien->filter_tanggal();
        } else {
            $data['records'] = $this->pasien->getAllData();
        }

        // Config PDF
        $config['html'] = 'templates/cetak/laporan-pasien';
        $config['data'] = $data;
        $config['filename'] = 'LAPORAN_PASIEN_' . date('y-m-d');

        $this->pdf->render($config);
    }

    function __construct()
    {
        parent::__construct();
        $this->load->model('laporan/PasienModel', 'pasien');
        $this->default_template = 'templates/dashboard';
        $this->load->library(['plugin', 'pdf']);
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }
}
