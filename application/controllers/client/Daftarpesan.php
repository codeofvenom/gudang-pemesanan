<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Daftarpesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Deskripsi_model');
        $this->load->model('Transaksi_model');
        if ($this->session->userdata('admin_login') != true && $this->session->userdata('super_admin_login') != true && $this->session->userdata('client_login') != true) {
            $url = base_url('');
            redirect($url);
        } elseif ($this->session->userdata('admin_login') == true) {
            $url = base_url('admin/beranda');
            redirect($url);
        } elseif ($this->session->userdata('super_admin_login') == true) {
            $url = base_url('administrator/beranda');
            redirect($url);
        }
    }

    public function index()
    {
        if ($this->session->userdata('client_login') == true) {
            $id_client = $this->session->userdata('ses_id');
            $datak = $this->Deskripsi_model->get_login_client($id_client);
            $ins = $this->session->userdata('ses_ins');
            $qx = $datak->row_array();
            $data['fotok'] = $qx['foto'];
            $data['usernamenow'] = $qx['username'];
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['data'] = $this->Transaksi_model->data_transaksi_proses($ins);
            $data['nama'] = $this->session->userdata('ses_nama');
            $this->load->view('client/Daftar_Pesan', $data);
        } else {
            redirect('login_admin/system/login');
        }
    }
}
