<?php

class Barang_model extends CI_Model
{
    public function get_count_barang()
    {
        $query = $this->db->query('SELECT COUNT(id_barang) AS jumlah FROM tb_barang LIMIT 1');

        return $query->row()->jumlah;
    }

    public function get_all_barang()
    {
        $query = $this->db->query("SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_kategori.nama_kategori,tb_barang.batch,
		tb_barang.satuan,tb_barang.jumlah_rusak,tb_barang.jumlah_stock,tb_barang.harga,tb_barang.id_kategori,
		DATE_FORMAT(tanggal_expired,'%Y-%m-%d') AS tanggal_expired,DATE_FORMAT(tanggal_produksi,'%Y-%m-%d') AS tanggal_produksi,
		DATE_FORMAT(tanggal_masuk,'%Y-%m-%d') AS tanggal_masuk,DATE_FORMAT(tanggal_masuk_sistem,'%Y-%m-%d') AS tanggal_masuk_sistem,
		DATE_FORMAT(tanggal_masuk_sistem,'%Y-%m-%d') AS tanggal_masuk_sistems,tb_barang.keterangan FROM tb_barang JOIN tb_kategori ON
		tb_barang.id_kategori=tb_kategori.id_kategori");

        return $query;
    }
    
    public function get_all_barangx()
    {
        $query = $this->db->query("SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_kategori.nama_kategori,tb_barang.batch,
		tb_barang.satuan,tb_barang.jumlah_rusak,tb_barang.jumlah_stock,tb_barang.harga,tb_barang.id_kategori,
		DATE_FORMAT(tanggal_expired,'%Y-%m-%d') AS tanggal_expired,DATE_FORMAT(tanggal_produksi,'%Y-%m-%d') AS tanggal_produksi,
		DATE_FORMAT(tanggal_masuk,'%Y-%m-%d') AS tanggal_masuk,DATE_FORMAT(tanggal_masuk_sistem,'%Y-%m-%d') AS tanggal_masuk_sistem,
		DATE_FORMAT(tanggal_masuk_sistem,'%Y-%m-%d') AS tanggal_masuk_sistems,tb_barang.keterangan FROM tb_barang JOIN tb_kategori ON
		tb_barang.id_kategori=tb_kategori.id_kategori WHERE tb_barang.jumlah_stock >0 ");

        return $query;
    }

    public function get_all_barang_so()
    {
        $query = $this->db->query("SELECT tb_barang_so.id_barang_so,tb_barang.id_barang,tb_barang.nama_barang,tb_barang.jumlah_stock AS jstock,tb_barang_so.batch,
		tb_barang_so.jumlah_rusak,tb_barang_so.jumlah_stock,DATE_FORMAT(tgl_produksi,'%Y-%m-%d') AS tgl_produksi,
		tb_barang_so.kode_transaksi,tb_barang_so.satuan,tb_barang_so.harga,DATE_FORMAT(tgl_expired,'%Y-%m-%d') AS tgl_expired,
		DATE_FORMAT(tgl_masuk,'%Y-%m-%d') AS tgl_masuk,tb_barang_so.keterangans FROM tb_barang_so JOIN tb_barang ON
		tb_barang_so.id_barang=tb_barang.id_barang");

        return $query;
    }

    public function get_kobar()
    {
        $q = $this->db->query('SELECT MAX(RIGHT(id_barang,6)) AS kd_max FROM tb_barang');
        $kd = '';
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf('%06s', $tmp);
            }
        } else {
            $kd = '000001';
        }

        return 'BR'.$kd;
    }

    public function get_kotra()
    {
        $q = $this->db->query('SELECT MAX(RIGHT(kode_transaksi,6)) AS kd_max FROM tb_transaksi');
        $kd = '';
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf('%06s', $tmp);
            }
        } else {
            $kd = '000001';
        }

        return 'TRP'.$kd;
    }

    public function get_kotram()
    {
        $q = $this->db->query('SELECT MAX(RIGHT(kode_transaksi,6)) AS kd_max FROM tb_transaksi');
        $kd = '';
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf('%06s', $tmp);
            }
        } else {
            $kd = '000001';
        }

        return 'TRM'.$kd;
    }

    public function get_barang()
    {
        $query = $this->db->query('SELECT id_barang,nama_barang  FROM tb_barang');

        return $query;
    }

    public function get_pbarang($kobar)
    {
        $query = $this->db->query("SELECT * FROM tb_barang  WHERE id_barang='$kobar'");

        return $query;
    }

    public function simpan_pesanan($qkd, $tgl, $namax, $id_instansi, $id_client)
    {
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'kode_transaksi' => $qkd,
                'tanggal' => $tgl,
                'id_barang' => $item['id'],
                'jumlah' => $item['qty'],
                'satuan' => $item['satuan'],
                'harga' => $item['price'],
                'batch' => $item['batch'],
                'tanggal_produksi' => $item['tanggal_produksi'],
                'tanggal_expired' => $item['tanggal_expired'],
                'keterangan' => $item['keterangan'],
                'uraian' => $namax,
                'status' => 1,
                'id_instansi' => $id_instansi,
            );
            $this->db->insert('tb_transaksi', $data);
            $this->db->query("update tb_barang set jumlah_stock=jumlah_stock-'$item[qty]' WHERE id_barang='$item[id]'");
        }

        return true;
    }

    public function simpan_barang($ktm, $qkd, $nama, $ktg, $stock, $satuan, $harga, $batch, $xprtgl, $xtgl, $mtgl, $ket)
    {
        $this->db->query("INSERT INTO tb_barang
		(id_barang,batch,nama_barang,id_kategori,jumlah_stock,satuan,harga,tanggal_produksi,tanggal_masuk,tanggal_expired,keterangan,kode_transaksi) 
		VALUES ('$qkd','$batch','$nama','$ktg','$stock','$satuan','$harga','$xprtgl','$mtgl','$xtgl','$ket','$ktm')");

        $this->db->query("INSERT INTO tb_transaksi(kode_transaksi,tanggal,id_barang,jumlah,satuan,harga,batch,tanggal_produksi,tanggal_expired,keterangan,uraian,status) 
		VALUES ('$ktm',SYSDATE(),'$qkd','$stock','$satuan','$harga','$batch','$xprtgl','$xtgl','$ket','BARANG MASUK',4)");

        return true;
    }

    public function simpan_stock($nama, $batch, $stock, $satuan, $harga, $xprtgl, $mtgl, $xtgl, $ket, $ktm)
    {
        $this->db->query("INSERT INTO tb_barang_so(id_barang,batch,jumlah_stock,satuan,harga,tgl_produksi,tgl_masuk,tgl_expired,keterangans,kode_transaksi) 
		VALUES ('$nama','$batch','$stock','$satuan','$harga','$xprtgl','$mtgl','$xtgl','$ket','$ktm')");
        $this->db->query("UPDATE tb_barang set jumlah_stock=jumlah_stock+'$stock' WHERE id_barang='$nama'");
        $this->db->query("INSERT INTO tb_transaksi(kode_transaksi,tanggal,id_barang,jumlah,satuan,harga,batch,tanggal_produksi,tanggal_expired,keterangan,uraian,status) 
		VALUES ('$ktm',SYSDATE(),'$nama','$stock','$satuan','$harga','$batch','$xprtgl','$xtgl','$ket','BARANG MASUK',5)");

        return true;
    }

    public function update_stock($kode, $brg, $batch, $stock, $rstock, $satuan, $harga, $xprtgl, $mtgl, $xtgl, $ket, $input)
    {
        $this->db->query("UPDATE tb_barang_so set batch='$batch',jumlah_stock=jumlah_stock+'$stock',jumlah_stock=jumlah_stock-'$rstock',jumlah_rusak=jumlah_rusak+'$rstock',satuan='$satuan',harga='$harga',tgl_produksi='$xprtgl',tgl_masuk='$mtgl',tgl_expired='$xtgl',keterangans='$ket' where id_barang_so='$kode'");
        $this->db->query("UPDATE tb_transaksi set jumlah=jumlah+'$stock',jumlah=jumlah-'$rstock',satuan='$satuan',harga='$harga',tanggal_produksi='$xprtgl',tanggal_expired='$xtgl',keterangan='$ket' WHERE kode_transaksi='$input'");
        $this->db->query("UPDATE tb_barang set jumlah_stock=jumlah_stock+'$stock',jumlah_stock=jumlah_stock-'$rstock',jumlah_rusak=jumlah_rusak+'$rstock' WHERE id_barang='$brg'");

        return true;
    }

    public function hapus_barang($kode)
    {
        $query = $this->db->query("DELETE FROM tb_barang WHERE id_barang='$kode'");

        return $query;
    }

    public function update_barang($kode, $nama, $ktg, $stock, $rsk, $satuan, $harga, $batch, $xprtgl, $xtgl, $mtgl, $ket)
    {
        $hsl = $this->db->query("UPDATE tb_barang set batch='$batch',nama_barang='$nama',id_kategori='$ktg',jumlah_stock='$stock',jumlah_stock=jumlah_stock-'$rsk',jumlah_rusak=jumlah_rusak+'$rsk',satuan='$satuan',harga='$harga',tanggal_produksi='$xprtgl',tanggal_masuk='$mtgl',tanggal_expired='$xtgl',keterangan='$ket' where id_barang='$kode'");

        return $hsl;
    }

    public function check_barangs($kode)
    {
        $query = $this->db->query("SELECT id_barang FROM tb_barang WHERE id_barang='$kode'");

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function detail_barang($kode)
    {
        $query = $this->db->query("SELECT * FROM tb_barang WHERE id_barang='$kode'");

        return $query;
    }
    public function detail_barang_pdf($kode)
    {
        $query = $this->db->query("SELECT * FROM tb_barang WHERE id_barang='$kode'");

        return $query->result();
    }
    public function detail_barang_transaksi($kode)
    {
        $query = $this->db->query("SELECT a.*, b.jumlah_rusak FROM tb_transaksi a, tb_barang b WHERE a.id_barang=b.id_barang AND a.id_barang='$kode'");

        return $query->result();
    }

    public function detail_trans_barang($kode)
    {
        $query = $this->db->query("SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_kategori.nama_kategori,tb_barang.batch,tb_transaksi.jumlah,
		tb_transaksi.uraian as nama_instansi,tb_transaksi.tanggal,tb_barang.batch,tb_transaksi.jumlah,tb_transaksi.harga FROM tb_barang JOIN tb_kategori ON
		tb_barang.id_kategori=tb_kategori.id_kategori JOIN tb_transaksi ON tb_transaksi.id_barang=tb_barang.id_barang
		 JOIN transaksi_proses ON tb_transaksi.kode_transaksi=transaksi_proses.kode_transaksi
		WHERE (tb_barang.id_barang='$kode' AND tb_transaksi.id_barang='$kode')
		AND (tb_transaksi.status=3 OR tb_transaksi.status=2)");

        return $query;
    }

    public function getpersediaan($kode)
    {
        $query = $this->db->query("SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_kategori.nama_kategori,tb_barang.batch,tb_transaksi.jumlah,
		tb_transaksi.uraian as nama_instansi,tb_transaksi.tanggal,tb_barang.batch,tb_transaksi.jumlah,tb_transaksi.harga FROM tb_barang 
		JOIN tb_kategori ON tb_barang.id_kategori=tb_kategori.id_kategori JOIN tb_transaksi ON tb_transaksi.id_barang=tb_barang.id_barang
		WHERE (tb_barang.id_barang='$kode' AND tb_transaksi.id_barang='$kode')
		AND (tb_transaksi.status=3 OR tb_transaksi.status=2)");

        return $query->result();
    }

    public function getStokOpname()
    {
        $query = $this->db->query("SELECT a.id_kategori, a.nama_barang, b.jumlah, b.satuan, b.harga, (b.jumlah * b.harga) AS 'JumlahSaldo', b.tanggal_produksi, b.tanggal_expired, b.keterangan FROM tb_barang a, tb_transaksi b, tb_barang_so c WHERE a.id_barang = b.id_barang AND c.id_barang=a.id_barang AND c.kode_transaksi = b.kode_transaksi AND b.uraian = 'BARANG MASUK' ORDER BY a.nama_barang ASC");

        return $query->result();
    }

    public function getKategoriBarang()
    {
        $query = $this->db->query("SELECT * FROM tb_kategori");

        return $query->result();
    }

    public function getLaporanPersediaan()
    {
        $query = $this->db->query("SELECT a.id_kategori, a.nama_barang, a.jumlah_rusak, b.jumlah, b.satuan, b.harga, (b.jumlah * b.harga) AS 'JumlahSaldo', b.tanggal_produksi, b.tanggal_expired, b.keterangan FROM tb_barang a, tb_transaksi b, tb_barang_so c WHERE a.id_barang = b.id_barang AND c.id_barang=a.id_barang AND c.kode_transaksi = b.kode_transaksi AND b.uraian = 'BARANG MASUK' ORDER BY a.nama_barang ASC");

        return $query->result();
    }

    public function getTransaksiAll(){
        $query = $this->db->query("SELECT a.id_barang, a.nama_barang, SUM(b.jumlah) AS 'jumlah' FROM tb_barang a, tb_transaksi b WHERE a.id_barang=b.id_barang AND NOT b.uraian='BARANG MASUK' GROUP BY b.id_barang");

        return $query->result();
    }

    public function getBarangMasukBulanLalu(){
        $query = $this->db->query("SELECT a.id_barang, a.nama_barang, SUM(b.jumlah) AS 'jumlah' FROM tb_barang a, tb_transaksi b WHERE a.id_barang=b.id_barang AND b.uraian='BARANG MASUK' AND month(b.tanggal)< month(CURRENT_DATE()) GROUP BY b.id_barang");

        return $query->result();
    }
    public function getBarangMasukBulanIni(){
        $query = $this->db->query("SELECT a.id_barang, a.nama_barang, SUM(b.jumlah) AS 'jumlah' FROM tb_barang a, tb_transaksi b WHERE a.id_barang=b.id_barang AND b.uraian='BARANG MASUK' AND month(b.tanggal)= month(CURRENT_DATE()) GROUP BY b.id_barang");

        return $query->result();
    }
    public function getBarangKeluarBulanLalu(){
        $query = $this->db->query("SELECT a.id_barang, a.nama_barang, SUM(b.jumlah) AS 'jumlah' FROM tb_barang a, tb_transaksi b WHERE a.id_barang=b.id_barang AND NOT b.uraian='BARANG MASUK' AND month(b.tanggal)< month(CURRENT_DATE()) GROUP BY b.id_barang");

        return $query->result();
    }
    public function getBarangKeluarBulanIni(){
        $query = $this->db->query("SELECT a.id_barang, a.nama_barang, SUM(b.jumlah) AS 'jumlah' FROM tb_barang a, tb_transaksi b WHERE a.id_barang=b.id_barang AND NOT b.uraian='BARANG MASUK' AND month(b.tanggal)= month(CURRENT_DATE()) GROUP BY b.id_barang");

        return $query->result();
    }

    public function getListBarang(){
        $query = $this->db->query("SELECT * FROM tb_barang");

        return $query->result();
    }
}
