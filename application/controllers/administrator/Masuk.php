<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Deskripsi_model');
        $this->load->model('Barang_model');
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
            $data['brg'] = $this->Barang_model->get_barang();
            $data['data'] = $this->Barang_model->get_all_barang_so();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('administrator/Masuk', $data);
        } else {
            $this->load->view('system/login');
        }
    }

    public function simpan_barang()
    {
        $nama = strip_tags($this->input->post('xnama'));
        $brg = strip_tags($this->input->post('xbrg'));
        $stock = strip_tags($this->input->post('xstock'));
        $satuan = strip_tags($this->input->post('xsatuan'));
        $harga = strip_tags($this->input->post('xharga'));
        $batch = strip_tags($this->input->post('xbatch'));
        $xtgl = $this->input->post('xtgl');
        $mtgl = $this->input->post('xmtgl');
        $xprtgl = $this->input->post('xprtgl');

        if (!empty($this->input->post('xmtgl'))) {
            $mtgl = $this->input->post('xmtgl');
        } else {
            $mtgl = date('Y-m-d');;
        }
        if($stock =0  && $stock < 0){
            $stock=0;
        }else{
             $stock = strip_tags($this->input->post('xstock'));
        }
        $ket = strip_tags($this->input->post('xket'));
        if (!empty($this->input->post('xket'))) {
            $ket = strip_tags($this->input->post('xket'));
        } else {
            $ket = '';
        }
        $ktm = $this->Barang_model->get_kotram();
        $this->Barang_model->simpan_stock($nama, $batch, $stock, $satuan, $harga, $xprtgl, $mtgl, $xtgl, $ket, $ktm);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('administrator/masuk');
    }

    public function hapus_barang()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->Barang_model->hapus_barang($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('administrator/masuk');
    }

    public function update_stock()
    {
        $kode = $this->input->post('kode');
        $brg = $this->input->post('idb');
        $input = $this->input->post('kodex');
        $stock = strip_tags($this->input->post('xstock'));
        $satuan = strip_tags($this->input->post('xsatuan'));
        $harga = strip_tags($this->input->post('xharga'));
        $batch = strip_tags($this->input->post('xbatch'));
        $xtgl = $this->input->post('xtgl');
        $mtgl = $this->input->post('xmtgl');
        $rstock = strip_tags($this->input->post('xrstock'));
        $xprtgl = $this->input->post('xprtgl');
        if (!empty($this->input->post('xstock'))) {
            $stock = $this->input->post('xstock');
        } else {
            $stock = 0;
        }
        if($stock =0  && $stock < 0 ){
            $stock=0;
        }else{
             $stock = strip_tags($this->input->post('xstock'));
        }
        if (!empty($this->input->post('xrstock'))) {
            $rstock = $this->input->post('xrstock');
        } else {
            $rstock = 0;
        }
        if (!empty($this->input->post('xmtgl'))) {
            $mtgl = $this->input->post('xmtgl');
        } else {
            $mtgl = date('Y-m-d');
        }
        $ket = strip_tags($this->input->post('xket'));
        if (!empty($this->input->post('xket'))) {
            $ket = strip_tags($this->input->post('xket'));
        } else {
            $ket = '';
        }


        $this->Barang_model->update_stock($kode, $brg, $batch, $stock, $rstock, $satuan, $harga, $xprtgl, $mtgl, $xtgl, $ket, $input);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('administrator/masuk');
    }

    public function cetakStokOpname()
    {
        //$data = $this->Barang_model->detail_barang('BR000001');
        $data['dataview'] = $this->Barang_model->getStokOpname();
        $data['kategori'] = $this->Barang_model->getKategoriBarang();
        //load the view and saved it into $html variable
        $html=$this->load->view('administrator/Stoc_Opname', $data, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";
        //load mPDF library
        $this->load->library('m_pdf');
       //generate the PDF from the given html
        $this->m_pdf->pdf->AddPage('L');
        $this->m_pdf->pdf->WriteHTML($html);
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "I");
    }
}
