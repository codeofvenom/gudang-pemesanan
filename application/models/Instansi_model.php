<?php

class Instansi_model extends CI_Model
{
    public function get_all_instansi()
    {
        $query = $this->db->query('SELECT * FROM tb_instansi');

        return $query;
    }

    public function simpan_instansi($inst, $alamat)
    {
        $query = $this->db->query("insert into tb_instansi(nama_instansi,alamat) values('$inst','$alamat')");

        return $query;
    }

    public function update_instansi($kode, $inst, $alamat)
    {
        $query = $this->db->query("update tb_instansi set nama_instansi='$inst',alamat='$alamat' where id_instansi='$kode'");

        return $query;
    }

    public function hapus_instansi($kode)
    {
        $query = $this->db->query("delete from tb_instansi where id_instansi='$kode'");

        return $query;
    }
}
