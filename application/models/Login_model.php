<?php

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function admin_online($id, $ip)
    {
        $query = $this->db->query("UPDATE tb_admin SET online ='1',last_login=SYSDATE(),IP='$ip' WHERE id_admin='$id'");

        return $query;
    }

    public function client_online($id, $ip)
    {
        $query = $this->db->query("UPDATE tb_client SET online ='1',last_login=SYSDATE(),IP='$ip' WHERE id_client='$id'");

        return $query;
    }

    public function auth_admin($username, $password)
    {
        $query = $this->db->query('SELECT * FROM tb_admin WHERE username= ?
		AND password=SHA1(?) LIMIT 1', array('username' => $username, 'password' => $password));

        return $query;
    }

    public function auth_client($username, $password)
    {
        $query = $this->db->query('SELECT * FROM tb_client WHERE username= ?
		 AND password=SHA1(?) LIMIT 1', array('username' => $username, 'password' => $password));

        return $query;
    }

    public function logoutku($id, $level, $ip)
    {
        $check_active_admin = $this->db->query("SELECT id_admin,level FROM tb_admin  WHERE id_admin='$id' AND level='$level' LIMIT 1");
        if ($check_active_admin->num_rows() <= 0) {
            $query = $this->db->query("UPDATE tb_client SET last_activity=SYSDATE(),IP='$ip',online='0' WHERE id_client='$id' AND level='$level' LIMIT 1");
        } else {
            $query = $this->db->query("UPDATE tb_admin SET last_activity=SYSDATE(),IP='$ip',online='0' WHERE id_admin='$id' AND level='$level' LIMIT 1");
        }

        return $check_active_admin;
    }
}
