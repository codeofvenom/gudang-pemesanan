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
<h3 style="text-align: center;">STOCK OPNAME</h3>
<h3 style="text-align: center;">ALAT OBAT KONTRASEPSI APBN/DIPA PER 31 <?php echo $Bulan; ?> <?php echo date('Y'); ?></h3>
<table>
      <tr>
            <td style="font-size:10px;"> Nama Gudang : DINAS PENGENDALIAN DAN KELUARGA BERENCANA KOTA XXX</td>
            <td width="390"></td>
            <td style="font-size:10px;">Kode Gudang :  </td>
      </tr>
      <tr>
            <td style="font-size:10px;"> Alamat : Jln XXX no. 213410 b</td>
      </tr>
      
</table>
<!--Tabel Alat kontrasepsi-->
<?php $i = 1;
foreach ($kategori as $kategoriResult) {
    ?>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th rowspan="2" style="font-size:12px;">No</th>
            <th rowspan="2" style="font-size:12px;" colspan="2">Nama Barang</th>
            <th rowspan="2" style="font-size:12px;">Jumlah</th>
            <th rowspan="2" style="font-size:12px;">Harga Satuan</th>         
            <th rowspan="2" style="font-size:12px;">Jumlah Saldo</th>
            <th colspan="2" style="font-size:12px;">Tahun</th>
            <th rowspan="2" style="font-size:12px;">Keterangan</th>
                          
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
           
                  
      </tr>
       <?php $i = 1;
    $jumlahTotal = 0;
    $hargaSatuanTotal = 0;
    $jumlahSaldoTotal = 0;
    foreach ($dataview as $data) {
        if ($kategoriResult->id_kategori == $data->id_kategori) {
            $jumlahTotal = $jumlahTotal + $data->jumlah;
            $hargaSatuanTotal = $hargaSatuanTotal + $data->harga;
            $jumlahSaldoTotal = $jumlahSaldoTotal + $data->JumlahSaldo; ?>
      <tr>
             <!-- Isine neng kene yaa -->
           <td><?=$i; ?></td>
           <td><?=$data->nama_barang; ?></td>
           <td><?=$data->satuan; ?></td>
           <td><?=$data->jumlah; ?></td>
           <td><?=number_format($data->harga, 2, ',', '.'); ?></td>
           <td><?=number_format($data->JumlahSaldo, 2, ',', '.'); ?></td>
           <td><?=$data->tanggal_produksi; ?></td>
           <td><?=$data->tanggal_expired; ?></td>
           <td><?=$data->keterangan; ?></td>          
      </tr>
      <?php ++$i;
        }
    } ?>
      <tr>
             <!-- Isine neng kene yaa -->
           <td colspan="2">Jumlah</td>
           <td></td>
           <td><?=$jumlahTotal; ?></td>
           <td><?=number_format($hargaSatuanTotal, 2, ',', '.'); ?></td>
           <td><?=number_format($jumlahSaldoTotal, 2, ',', '.'); ?></td>
           <td></td>
           <td></td>
           <td></td>  
                    
      </tr>
</table>
<br>
<?php ++$i;
} ?>
<!--Tabel Non Alkon-->


