<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Deskripsi_model');
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        $this->load->library('Pdf');

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
            $data['ktg'] = $this->Kategori_model->tampil_kategori();
            $data['data'] = $this->Barang_model->get_all_barang();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('administrator/Barang', $data);
        } else {
            $this->load->view('system/login');
        }
    }

    public function simpan_barang()
    {
        $qkd = $this->Barang_model->get_kobar();
        $nama = ucwords(strip_tags($this->input->post('xnama')));
        $ktg = strip_tags($this->input->post('xktg'));
        $stock = strip_tags($this->input->post('xstock'));
        $satuan = strip_tags($this->input->post('xsatuan'));
        $harga = strip_tags($this->input->post('xharga'));
        $batch = strip_tags($this->input->post('xbatch'));
        $xtgl = $this->input->post('xtgl');
        $xprtgl = $this->input->post('xprtgl');
        $mtgl = $this->input->post('xmtgl');
        if($stock<=0){
             $stock = 0;
        }else{
             $stock = strip_tags($this->input->post('xstock'));
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
        $xrsk = strip_tags($this->input->post('xrstock'));
        $ktm = $this->Barang_model->get_kotram();
        $this->Barang_model->simpan_barang($ktm, $qkd, $nama, $ktg, $stock, $satuan, $harga, $batch, $xprtgl, $xtgl, $mtgl, $ket);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('administrator/barang');
    }

    public function hapus_barang()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->Barang_model->hapus_barang($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('administrator/barang');
    }

    public function update_barang()
    {
        $kode = $this->input->post('kode');
        $nama = ucwords(strip_tags($this->input->post('xnama')));
        $ktg = strip_tags($this->input->post('xktg'));
        $stock = strip_tags($this->input->post('xstock'));
        $satuan = strip_tags($this->input->post('xsatuan'));
        $harga = strip_tags($this->input->post('xharga'));
        $batch = strip_tags($this->input->post('xbatch'));
        $xtgl = $this->input->post('xtgl');
        $xprtgl = $this->input->post('xprtgl');
        $mtgl = $this->input->post('xmtgl');
        $rsk = strip_tags($this->input->post('xrstock'));
        
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
        if($stock <=0){
            $stock=0;
        }else{
             $stock = strip_tags($this->input->post('xstock'));
        }
        if($rsk>=$stock){
                 $rsk = strip_tags($this->input->post('xstock'));
        }else{
             $rsk = strip_tags($this->input->post('xrstock'));
        }

        $this->Barang_model->update_barang($kode, $nama, $ktg, $stock, $rsk, $satuan, $harga, $batch, $xprtgl, $xtgl, $mtgl, $ket);
        redirect('administrator/barang');
    }

    public function detail($kode)
    {
        if (!empty($kode)) {
            $kode = $this->uri->segment(4);
            $cb = $this->Barang_model->check_barangs($kode);
            if ($cb == true) {
                $id_admin = $this->session->userdata('ses_id');
                $datak = $this->Deskripsi_model->get_login_now($id_admin);
                $qx = $datak->row_array();
                $data['fotok'] = $qx['foto'];
                $data['usernamenow'] = $qx['username'];
                $data['online'] = $this->Deskripsi_model->get_online();
                $data['data'] = $this->Barang_model->detail_barang($kode);
                $data['datax'] = $this->Barang_model->detail_trans_barang($kode);
                $this->load->view('administrator/Detail', $data);
            } else {
                redirect('administrator/barang', 'refresh');
            }
        } else {
            redirect('administrator/barang', 'refresh');
        }
    }

    public function cetakbarang($kode)
    {
        $data['persediaan'] = $this->Barang_model->getpersediaan($kode);
        $this->load->view('administrator/print', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once './assets/html2pdf/html2pdf.class.php';
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Siswa.pdf', 'D');
    }

    public function cetakKartu($kode)
    {
        //$data = $this->Barang_model->detail_barang('BR000001');
        $data['dataview'] = $this->Barang_model->detail_barang_pdf($kode);
        $data['dataTransaksi'] = $this->Barang_model->detail_barang_transaksi($kode);
        //load the view and saved it into $html variable
        $html = $this->load->view('administrator/kartu_persediaan', $data, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = 'output_pdf_name.pdf';
        //load mPDF library
        $this->load->library('m_pdf');
        //generate the PDF from the given html
        $this->m_pdf->pdf->AddPage('L');
        $this->m_pdf->pdf->WriteHTML($html);
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    }

    public function cetakLaporanPersediaan()
    {
        //$data = $this->Barang_model->detail_barang('BR000001');
        $data['dataview'] = $this->Barang_model->getLaporanPersediaan();
        $data['kategori'] = $this->Barang_model->getKategoriBarang();
        //load the view and saved it into $html variable
        $html = $this->load->view('administrator/Laporan_persediaan', $data, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = 'output_pdf_name.pdf';
        //load mPDF library
        $this->load->library('m_pdf');
        //generate the PDF from the given html
        $this->m_pdf->pdf->AddPage('L');
        $this->m_pdf->pdf->WriteHTML($html);
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    }

    public function cetakLaporanPersediaanBulanan()
    {
        //$data = $this->Barang_model->detail_barang('BR000001');
        $data['databarang'] = $this->Barang_model->getListBarang();
        $data['datamasukbulanlalu'] = $this->Barang_model->getBarangMasukBulanLalu();
        $data['datamasukbulanini'] = $this->Barang_model->getBarangMasukBulanIni();
        $data['datakeluarbulanlalu'] = $this->Barang_model->getBarangKeluarBulanLalu();
        $data['datakeluarbulanini'] = $this->Barang_model->getBarangKeluarBulanIni();

        //load the view and saved it into $html variable
        $html = $this->load->view('administrator/Laporan_Gudang', $data, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = 'output_pdf_name.pdf';
        //load mPDF library
        $this->load->library('m_pdf');
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    }
}
