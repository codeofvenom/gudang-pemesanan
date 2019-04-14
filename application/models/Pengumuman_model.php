<?php

class Pengumuman_model extends CI_Model
{
    public function unique_code()
    {
        $query = $this->db->query('select max(id_pengumuman) as max_code FROM tb_pengumuman');

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 9, 4);

        $max_pngmn = $max_fix + 1;

        $tanggal = $time = date('d');
        $bulan = $time = date('m');
        $tahun = $time = date('Y');
        $fav = mt_rand(100, 931) + (13 * (mt_rand(3, 7) - 26));
        $kd = 'PNGMN'.$fav.$tahun.$bulan.$tanggal.sprintf('%04s', $max_pngmn);

        return $kd;
    }

    public function get_all_pengumuman()
    {
        $query = $this->db->query("SELECT tb_pengumuman.id_pengumuman,tb_pengumuman.judul,tb_kategori_png.nama_kategori,
		tb_pengumuman.pengumuman,tb_pengumuman.id_kategori_png,DATE_FORMAT(pengumuman_tanggal,'%Y-%m-%d') AS tanggal,
		DATE_FORMAT(pengumuman_tanggal,'%H:%i:%s') AS waktu,tb_pengumuman.author FROM tb_pengumuman INNER JOIN
		tb_kategori_png ON tb_pengumuman.id_kategori_png=tb_kategori_png.id_kategori_png
		ORDER BY tb_pengumuman.id_pengumuman DESC");

        return $query;
    }

    public function simpan_pengumuman($qkd, $judul, $kategori, $isi, $author)
    {
        $query = $this->db->query("INSERT INTO tb_pengumuman(id_pengumuman,id_kategori_png,judul,pengumuman,author) VALUES ('$qkd','$kategori','$judul','$isi','$author')");

        return $query;
    }

    public function hapus_pengumuman($kode)
    {
        $query = $this->db->query("DELETE FROM tb_pengumuman WHERE id_pengumuman='$kode'");

        return $query;
    }

    public function update_pengumuman($kode, $judul, $kategori, $isi)
    {
        $query = $this->db->query("UPDATE tb_pengumuman SET id_kategori_png='$kategori',judul='$judul',pengumuman='$isi' where id_pengumuman='$kode'");

        return $query;
    }

    public function pengumuman()
    {
        $hsl = $this->db->query("SELECT tb_pengumuman.id_pengumuman,tb_pengumuman.judul,tb_kategori_png.nama_kategori,
		tb_pengumuman.pengumuman,tb_pengumuman.id_kategori_png,DATE_FORMAT(pengumuman_tanggal,'<b> %d/%m/%Y</b> <br>&nbsp; %H:%i:%s') AS tanggal,tb_pengumuman.author FROM tb_pengumuman INNER JOIN
		tb_kategori_png ON tb_pengumuman.id_kategori_png=tb_kategori_png.id_kategori_png
		ORDER BY  tb_pengumuman.pengumuman_tanggal  DESC");

        return $hsl;
    }

    public function pengumuman_dkategori($id)
    {
        $hsl = $this->db->query("SELECT tb_pengumuman.id_pengumuman,tb_pengumuman.judul,tb_kategori_png.nama_kategori,
		tb_pengumuman.pengumuman,tb_pengumuman.id_kategori_png,DATE_FORMAT(pengumuman_tanggal,'<b> %d/%m/%Y</b> <br>&nbsp; %H:%i:%s') AS tanggal,tb_pengumuman.author FROM tb_pengumuman INNER JOIN
		tb_kategori_png ON tb_pengumuman.id_kategori_png=tb_kategori_png.id_kategori_png WHERE tb_pengumuman.id_kategori_png = '$id'
		ORDER BY  tb_pengumuman.pengumuman_tanggal  DESC");

        return $hsl;
    }

    public function get_all_count()
    {
        $sql = 'SELECT COUNT(*) as tol_records FROM tb_pengumuman';
        $result = $this->db->query($sql)->row();

        return $result;
    }

    public function pengumuman_perpage($offset, $limit)
    {
        $hsl = $this->db->query("SELECT tb_pengumuman.id_pengumuman,tb_pengumuman.judul,tb_kategori_png.nama_kategori,
		tb_pengumuman.pengumuman,tb_pengumuman.id_kategori_png,MONTHNAME(pengumuman_tanggal) AS bulan,DATE_FORMAT(pengumuman_tanggal,'%Y')AS tahun,
		DATE_FORMAT(pengumuman_tanggal,'%d')AS tanggal,DATE_FORMAT(pengumuman_tanggal,'%H:%i') AS jam,
		tb_pengumuman.author FROM tb_pengumuman 
		JOIN tb_kategori_png ON tb_pengumuman.id_kategori_png=tb_kategori_png.id_kategori_png 
		ORDER BY tb_pengumuman.pengumuman_tanggal DESC limit $offset,$limit");

        return $hsl;
    }

    public function pengumuman_perpage_kategori($id, $offset, $limit)
    {
        $hsl = $this->db->query("SELECT tb_pengumuman.id_pengumuman,tb_pengumuman.judul,tb_kategori_png.nama_kategori,
		tb_pengumuman.pengumuman,tb_pengumuman.id_kategori_png,MONTHNAME(pengumuman_tanggal) AS bulan,DATE_FORMAT(pengumuman_tanggal,'%Y')AS tahun,
		DATE_FORMAT(pengumuman_tanggal,'%d')AS tanggal,DATE_FORMAT(pengumuman_tanggal,'%H:%i') AS jam,tb_pengumuman.author FROM tb_pengumuman 
		 JOIN tb_kategori_png ON tb_pengumuman.id_kategori_png=tb_kategori_png.id_kategori_png WHERE tb_pengumuman.id_kategori_png = '$id'
		 ORDER BY tb_pengumuman.pengumuman_tanggal DESC limit $offset,$limit");

        return $hsl;
    }

    public function pengumuman_jumlah_kategori()
    {
        $hsl = $this->db->query('SELECT tb_kategori_png.id_kategori_png,tb_kategori_png.nama_kategori  FROM tb_kategori_png');

        return $hsl;
    }

    public function pengumuman_kategori()
    {
        $hsl = $this->db->query('SELECT tb_pengumuman.*,COUNT(*) as jumlah FROM tb_pengumuman INNER JOIN tb_kategori_png ON 
		tb_pengumuman.id_kategori_png=tb_kategori_png.id_kategori_png GROUP BY tb_pengumuman.id_kategori_png');

        return $hsl;
    }
}
