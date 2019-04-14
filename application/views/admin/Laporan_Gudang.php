
<h4 style="text-align: center;">Program Kependudukan Keluarga Berencana dan Pembangunan Keluarga</h4>
<h4 style="text-align: center;">Laporan Bulanan Obat dan Alat Kontrasepsi</h4>
<h4 style="text-align: center;">(Laporang Gudang)</h4>
<table>
      <tr>
            <td style="font-size:10px;"> Nama Gudang  </td>
            <td> : </td>
            <td style="font-size:10px;"> DINAS PENGENDALIAN DAN KELUARGA BERENCANA KOTA XXX </td>
            <td width="205"></td>
            <td style="font-size:10px;">Kode Gudang   </td>
            <td> : </td>
            <td style="font-size:10px;">67ADA2433</td>
      </tr>
      <tr>
            <td style="font-size:10px;"> Alamat </td>
            <td style="font-size:10px;"> : </td>
            <td style="font-size:10px;"> Jln xxx no. XXXX </td>
            <td width="205"></td>
            <td style="font-size:10px;">Bulan Gudang  </td>
            <td style="font-size:10px;"> : </td>
            <td style="font-size:10px;"> Februari 2017 </td>
      </tr>
      
</table>
<!--Tabel Alat kontrasepsi-->
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="background-color: blue;font-size:12px;">No</th>
            <th style="background-color: blue;font-size:12px;">Macam Alkon</th>
            <th style="background-color: blue;font-size:12px;">Persediaan Awal Bulan Ini</th>
            <th style="background-color: blue;font-size:12px;">Penerimaan Bulan Ini</th>         
            <th style="background-color: blue;font-size:12px;">Pengeluaran Bulan Ini</th>
            <th style="background-color: blue;font-size:12px;">Sisa Akhir Bulan Ini</th>
                      
                          
      </tr>
      <?php $i = 1;
      foreach ($databarang as $barang) {
          ?>
      <tr>
             
           <td style="font-size:10px;"><?=$i; ?></td>
           <td style="font-size:10px;"><?=$barang->nama_barang; ?></td>
           <?php
           $dataAwalBulan = 0;
          foreach ($datamasukbulanlalu as $datamasuklalu) {
              if ($barang->id_barang == $datamasuklalu->id_barang) {
                  foreach ($datakeluarbulanlalu as $datakeluarlalu) {
                      if ($barang->id_barang == $datakeluarlalu->id_barang) {
                          $dataAwalBulan = $datamasuklalu->jumlah - $datakeluarlalu->jumlah;
                      }
                  }
              }
          } ?>
           <td style="font-size:10px;"><?=$dataAwalBulan; ?></td>
           <?php
           $dataMasukBulanIni = 0;
          foreach ($datamasukbulanini as $datamasukini) {
              if ($barang->id_barang == $datamasukini->id_barang) {
                  $dataMasukBulanIni = $datamasukini->jumlah;
              }
          } ?>
           <td style="font-size:10px;"><?=$dataMasukBulanIni; ?></td>
           <?php
           $dataKeluarBulanIni = 0;
          foreach ($datakeluarbulanini as $datakeluarini) {
              if ($barang->id_barang == $datakeluarini->id_barang) {
                  $dataKeluarBulanIni = $datakeluarini->jumlah;
              }
          } ?>
           <td style="font-size:10px;"><?=$dataKeluarBulanIni; ?></td>
           <?php
           $saldoAkhir = ($dataAwalBulan + $dataMasukBulanIni) - $dataKeluarBulanIni; ?>
           <td style="font-size:10px;"><?=$saldoAkhir; ?></td>
                                    
      </tr>
      <?php ++$i;
      } ?>
    
</table>
 <div style="position: fixed;left: 0;bottom: 0;width: 100%;text-align: center;">
  <p>Footer</p>
</div>
