<?php

class Kategoripng extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategorip_model');
        $this->load->model('Deskripsi_model');
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
            $data['data'] = $this->Kategorip_model->get_all_kategori();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('admin/Kategorip', $data);
        } else {
            $this->load->view('system/Login');
        }
    }

    public function simpan_kategori()
    {
        $kategori = strip_tags($this->input->post('xkategori'));
        $this->Kategorip_model->simpan_kategori($kategori);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('admin/kategoripng');
    }

    public function update_kategori()
    {
        $kode = strip_tags($this->input->post('kode'));
        $kategori = strip_tags($this->input->post('xkategori'));
        $this->Kategorip_model->update_kategori($kode, $kategori);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('admin/kategoripng');
    }

    public function hapus_kategori()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->Kategorip_model->hapus_kategori($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/kategoripng');
    }
}
