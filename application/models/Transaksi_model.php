<?php

class Transaksi_model extends CI_Model
{
    public function get_all_trx()
    {
        $query = $this->db->query("SELECT tb_transaksi.id_transaksi,tb_transaksi.uraian AS nama_instansi,
		tb_transaksi.kode_transaksi,tb_transaksi.jumlah,tb_transaksi.harga,tb_kategori.nama_kategori,tb_transaksi.id_barang,
		tb_transaksi.satuan,DATE_FORMAT(tanggal,'%Y-%m-%d') AS tanggal,tb_barang.nama_barang
		FROM tb_transaksi JOIN tb_barang ON  tb_transaksi.id_barang=tb_barang.id_barang 
		JOIN tb_kategori ON tb_barang.id_kategori=tb_kategori.id_kategori WHERE tb_transaksi.status=1
		ORDER BY  tb_transaksi.tanggal ASC ");

        return $query;
    }

    // public function get_all_trx_proses()
    // {
    //     $query = $this->db->query("SELECT tb_transaksi.id_transaksi,transaksi_proses.jumlah_transaksi,tb_transaksi.uraian AS nama_instansi,
    // 	tb_transaksi.kode_transaksi,tb_transaksi.jumlah,tb_transaksi.harga,tb_kategori.nama_kategori,
    // 	tb_transaksi.satuan,DATE_FORMAT(tanggal,'%Y-%m-%d') AS tanggal,tb_barang.nama_barang
    // 	FROM tb_transaksi JOIN tb_barang ON tb_transaksi.id_barang=tb_barang.id_barang
    // 	JOIN transaksi_proses ON tb_transaksi.kode_transaksi=transaksi_proses.kode_transaksi
    // 	JOIN tb_kategori ON tb_barang.id_kategori=tb_kategori.id_kategori WHERE tb_transaksi.status=2
    // 	ORDER BY  tb_transaksi.tanggal ASC ");

    //     return $query;
    // }

    public function get_all_trx_proses()
    {
        $query = $this->db->query("SELECT  tb_transaksi.id_transaksi,transaksi_proses.jumlah_transaksi AS jumlah_transaksi,tb_transaksi.uraian AS nama_instansi,
        tb_transaksi.kode_transaksi,tb_transaksi.jumlah,tb_transaksi.harga,tb_kategori.nama_kategori,
        tb_transaksi.satuan,DATE_FORMAT(tanggal,'%Y-%m-%d') AS tanggal,tb_barang.nama_barang
        FROM tb_transaksi JOIN tb_barang ON tb_transaksi.id_barang=tb_barang.id_barang
        JOIN transaksi_proses ON tb_transaksi.kode_transaksi=transaksi_proses.kode_transaksi
        JOIN tb_kategori ON tb_barang.id_kategori=tb_kategori.id_kategori WHERE tb_transaksi.status=2 GROUP BY tb_transaksi.kode_transaksi
        ORDER BY  tb_transaksi.tanggal ASC ");

        return $query;
    }

    public function get_all_trx_selesai()
    {
        $query = $this->db->query("SELECT tb_transaksi.id_transaksi,tb_transaksi.uraian AS nama_instansi,
    	tb_transaksi.kode_transaksi,tb_transaksi.jumlah,tb_transaksi.harga,tb_kategori.nama_kategori,
    	tb_transaksi.satuan,DATE_FORMAT(tanggal,'%Y-%m-%d') AS tanggal,tb_barang.nama_barang,tb_transaksi.status
    	FROM tb_transaksi JOIN tb_barang ON tb_transaksi.id_barang=tb_barang.id_barang
    	JOIN tb_kategori ON tb_barang.id_kategori=tb_kategori.id_kategori WHERE tb_transaksi.status=0 OR tb_transaksi.status=3
		ORDER BY tb_transaksi.status DESC");

        return $query;
    }

    public function terima($kode)
    {
        $query = $this->db->query("UPDATE tb_transaksi set status='2' WHERE id_transaksi='$kode'");

        return $query;
    }

    public function terima_proses($kode2, $kode3)
    {
        $cek_trx = $this->db->query("SELECT kode_transaksi,nama_instansi FROM transaksi_proses WHERE kode_transaksi='$kode2'");
        if ($cek_trx->num_rows() <= 0) {
            $hsl = $this->db->query("INSERT INTO transaksi_proses(kode_transaksi,nama_instansi,jumlah_transaksi) VALUES('$kode2','$kode3',1)");
        } else {
            $hsl = $this->db->query("UPDATE transaksi_proses SET jumlah_transaksi= jumlah_transaksi+1 WHERE kode_transaksi ='$kode2' AND nama_instansi='$kode3'");
        }

        return $cek_trx;
    }

    public function data_transaksi_proses($ins)
    {
        $query = $this->db->query("SELECT tb_barang.nama_barang,tb_barang.satuan,tb_transaksi.tanggal,tb_transaksi.status,
		tb_transaksi.jumlah,tb_transaksi.uraian as nama_client FROM tb_transaksi
		JOIN tb_barang ON tb_transaksi.id_barang=tb_barang.id_barang
		JOIN tb_instansi ON tb_instansi.id_instansi=tb_transaksi.id_instansi
		WHERE (tb_transaksi.id_instansi='$ins' AND (tb_transaksi.status='0' OR tb_transaksi.status='1' OR  tb_transaksi.status='2' OR tb_transaksi.status='3'))
		ORDER BY tb_transaksi.status DESC  ");

        return $query;
    }

    public function tolak($kode, $kode2, $kode3)
    {
        $this->db->query("UPDATE tb_transaksi set status='0' WHERE id_transaksi='$kode'");
        $this->db->query("UPDATE tb_barang set jumlah_stock=jumlah_stock+'$kode3' WHERE id_barang='$kode2'");

        return true;
    }

    // public function select_selesai($kode)
    // {
    //     $cek_stat = $this->db->query("SELECT id_transaksi,status FROM tb_transaksi WHERE id_transaksi='$kode' AND status='2'");

    //     return $cek_stat;
    // }

    public function selesai($kode)
    {
        $this->db->query("UPDATE tb_transaksi set status='3' WHERE id_transaksi='$kode' AND status='2'");

        return true;
    }

    public function getKartuPengeluaran($kode)
    {
        $query = $this->db->query("SELECT c.nama_instansi, c.alamat, b.jumlah, b.satuan, a.nama_barang, b.harga, b.batch, a.tanggal_produksi, a.tanggal_expired, a.keterangan from tb_barang a, tb_transaksi b, tb_instansi c where b.status!=0 and (b.status=2 or b.status=3) and b.uraian = c.nama_instansi and a.id_barang=b.id_barang and b.kode_transaksi='$kode' ");

        return $query->result();
    }

    public function getBukuMasuk(){
         $query = $this->db->query("SELECT b.tanggal, b.jumlah, a.satuan, a.nama_barang, b.harga, (b.harga * b.jumlah) as 'JumlahHarga', b.batch, a.tanggal_produksi, a.tanggal_expired, a.keterangan, b.uraian from tb_barang a, tb_transaksi b where a.id_barang=b.id_barang AND b.uraian='BARANG MASUK' AND (b.status=4 or b.status=5) AND year(b.tanggal)= year(CURRENT_DATE())");

        return $query->result();
    }

     public function getBukuKeluar(){
         $query = $this->db->query("SELECT b.tanggal, b.jumlah, b.satuan, a.nama_barang, b.harga, (b.harga * b.jumlah) AS 'JumlahHarga', b.batch, a.tanggal_produksi, a.tanggal_expired, a.keterangan, b.uraian FROM tb_barang a, tb_transaksi b WHERE NOT b.uraian='BARANG MASUK' AND year(b.tanggal)= year(CURRENT_DATE()) AND a.id_barang=b.id_barang AND b.status=3");

        return $query->result();
    }
}
