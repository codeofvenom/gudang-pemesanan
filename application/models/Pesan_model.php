<?php

class Pesan_model extends CI_Model
{
    public function kirim_pesan($nama, $email, $kontak, $pesan)
    {
        $hsl = $this->db->query("INSERT INTO tb_inbox(inbox_nama,inbox_email,inbox_kontak,inbox_pesan) VALUES ('$nama','$email','$kontak','$pesan')");

        return $hsl;
    }

    public function get_all_inbox()
    {
        $hsl = $this->db->query("SELECT tb_inbox.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_inbox ORDER BY inbox_id DESC");

        return $hsl;
    }

    public function hapus_kontak($kode)
    {
        $hsl = $this->db->query("DELETE FROM tb_inbox WHERE inbox_id='$kode'");

        return $hsl;
    }

    public function update_status_kontak()
    {
        $hsl = $this->db->query("UPDATE tb_inbox SET inbox_status='0'");

        return $hsl;
    }
}
