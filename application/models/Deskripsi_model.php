<?php

class Deskripsi_model extends CI_Model
{
    public function get_count_administrator()
    {
        $query = $this->db->query("SELECT COUNT(id_admin) AS jumlah FROM tb_admin WHERE level ='1' LIMIT 1");

        return $query->row()->jumlah;
    }

    public function get_count_admin()
    {
        $query = $this->db->query("SELECT COUNT(id_admin) AS jumlah FROM tb_admin WHERE level ='2' LIMIT 1");

        return $query->row()->jumlah;
    }

    public function get_count_client()
    {
        $query = $this->db->query('SELECT COUNT(id_client) AS jumlah FROM tb_client  LIMIT 1');

        return $query->row()->jumlah;
    }

    public function get_count_barang()
    {
        $query = $this->db->query('SELECT COUNT(id_barang) AS jumlah FROM tb_barang  LIMIT 1');

        return $query->row()->jumlah;
    }

    public function get_count_trx()
    {
        $query = $this->db->query("SELECT COUNT(id_transaksi) AS jumlah FROM tb_transaksi WHERE (status !='4' AND status !='5')  LIMIT 1");

        return $query->row()->jumlah;
    }

    public function statistik_stock()
    {
        $query = $this->db->query("SELECT tb_barang.nama_barang, sum(tb_transaksi.jumlah) as 'jumlah' from tb_barang,tb_transaksi WHERE tb_transaksi.id_barang = tb_barang.id_barang and tb_transaksi.status='3' GROUP BY tb_transaksi.id_barang DESC Limit 5");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }

            return $hasil;
        }
    }

    public function stock_bnyk()
    {
        $query = $this->db->query("SELECT nama_barang, jumlah_stock AS 'jumlah' FROM tb_barang ORDER BY jumlah DESC Limit 5");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }

            return $hasil;
        }
    }

    public function get_online()
    {
        $query = $this->db->query('SELECT(SELECT COUNT(id_client) FROM tb_client WHERE online = 1)+ 
		(SELECT COUNT(tb_admin.id_admin)FROM tb_admin WHERE online = 1 ) AS online');

        return $query->row()->online;
    }

    public function get_login_now($id_admin)
    {
        $query = $this->db->query("SELECT * FROM tb_admin WHERE id_admin = '$id_admin'");

        return $query;
    }

    public function get_login_client($id_client)
    {
        $query = $this->db->query("SELECT * FROM tb_client WHERE id_client = '$id_client'");

        return $query;
    }

    public function get_foto_admku($adm)
    {
        $query = $this->db->query("SELECT foto FROM tb_admin WHERE id_admin='$adm'");

        return $query;
    }

    public function get_username_admku($adm)
    {
        $query = $this->db->query("SELECT username FROM tb_admin WHERE id_admin='$adm'");

        return $query;
    }

    public function get_count_all()
    {
        $query = $this->db->query('SELECT(SELECT COUNT(id_client) FROM tb_client)+ 
		(SELECT COUNT(id_admin)FROM tb_admin ) AS jumlah LIMIT 1');

        return $query->row()->jumlah;
    }
}
