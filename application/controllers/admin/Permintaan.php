<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Permintaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Deskripsi_model');
        $this->load->model('Transaksi_model');

        if ($this->session->userdata('admin_login') != true && $this->session->userdata('super_admin_login') != true && $this->session->userdata('client_login') != true) {
            $url = base_url('');
            redirect($url);
        } elseif ($this->session->userdata('client_login') == true) {
            $url = base_url('client/beranda');
            redirect($url);
        } elseif ($this->session->userdata('super_admin_login') == true) {
            $url = base_url('admin/beranda');
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
            $data['data'] = $this->Transaksi_model->get_all_trx();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('admin/Permintaan', $data);
        } else {
            $this->load->view('system/Login');
        }
    }

    public function terima()
    {
        $kode = strip_tags($this->input->post('kode'));
        $kode2 = strip_tags($this->input->post('kode2'));
        $kode3 = strip_tags($this->input->post('kode3'));
        $this->Transaksi_model->terima($kode);
        $this->Transaksi_model->terima_proses($kode2, $kode3);
        redirect('admin/permintaan');
    }

    public function tolak()
    {
        $kode = strip_tags($this->input->post('kode'));
        $kode2 = $this->input->post('kode2');
        $kode3 = strip_tags($this->input->post('kode3'));
        $this->Transaksi_model->tolak($kode, $kode2, $kode3);
        redirect('admin/permintaan');
    }
}
