<?php

if (!defined('BASEPATH')) {
    exit('No Direct Script Access Allowed');
}
class E404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('super_admin_login') == true) {
            redirect(site_url('administrator/beranda'), 'refresh');
        } elseif ($this->session->userdata('admin_login') == true) {
            redirect(site_url('admin/beranda'), 'refresh');
        } elseif ($this->session->userdata('client_login') == true) {
            redirect(site_url('client/beranda'), 'refresh');
        } else {
            redirect(site_url('login_admin/system/login/'), 'refresh');
        }
    }
}
