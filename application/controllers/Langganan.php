<?php

class Langganan extends Render_Controller
{
    public function index($id)
    {
        $this->title = 'Pembayaran Paket';
        $this->content                 = 'langganan';
        $this->data['data'] = $this->model->getData($id);
        $this->navigation                 = ['Langganan'];
        $this->breadcrumb_1             = 'Home';
        $this->breadcrumb_1_url         = base_url() . 'home';
        $this->breadcrumb_2             = 'langganan';
        $this->breadcrumb_2_url         = '#';
        $this->render();
    }
    public function pembayaran($id)
    {
        $config['path'] = 'pembayaran';
        $config['file'] = 'gambar';
        $config['allowed_types'] = 'jpg|jpeg|gif|png';

        $config['max_width'] = '2048';
        $config['max_height'] = '2048';
        $file = $this->gambar->upload($config);
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'user_id' => $this->session->userdata('data')['id'],
            'id_program' => $id,
            'gambar' => $file,
            'nama' => $this->input->post('nama'),
            'status' => '',
            'tujuan_pembayaran' => $this->input->post('tujuan_pembayaran')
        ];
        $exe = $this->model->insert($data);
        if ($exe) {
            echo "<script>alert('Anda telah berlangganan tunggu konfirmasi dari admin')</script>";
            redirect('chat', 'refresh');
        }
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('LanggananModel', 'model');
        $this->default_template = 'templates/dashboard';
        $this->load->library(['plugin', 'gambar']);
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }
}
