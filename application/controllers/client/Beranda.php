<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Beranda extends CI_Controller
{
    private $perPage = 2;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Deskripsi_model');
        $this->load->model('Pengumuman_model');

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
            $qx = $datak->row_array();
            $data['fotok'] = $qx['foto'];
            $data['usernamenow'] = $qx['username'];
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_nama');
            $data['pengumuman'] = $this->Pengumuman_model->pengumuman_jumlah_kategori();
            $data['jml'] = $this->Pengumuman_model->pengumuman_kategori();
            $jum = $this->Pengumuman_model->pengumuman();
            $page = $this->uri->segment(4);
            if (!$page) :
                $offset = 0; else :
                $offset = $page;
            endif;
            $limit = 4;
            $config['base_url'] = base_url().'/client/Beranda/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close'] = '</ul></nav></div>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close'] = '</span>Next</li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close'] = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            $data['posts'] = $this->Pengumuman_model->pengumuman_perpage($offset, $limit);
            $this->load->view('client/Beranda', $data);
        } else {
            redirect('login_admin/system/login');
        }
    }

    public function detail($id)
    {
        if (!empty($id) && $this->session->userdata('client_login') == true) {
            $id_client = $this->session->userdata('ses_id');
            $datak = $this->Deskripsi_model->get_login_client($id_client);
            $qx = $datak->row_array();
            $data['fotok'] = $qx['foto'];
            $data['usernamenow'] = $qx['username'];
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_nama');
            $data['pengumuman'] = $this->Pengumuman_model->pengumuman_jumlah_kategori();
            $data['jml'] = $this->Pengumuman_model->pengumuman_kategori();
            $jum = $this->Pengumuman_model->pengumuman_dkategori($id);
            $page = $this->uri->segment(6);
            if (!$page) :
                $offset = 0; else :
                $offset = $page;
            endif;
            $limit = 4;
            $config['base_url'] = base_url().'/client/beranda/detail/'.$id.'/'.'page/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 6;
            $config['full_tag_open'] = '<div class="pagging text-center"><ul class="pagination justify-content-center pull-right">';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close'] = '</span>Next</li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close'] = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            $data['posts'] = $this->Pengumuman_model->pengumuman_perpage_kategori($id, $offset, $limit);
            $this->load->view('client/Beranda', $data);
        } else {
            redirect('login_admin/system/login');
        }
    }
}
