<?php

class Admin_model extends CI_Model
{
    public function get_admin_login($kode)
    {
        $query = $this->db->query("SELECT * FROM tb_admin where id_admin='$kode'");

        return $query;
    }

    public function is_username_available($xusername)
    {
        $this->db->where('username', $xusername);
        $query = $this->db->get('tb_admin');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_profilku($adm)
    {
        $query = $this->db->query("SELECT id_admin,nama,username,foto,IP,DATE_FORMAT(created_on,'%Y-%m-%d') AS created_on,
		DATE_FORMAT(created_on,'%H:%i:%s') AS  created_time,DATE_FORMAT(last_login,'%H:%i:%s') AS last_login_time,
		DATE_FORMAT(last_login,'%Y-%m-%d') AS last_login,DATE_FORMAT(last_activity,' %H:%i:%s') AS last_activity_time,
		DATE_FORMAT(last_activity,' %Y-%m-%d') AS last_activity,created_by,active
		FROM tb_admin WHERE id_admin='$adm'");

        return $query;
    }

    public function get_all_admin()
    {
        $query = $this->db->query("SELECT id_admin,nama,username,foto,IP,DATE_FORMAT(created_on,'%Y-%m-%d') AS created_on,
		DATE_FORMAT(created_on,'%H:%i:%s') AS  created_time,DATE_FORMAT(last_login,'%H:%i:%s') AS last_login_time,
		DATE_FORMAT(last_login,'%Y-%m-%d') AS last_login,DATE_FORMAT(last_activity,' %H:%i:%s') AS last_activity_time,
		DATE_FORMAT(last_activity,' %Y-%m-%d') AS last_activity,created_by,active
		FROM tb_admin WHERE level='2' ");

        return $query;
    }

    public function simpan_admin($username, $nama, $password, $status, $gambar, $creator)
    {
        $hsl = $this->db->query("INSERT INTO tb_admin(level,nama,username,password,foto,created_by,active) VALUES ('2','$nama','$username',SHA1('$password'),'$gambar','$creator','$status')");

        return $hsl;
    }

    public function simpan_admin_tanpa_gambar($username, $nama, $password, $status, $creator)
    {
        $hsl = $this->db->query("INSERT INTO tb_admin (level,nama,username,password,created_by,active) VALUES ('2','$nama','$username',SHA1('$password'),'$creator','$status')");

        return $hsl;
    }

    public function update_admin_tanpa_pass($kode, $nama, $username, $status, $gambar)
    {
        $hsl = $this->db->query("UPDATE tb_admin set nama='$nama',username='$username',
		foto='$gambar',active='$status' where id_admin='$kode'");

        return $hsl;
    }

    public function update_admin($kode, $nama, $username, $password, $status, $gambar)
    {
        $hsl = $this->db->query("UPDATE tb_admin set  nama='$nama',username='$username',
		password=SHA1('$password'),foto='$gambar',active='$status' where id_admin='$kode'");

        return $hsl;
    }

    public function update_admin_tanpa_pass_gambar($kode, $nama, $username, $status)
    {
        $hsl = $this->db->query("UPDATE tb_admin set  nama='$nama',username='$username',active='$status' where id_admin='$kode'");

        return $hsl;
    }

    public function update_admin_tanpa_gambar($kode, $nama, $username, $password, $status)
    {
        $hsl = $this->db->query("UPDATE tb_admin set  nama='$nama',username='$username',password=SHA1('$password'),active='$status' where id_admin='$kode'");

        return $hsl;
    }

    public function update_profil_admin_tanpa_pass($kode, $nama, $username, $gambar)
    {
        $hsl = $this->db->query("UPDATE tb_admin set nama='$nama',username='$username',
		foto='$gambar' where id_admin='$kode'");

        return $hsl;
    }

    public function update_profil_admin($kode, $nama, $username, $password, $gambar)
    {
        $hsl = $this->db->query("UPDATE tb_admin set  nama='$nama',username='$username',
		password=SHA1('$password'),foto='$gambar' where id_admin='$kode'");

        return $hsl;
    }

    public function update_profil_admin_tanpa_pass_gambar($kode, $nama, $username)
    {
        $hsl = $this->db->query("UPDATE tb_admin set  nama='$nama',username='$username' where id_admin='$kode'");

        return $hsl;
    }

    public function update_profil_admin_tanpa_gambar($kode, $nama, $username, $password)
    {
        $hsl = $this->db->query("UPDATE tb_admin set  nama='$nama',username='$username',password=SHA1('$password') where id_admin='$kode'");

        return $hsl;
    }

    public function hapus_admin($kode)
    {
        $query = $this->db->query("DELETE FROM tb_admin where id_admin='$kode'");

        return $query;
    }
}
