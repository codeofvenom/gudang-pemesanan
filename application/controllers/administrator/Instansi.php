<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Instansi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Deskripsi_model');
        $this->load->model('Client_model');
        $this->load->model('Instansi_model');

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
            $data['data'] = $this->Instansi_model->get_all_instansi();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('administrator/Instansi', $data);
        } else {
            $this->load->view('system/login');
        }
    }

    public function simpan_instansi()
    {
        $alamat = ucwords(strip_tags(strtolower($this->input->post('xalamat'))));
        $inst = ucwords(strip_tags(strtolower($this->input->post('xnins'))));
        $this->Instansi_model->simpan_instansi($inst, $alamat);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('administrator/instansi');
    }

    public function update_instansi()
    {
        $kode = strip_tags($this->input->post('kode'));
        $alamat = ucwords(strip_tags(strtolower($this->input->post('xalamat'))));
        $inst = ucwords(strip_tags(strtolower($this->input->post('xnins'))));
        $this->Instansi_model->update_instansi($kode, $inst, $alamat);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('administrator/instansi');
    }

    public function hapus_instansi()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->Instansi_model->hapus_instansi($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('administrator/instansi');
    }
}
