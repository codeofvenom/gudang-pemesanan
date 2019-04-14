<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
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
            $this->load->view('system/Login');
        }
    }

    public function auth()
    {
        $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES, 'UTF-8');
        $check_admin = $this->Login_model->auth_admin($username, $password);

        if ($check_admin->num_rows() > 0) {
            $data = $check_admin->row_array();
            if ($data['level'] == '1' && $data['active'] == '1') {
                $this->session->set_userdata('super_admin_login', true);
                $this->session->set_userdata('ses_id', $data['id_admin']);
                $this->session->set_userdata('ses_username', $data['username']);
                $this->session->set_userdata('ses_nama', $data['nama']);
                $this->session->set_userdata('level', '1');
                $ip = $_SERVER['REMOTE_ADDR'];
                $id = $this->session->userdata('ses_id');
                $this->Login_model->admin_online($id, $ip);
                redirect('administrator/beranda');
            } elseif ($data['level'] == '2' && $data['active'] == '1') {
                $this->session->set_userdata('admin_login', true);
                $this->session->set_userdata('ses_id', $data['id_admin']);
                $this->session->set_userdata('ses_username', $data['username']);
                $this->session->set_userdata('ses_nama', $data['nama']);
                $this->session->set_userdata('level', '2');
                $ip = $_SERVER['REMOTE_ADDR'];
                $id = $this->session->userdata('ses_id');
                $this->Login_model->admin_online($id, $ip);
                redirect('admin/beranda');
            } elseif ($data['level'] == '2' && $data['active'] == '0') {
                echo $this->session->set_flashdata('msg', 'Account sedang di deactive silahkan hubungi Administrator');
                redirect('login_admin/system/login');
            } else {
                $url = base_url('login');
                echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
                redirect($url);
            }
        } else {
            $check_client = $this->Login_model->auth_client($username, $password);
            if ($check_client->num_rows() > 0) {
                $data = $check_client->row_array();
                if ($data['level'] == '3' && $data['active'] == '1') {
                    $this->session->set_userdata('client_login', true);
                    $this->session->set_userdata('ses_id', $data['id_client']);
                    $this->session->set_userdata('ses_ins', $data['id_instansi']);
                    $this->session->set_userdata('ses_username', $data['username']);
                    $this->session->set_userdata('ses_nama', $data['nama']);
                    $this->session->set_userdata('level', '3');
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $id = $this->session->userdata('ses_id');
                    $this->Login_model->client_online($id, $ip);
                    redirect('client/beranda');
                } elseif ($data['level'] == '3' && $data['active'] == '0') {
                    echo $this->session->set_flashdata('msg', 'Account sedang di deactive silahkan hubungi Administrator');
                    redirect('login_admin/system/login');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
                redirect('login_admin/system/login');
            }
        }
    }

    public function logout()
    {
        if ($this->session->userdata('admin_login') != true && $this->session->userdata('super_admin_login') != true && $this->session->userdata('client_login') != true) {
            $url = base_url('');
            redirect($url);
        } else {
            $level = $this->session->userdata('level');
            $id = $this->session->userdata('ses_id');
            $ip = $_SERVER['REMOTE_ADDR'];
            echo $id;
            $this->Login_model->logoutku($id, $level, $ip);
            // $this->session->sess_destroy();
            redirect(site_url('login_admin/system/login'), 'refresh');
        }
    }
}
