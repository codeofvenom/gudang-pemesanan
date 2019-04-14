<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model');
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
            $data['kat'] = $this->Kategorip_model->get_all_kategori();

            $data['data'] = $this->Pengumuman_model->get_all_pengumuman();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('admin/Pengumuman', $data);
        } else {
            $this->load->view('system/Login');
        }
    }

    public function simpan_pengumuman()
    {
        $qkd = $this->Pengumuman_model->unique_code();
        $judul = strip_tags(ucwords(strtolower($this->input->post('xjudul'))));
        $kategori = strip_tags($this->input->post('xkategori'));
        $isi = strip_tags($this->input->post('xisi'));
        $author = ucfirst($this->session->userdata('ses_nama'));
        $this->Pengumuman_model->simpan_pengumuman($qkd, $judul, $kategori, $isi, $author);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('admin/pengumuman', 'refresh');
    }

    public function hapus_pengumuman()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->Pengumuman_model->hapus_pengumuman($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/pengumuman', 'refresh');
    }

    public function update_pengumuman()
    {
        $kode = strip_tags($this->input->post('kode'));
        $judul = strip_tags(ucwords(strtolower($this->input->post('xjudul'))));
        $kategori = strip_tags($this->input->post('xkategori'));
        $isi = strip_tags($this->input->post('xisi'));
        $this->Pengumuman_model->update_pengumuman($kode, $judul, $kategori, $isi);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('admin/pengumuman', 'refresh');
    }
}
