<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends Render_Controller
{
    public function index()
    {
        // Page Settings
        $this->title                     = 'Laporan Paket';
        $this->content                     = 'laporan-paket';
        $this->navigation                 = ['Laporan'];
        $this->plugins                     = ['datatables'];

        // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'dashboard';
        $this->breadcrumb_2             = 'Laporan';
        $this->breadcrumb_2_url         = '#';
        $this->breadcrumb_3             = 'Paket';
        $this->breadcrumb_3_url         = '#';

        // Send data to view
        $filter = $this->input->get('filter');
        if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') {
            $this->data['records'] = $this->paket->filter_tanggal();
        } elseif ($filter == 'valid') {
            $this->data['records'] = $this->paket->filter_valid();
        } elseif ($filter == 'invalid') {
            $this->data['records'] = $this->paket->filter_invalid();
        } else {
            $this->data['records'] = $this->paket->getAllData();
        }

        $this->render();
    }

    public function cetak()
    {
        $filter = $this->input->get('filter');
        if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') {
            $data['records'] = $this->paket->filter_tanggal();
        } elseif ($filter == 'valid') {
            $data['records'] = $this->paket->filter_valid();
        } elseif ($filter == 'invalid') {
            $data['records'] = $this->paket->filter_invalid();
        } else {
            $data['records'] = $this->paket->getAllData();
        }

        // Config PDF
        $config['html'] = 'templates/cetak/laporan-paket';
        $config['data'] = $data;
        $config['filename'] = 'LAPORAN_PAKET_' . date('y-m-d');

        $this->pdf->render($config);
    }

    function __construct()
    {
        parent::__construct();
        $this->load->model('laporan/PaketModel', 'paket');
        $this->default_template = 'templates/dashboard';
        $this->load->library(['plugin', 'pdf']);
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }
}
