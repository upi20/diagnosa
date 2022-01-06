<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends Render_Controller
{


    public function index()
    {
        // Page Settings
        $this->title                    = 'Pembayaran';
        $this->content                  = 'pembayaran-data';
        $this->navigation               = ['Pembayaran'];
        $this->plugins                  = ['datatables'];


        // Breadcrumb setting
        $this->breadcrumb_1             = 'Home';
        $this->breadcrumb_1_url         = base_url() . 'home';
        $this->breadcrumb_2             = 'Pembayaran';
        $this->breadcrumb_2_url         = '#';
        $this->data['records'] = $this->model->getData();


        $this->render();
    }

    public function detail($id)
    {
        $exe = $this->model->detail($id);
        $this->output_json($exe[0]);
    }

    public function acc($id)
    {
        $data['status']             = 'valid';
        $data['tanggal_diterima']   = date('Y-m-d', time());
        $exe                        = $this->model->acc($id, $data);

        if ($exe) {
            echo "<script>alert('Status telah di ACC')</script>";
            redirect('pembayaran/data', 'refresh');
        }
    }

    public function reject($id)
    {
        $data['status']             = 'invalid';
        $data['tanggal_diterima']   = date('Y-m-d', time());
        $exe                        = $this->model->reject($id, $data);
        if ($exe) {
            echo "<script>alert('Status telah di TOLAK')</script>";
            redirect('pembayaran/data', 'refresh');
        }
    }

    function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaran/DataModel', 'model');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }
}
