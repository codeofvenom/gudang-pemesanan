<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Proses extends CI_Controller
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
            $data['data'] = $this->Transaksi_model->get_all_trx_proses();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('administrator/Proses', $data);
        } else {
            $this->load->view('system/login');
        }
    }

    public function selesai()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->Transaksi_model->selesai($kode);
        redirect('administrator/proses');
    }

    public function cetakKartuPengeluaran($kode)
    {
        //$data = $this->Barang_model->detail_barang('BR000001');
        $data['dataview'] = $this->Transaksi_model->getKartuPengeluaran($kode);
        //load the view and saved it into $html variable
        $html = $this->load->view('administrator/2PAGE_Surat_bukti_barang_keluar', $data, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = 'output_pdf_name.pdf';
        //load mPDF library
        $this->load->library('m_pdf');
        //generate the PDF from the given html
        $this->m_pdf->pdf->AddPage();
        $this->m_pdf->pdf->WriteHTML($html);
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    }
}
