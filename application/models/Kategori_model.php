<?php

class Kategori_model extends CI_Model
{
    public function hapus_kategori($kode)
    {
        $hsl = $this->db->query("DELETE FROM tb_kategori where id_kategori='$kode'");

        return $hsl;
    }

    public function update_kategori($kode, $kat)
    {
        $hsl = $this->db->query("UPDATE tb_kategori set nama_kategori='$kat' where id_kategori='$kode'");

        return $hsl;
    }

    public function tampil_kategori()
    {
        $hsl = $this->db->query('select * from tb_kategori order by id_kategori desc');

        return $hsl;
    }

    public function simpan_kategori($kat)
    {
        $hsl = $this->db->query("INSERT INTO tb_kategori(nama_kategori) VALUES ('$kat')");

        return $hsl;
    }
}
