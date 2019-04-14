<?php 
  $month = date('m');
  $Bulan = '';
  if ($month == '01') {
      $Bulan = 'JANUARI';
  } elseif ($month == '02') {
      $Bulan = 'FEBRUARI';
  } elseif ($month == '03') {
      $Bulan = 'MARET';
  } elseif ($month == '04') {
      $Bulan = 'APRIL';
  } elseif ($month == '05') {
      $Bulan = 'MEI';
  } elseif ($month == '06') {
      $Bulan = 'JUNI';
  } elseif ($month == '07') {
      $Bulan = 'JULI';
  } elseif ($month == '08') {
      $Bulan = 'AGUSTUS';
  } elseif ($month == '09') {
      $Bulan = 'SEPTEMBER';
  } elseif ($month == '10') {
      $Bulan = 'OKTOBER';
  } elseif ($month == '11') {
      $Bulan = 'NOVEMBER';
  } elseif ($month == '12') {
      $Bulan = 'DESEMBER';
  }

?>
<h4 style="text-align: center;">LAPORAN PERSEDIAAN</h4>
<h3 style="text-align: center;">ALAT OBAT KONTRASEPSI APBN/DIPA PER 31 <?php echo $Bulan; ?> <?php echo date('Y'); ?></h3>
<table>
      <tr>
            <td>Bulan Januari 2018</td>
      </tr>
      <tr>
            <td style="font-size:12px;"> Nama Gudang : DINAS PENGENDALIAN DAN KELUARGA BERENCANA KOTA XXX</td>
            <td width="390"></td>
            <td style="font-size:10px;">Kode Gudang :  </td>
      </tr>
      <tr>
            <td style="font-size:10px;"> Alamat : Jln 	XXXX no. 242 b</td>
      </tr>
      
</table>
<?php $i = 1;
foreach ($kategori as $kategoriResult) {
    ?>
<!--Tabel Alat kontrasepsi-->
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th rowspan="2">No</th>
            <th rowspan="2" colspan="2">Nama Barang</th>
            <th rowspan="2">Baik</th>
            <th rowspan="2">Rusak / hilang</th>         
            <th rowspan="2">Jumlah</th>
            <th rowspan="2">Harga Satuan</th>
            <th rowspan="2">Jumlah Saldo</th>
            <th colspan="2">TAHUN</th>            
                          
      </tr>
      <tr>
           <th style="font-size:12px;">Produks</th>
           <th style="font-size:12px;">EXPIREDE</th>
            
            
      </tr>
      <tr>
             
           <td align="center">1</td>
           <td colspan="2" align="center">2</td>
           <td align="center">3</td>
           <td align="center">4</td>
           <td align="center">5</td>
           <td align="center">6</td>
           <td align="center">7</td>
           <td align="center">8</td>   
           <td align="center">9</td>                            
      </tr>
      <tr>
             <!-- Static gen kosong, ngikuti gambar -->
           <td></td>
           <td><b><?=$kategoriResult->nama_kategori; ?> : </b></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
     
           
                  
      </tr>
      <?php $i = 1;
    $jumlahTotal = 0;
    $jumlahBaikTotal = 0;
    $jumlahRusakTotal = 0;

    $hargaSatuanTotal = 0;
    $jumlahSaldoTotal = 0;
    $patok = 0;
    foreach ($dataview as $data) {
        if ($kategoriResult->id_kategori == $data->id_kategori) {
            $rusak = 0;
            if ($patok == 0) {
                $rusak = $data->jumlah_rusak;
                ++$patok;
            } else {
                $rusak = 0;
            }
            $jumlahSaldo = 0;
            $jumlahBaikTotal = $jumlahBaikTotal + $data->jumlah;
            $jumlahRusakTotal = $jumlahRusakTotal + $rusak;
            $jumlahSaldo = ($data->jumlah - $rusak) * $data->harga;
            $jumlahTotal = $jumlahTotal + ($data->jumlah - $rusak);
            $hargaSatuanTotal = $hargaSatuanTotal + $data->harga;
            $jumlahSaldoTotal = $jumlahSaldoTotal + $jumlahSaldo; ?>
      <tr>
             <!-- Isine neng kene yaa -->
          <td></td>
           <td><?=$data->nama_barang; ?></td>
           <td><?=$data->satuan; ?></td>
           <td><?=$data->jumlah; ?></td>
           <td><?=$rusak; ?></td>
           <td><?=$data->jumlah - $rusak; ?></td>
           <td><?=number_format($data->harga, 2, ',', '.'); ?></td>
           <td><?=number_format($jumlahSaldo, 2, ',', '.'); ?></td>
           <td><?=$data->tanggal_produksi; ?></td>
           <td><?=$data->tanggal_expired; ?></td>          

      </tr>
      <?php ++$i;
        }
    } ?>
      <tr>
             <!-- Isine neng kene yaa -->
           <td colspan="2">Jumlah</td>
           <td></td>
           <td><?=$jumlahBaikTotal; ?></td>
           <td><?=$jumlahRusakTotal; ?></td>
           <td><?=$jumlahTotal; ?></td>
           <td><?=number_format($hargaSatuanTotal, 2, ',', '.'); ?></td>
           <td><?=number_format($jumlahSaldoTotal, 2, ',', '.'); ?></td>
           <td></td>
           <td></td>       

      </tr>
</table>
<br>
<?php ++$i;
} ?>
