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
        $this->load->model('Client_model');
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        $this->load->library('cart');

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
            $adm = $this->session->userdata('ses_id');
            $datak = $this->Client_model->get_profilku($adm);
            $qx = $datak->row_array();
            $data['fotok'] = $qx['foto'];
            $data['usernamenow'] = $qx['username'];
            $data['ktg'] = $this->Kategori_model->tampil_kategori();
            $data['ktrp'] = $this->Barang_model->get_kotra();
            $data['data'] = $this->Barang_model->get_all_barangx();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('client/Barang', $data);
        } else {
            $this->load->view('system/login');
        }
    }

    public function get_barang()
    {
        $kobar = $this->input->post('kode_brg');
        $x['brg'] = $this->Barang_model->get_pbarang($kobar);
        $this->load->view('client/Detail_pesan', $x);
    }

    public function add_to_cart()
    {
        $kobar = $this->input->post('kode_brg');

        $produk = $this->Barang_model->get_pbarang($kobar);
        $i = $produk->row_array();
        $jqty = $this->input->post('xqty');

        $data = array(
        'id' => $i['id_barang'],
        'qty' => $jqty,
        'price' => $i['harga'],
        'name' => $i['nama_barang'],
        'satuan' => $i['satuan'],
        'batch' => $i['batch'],
        'tanggal_produksi' => $i['tanggal_produksi'],
        'tanggal_expired' => $i['tanggal_expired'],
        'keterangan' => $i['keterangan'],
);
        if (!empty($this->cart->total_items())) {
            foreach ($this->cart->contents() as $items) {
                $id = $items['id'];
                $qtylama = $items['qty'];
                $rowid = $items['rowid'];
                $kobar = $this->input->post('kode_brg');
                $qty = $this->input->post('xqty');
                if ($id == $kobar) {
                    $up = array(
                            'rowid' => $rowid,
                            'qty' => $qtylama + $qty,
                        );
                    $this->cart->update($up);
                } else {
                    $this->cart->insert($data);
                }
            }
        } else {
            $this->cart->insert($data);
        }

        redirect('client/barang');
    }

    public function remove()
    {
        $row_id = $this->uri->segment(4);
        $this->cart->update(array(
                'rowid' => $row_id,
                'qty' => 0,
            ));
        redirect('client/barang');
    }

    public function simpan_pesanan()
    {
        $total = $this->input->post('total');
        if (!empty($total)) {
            $qkd = $this->input->post('qkd');
            $namax = $this->input->post('uri');
            $id_client = $this->input->post('urc');
            $id_instansi = $this->input->post('urii');
            $tgl = date('Y-m-d');
            $order_proses = $this->Barang_model->simpan_pesanan($qkd, $tgl, $namax, $id_instansi, $id_client);
            if ($order_proses) {
                $this->cart->destroy();
                redirect('client/barang');
            } else {
                redirect('client/barang');
            }
        } else {
            echo $this->session->set_flashdata('msg', '<label class="label label-danger">Pesanan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
            redirect('client/barang');
        }
    }
}
