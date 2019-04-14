<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Deskripsi_model');
        $this->load->model('Kategori_model');
        if ($this->session->userdata('admin_login') != true && $this->session->userdata('super_admin_login') != true && $this->session->userdata('client_login') != true) {
            $url = base_url('');
            redirect($url);
        } elseif ($this->session->userdata('client_login') == true) {
            $url = base_url('client/beranda');
            redirect($url);
        } elseif ($this->session->userdata('admin_login') == true) {
            $url = base_url('admin/beranda');
            redirect($url);
        }
    }

    public function index()
    {
        if ($this->session->userdata('super_admin_login') == true) {
            $id_admin = $this->session->userdata('ses_id');
            $datak = $this->Deskripsi_model->get_login_now($id_admin);
            $qx = $datak->row_array();
            $data['fotok'] = $qx['foto'];
            $data['usernamenow'] = $qx['username'];
            $data['data'] = $this->Kategori_model->tampil_kategori();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('administrator/Kategori', $data);
        } else {
            $this->load->view('system/login');
        }
    }

    public function simpan_kategori()
    {
        $kat = ucwords(strip_tags($this->input->post('xkategori')));
        $this->Kategori_model->simpan_kategori($kat);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('administrator/kategori');
    }

    public function update_kategori()
    {
        $kode = strip_tags($this->input->post('kode'));
        $kat = ucwords(strip_tags($this->input->post('xkategori')));
        $this->Kategori_model->update_kategori($kode, $kat);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('administrator/kategori');
    }

    public function hapus_kategori()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->Kategori_model->hapus_kategori($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('administrator/kategori');
    }
}
