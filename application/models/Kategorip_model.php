<?php

class Kategorip_model extends CI_Model
{
    public function get_all_kategori()
    {
        $query = $this->db->query('select * from tb_kategori_png');

        return $query;
    }

    public function simpan_kategori($kategori)
    {
        $query = $this->db->query("insert into tb_kategori_png(nama_kategori) values('$kategori')");

        return $query;
    }

    public function update_kategori($kode, $kategori)
    {
        $query = $this->db->query("update tb_kategori_png set nama_kategori='$kategori' where id_kategori_png='$kode'");

        return $query;
    }

    public function hapus_kategori($kode)
    {
        $query = $this->db->query("delete from tb_kategori_png where id_kategori_png='$kode'");

        return $query;
    }

    public function get_kategori_byid($id_kategori)
    {
        $query = $this->db->query("select * from tb_kategori_png where id_kategori_png='$id_kategori'");

        return $query;
    }
}
