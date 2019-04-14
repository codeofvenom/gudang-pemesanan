<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Client extends CI_Controller
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
        } elseif ($this->session->userdata('super_admin_login') == true) {
            $url = base_url('administrator/beranda');
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
            $data['data'] = $this->Client_model->get_all_client();
            $data['ins'] = $this->Instansi_model->get_all_instansi();
            $data['online'] = $this->Deskripsi_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('admin/Client', $data);
        } else {
            $this->load->view('system/login');
        }
    }

    public function check_username_avalibility()
    {
        if (strlen($_POST['xusername']) <= 2) {
            echo '<label class="text-danger"><i class="fa fa-close" style="color:red"></i><b> Username tidak valid / inputan username harus lebih dari 2 karakter</b></span></label>';
        } else {
            $this->load->model('Client_model');
            if ($this->Client_model->is_username_available($_POST['xusername'])) {
                echo '<script>$("#simpan").attr("disabled", true);</script>
				<label class="text-danger"><i class="fa fa-close" style="color:red"></i><b> Username  telah terdaftar</b></label>';
            } else {
                echo '<script>document.getElementById("simpan").disabled = false;</script>
				<label class="text-success"><i class="fa fa-check" style="color:green"></i> Username  tersedia</label>';
            }
        }
    }

    public function simpan_client()
    {
        $config['upload_path'] = './assets/img/avatar/client/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/avatar/client/'.$gbr['file_name'];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = '80%';
                $config['width'] = 350;
                $config['height'] = 350;
                $config['new_image'] = './assets/img/avatar/client/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $ins = $this->input->post('xins');
                $username = strip_tags($this->input->post('xusername'));
                $nama = ucwords(strip_tags($this->input->post('xnama')));
                $password = $this->input->post('xpassword');
                $konfirm_password = $this->input->post('xpassword2');
                $status = $this->input->post('xstatus');
                $creator = $this->session->userdata('ses_username');
                if ($password != $konfirm_password) {
                    echo $this->session->set_flashdata('msg', 'error');
                    redirect('admin/client');
                } else {
                    $this->Client_model->simpan_client($ins, $username, $nama, $password, $status, $gambar, $creator);
                    echo $this->session->set_flashdata('msg', 'success');
                    redirect('admin/client');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/client');
            }
        } else {
            $username = strip_tags($this->input->post('xusername'));
            $nama = ucwords(strip_tags($this->input->post('xnama')));
            $ins = $this->input->post('xins');
            $password = $this->input->post('xpassword');
            $konfirm_password = $this->input->post('xpassword2');
            $status = $this->input->post('xstatus');
            if ($password != $konfirm_password) {
                echo $this->session->set_flashdata('msg', 'error');
                echo $xins;
                redirect('admin/client');
            } else {
                $this->Client_model->simpan_client_tanpa_gambar($ins, $username, $nama, $password, $status, $creator);
                echo $this->session->set_flashdata('msg', 'success');
                redirect('admin/client');
            }
        }
    }

    public function hapus_client()
    {
        $kode = $this->input->post('kode');
        $datam = $this->Client_model->get_client_login($kode);
        $qp = $datam->row_array();
        $p = $qp['foto'];
        $path = base_url().'/assets/img/avatar/client/'.$p;
        delete_files($path, true);
        $this->Client_model->hapus_client($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/client', 'refresh');
    }

    public function update_client()
    {
        $config['upload_path'] = './assets/img/avatar/client/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/avatar/client/'.$gbr['file_name'];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = '80%';
                $config['width'] = 350;
                $config['height'] = 350;
                $config['new_image'] = './assets/img/avatar/client/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $kode = $this->input->post('kode');
                $nama = $this->input->post('xnama');
                $ins = $this->input->post('xins');
                $username = $this->input->post('xusername');
                $password = $this->input->post('xpassword');
                $konfirm_password = $this->input->post('xpassword2');
                $status = $this->input->post('xstatus');
                if (empty($password) && empty($konfirm_password)) {
                    $this->Client_model->update_client_tanpa_pass($kode, $ins, $nama, $username, $status, $gambar);
                    echo $this->session->set_flashdata('msg', 'info');
                    redirect('admin/client');
                } elseif ($password != $konfirm_password) {
                    echo $this->session->set_flashdata('msg', 'error');
                    redirect('admin/client');
                } else {
                    $this->Client_model->update_client($kode, $ins, $nama, $username, $password, $status, $gambar);
                    echo $this->session->set_flashdata('msg', 'info');
                    redirect('admin/client');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/client');
            }
        } else {
            $kode = $this->input->post('kode');
            $username = strip_tags($this->input->post('xusername'));
            $ins = $this->input->post('xins');
            $nama = ucwords(strip_tags($this->input->post('xnama')));
            $password = $this->input->post('xpassword');
            $konfirm_password = $this->input->post('xpassword2');

            $status = $this->input->post('xstatus');
            if (empty($password) && empty($konfirm_password)) {
                $this->Client_model->update_client_tanpa_pass_gambar($kode, $ins, $nama, $username, $status);
                echo $this->session->set_flashdata('msg', 'info');
                redirect('admin/client');
            } elseif ($password != $konfirm_password) {
                echo $this->session->set_flashdata('msg', 'error');
                redirect('admin/client');
            } else {
                $this->Client_model->update_client_tanpa_gambar($kode, $ins, $nama, $username, $password, $status);
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/client');
            }
        }
    }
}
