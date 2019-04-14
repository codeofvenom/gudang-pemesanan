<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->model('Deskripsi_model');
        if ($this->session->userdata('admin_login') != true && $this->session->userdata('super_admin_login') != true && $this->session->userdata('client_login') != true) {
            $url = base_url('');
            redirect($url);
        } elseif ($this->session->userdata('client_login') == true) {
            $url = base_url('client/beranda');
            redirect($url);
        } elseif ($this->session->userdata('super_admin_login') == true) {
            $url = base_url('administrator/beranda');
            redirect($url);
        }
    }

    public function index()
    {
        if ($this->session->userdata('admin_login') == true) {
            $id_admin = $this->session->userdata('ses_id');
            $datak = $this->Deskripsi_model->get_login_now($id_admin);
            $qx = $datak->row_array();
            $data['fotok'] = $qx['foto'];
            $data['usernamenow'] = $qx['username'];
            $data['count_admin2'] = $this->Deskripsi_model->get_count_admin();
            $data['count_client'] = $this->Deskripsi_model->get_count_client();
            $data['count_barang'] = $this->Deskripsi_model->get_count_barang();
            $data['count_trx'] = $this->Deskripsi_model->get_count_trx();
            $data['report'] = $this->Deskripsi_model->statistik_stock();
            $data['bnyk'] = $this->Deskripsi_model->stock_bnyk();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_nama');

            $this->load->view('admin/Beranda', $data);
        } else {
            redirect('login_admin/system/login');
        }
    }
}
