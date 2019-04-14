<?php

class Client_model extends CI_Model
{
    public function get_client_login($kode)
    {
        $query = $this->db->query("SELECT * FROM tb_client where id_client='$kode'");

        return $query;
    }

    public function is_username_available($xusername)
    {
        $this->db->where('username', $xusername);
        $query = $this->db->get('tb_client');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_profilku($adm)
    {
        $query = $this->db->query("SELECT id_client,nama,username,foto,IP,DATE_FORMAT(created_on,'%Y-%m-%d') AS created_on,
		DATE_FORMAT(created_on,'%H:%i:%s') AS  created_time,DATE_FORMAT(last_login,'%H:%i:%s') AS last_login_time,
		DATE_FORMAT(last_login,'%Y-%m-%d') AS last_login,DATE_FORMAT(last_activity,' %H:%i:%s') AS last_activity_time,
		DATE_FORMAT(last_activity,' %Y-%m-%d') AS last_activity,created_by,active
		FROM tb_client WHERE id_client='$adm'");

        return $query;
    }

    public function get_all_client()
    {
        $query = $this->db->query("SELECT tb_client.*,DATE_FORMAT(created_on,'%Y-%m-%d') AS created_on,
		DATE_FORMAT(created_on,'%H:%i:%s') AS  created_time,DATE_FORMAT(last_login,'%H:%i:%s') AS last_login_time,
		DATE_FORMAT(last_login,'%Y-%m-%d') AS last_login,DATE_FORMAT(last_activity,' %H:%i:%s') AS last_activity_time,
		DATE_FORMAT(last_activity,' %Y-%m-%d') AS last_activity,tb_client.created_by,
		tb_client.active,tb_instansi.nama_instansi,tb_instansi.alamat
		FROM tb_client JOIN tb_instansi ON tb_client.id_instansi= tb_instansi.id_instansi");

        return $query;
    }

    public function simpan_client($ins, $username, $nama, $password, $status, $gambar, $creator)
    {
        $hsl = $this->db->query("INSERT INTO tb_client(id_instansi,level,nama,username,password,foto,created_by,active) VALUES ('$ins','3','$nama','$username',SHA1('$password'),'$gambar','$creator','$status')");

        return $hsl;
    }

    public function simpan_client_tanpa_gambar($ins, $username, $nama, $password, $status, $creator)
    {
        $hsl = $this->db->query("INSERT INTO tb_client(id_instansi,level,nama,username,password,created_by,active) VALUES ('$ins','3','$nama','$username',SHA1('$password'),'$creator','$status')");

        return $hsl;
    }

    public function update_client_tanpa_pass($kode, $ins, $nama, $username, $status, $gambar)
    {
        $hsl = $this->db->query("UPDATE tb_client set id_instansi='$ins',nama='$nama',username='$username',
		foto='$gambar',active='$status' where id_client='$kode'");

        return $hsl;
    }

    public function update_client($kode, $ins, $nama, $username, $password, $status, $gambar)
    {
        $hsl = $this->db->query("UPDATE tb_client set  id_instansi='$ins',nama='$nama',username='$username',
		password=SHA1('$password'),foto='$gambar',active='$status' where id_client='$kode'");

        return $hsl;
    }

    public function update_client_tanpa_pass_gambar($kode, $ins, $nama, $username, $status)
    {
        $hsl = $this->db->query("UPDATE tb_client set  id_instansi='$ins',nama='$nama',username='$username',active='$status' where id_client='$kode'");

        return $hsl;
    }

    public function update_client_tanpa_gambar($kode, $ins, $nama, $username, $password, $status)
    {
        $hsl = $this->db->query("UPDATE tb_client set  id_instansi='$ins',nama='$nama',username='$username',password=SHA1('$password'),active='$status' where id_client='$kode'");

        return $hsl;
    }

    public function update_profil_client_tanpa_pass($kode, $nama, $username, $gambar)
    {
        $hsl = $this->db->query("UPDATE tb_client set nama='$nama',username='$username',
		foto='$gambar' where id_client='$kode'");

        return $hsl;
    }

    public function update_profil_client($kode, $nama, $username, $password, $gambar)
    {
        $hsl = $this->db->query("UPDATE tb_client set  nama='$nama',username='$username',
		password=SHA1('$password'),foto='$gambar' where id_client='$kode'");

        return $hsl;
    }

    public function update_profil_client_tanpa_pass_gambar($kode, $nama, $username)
    {
        $hsl = $this->db->query("UPDATE tb_client set  nama='$nama',username='$username' where id_client='$kode'");

        return $hsl;
    }

    public function update_profil_client_tanpa_gambar($kode, $nama, $username, $password)
    {
        $hsl = $this->db->query("UPDATE tb_client set  nama='$nama',username='$username',password=SHA1('$password') where id_client='$kode'");

        return $hsl;
    }

    public function hapus_client($kode)
    {
        $query = $this->db->query("DELETE FROM tb_client where id_client='$kode'");

        return $query;
    }
}
