<h3 style="text-align: center;">BUKU BARANG MASUK (BBM) <?php echo date('Y'); ?></h3>

<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th rowspan="2" style="font-size:12px;">Tgl</th>
            <th rowspan="2" style="font-size:12px;">Nomor SBBM</th>
            <th rowspan="2" colspan="2" style="font-size:12px;">Jenis / Nama Brg</th>
            <th rowspan="2" colspan="2" style="font-size:12px;">Jumlah</th>         
            <th colspan="2" style="font-size:12px;">Harga</th>
            <th colspan="3" style="font-size:12px;">Volume</th>
            <th colspan="2" style="font-size:12px;">BAPB</th>
            <th rowspan="2" style="font-size:12px;">Sumber Dana</th>
            <th colspan="2" style="font-size:12px;">Spesifikasi</th>
            <th rowspan="2" style="font-size:12px;">Keterangan</th>              
      </tr>
      <tr>
           <th style="font-size:12px;">Satuan</th>
            <th style="font-size:12px;">Jumlah</th>
            <th style="font-size:12px;">COLI</th>
            <th style="font-size:12px;">KG</th>         
            <th style="font-size:12px;">M3</th>
            <th style="font-size:12px;">TGL</th>
            <th style="font-size:12px;">Nomor</th>
            <th style="font-size:12px;">Tahun Produk</th>
            <th style="font-size:12px;">Expired Date</th>
            
      </tr>
      <tr>
             
           <td align="center">1</td>
           <td align="center">2</td>
           <td align="center"></td>
           <td align="center">3</td>
           <td align="center">4</td>
           <td align="center"></td>
           <td align="center">5</td>
           <td align="center">6</td>
           <td align="center">7</td>
           <td align="center">8</td>
           <td align="center">9</td>
           <td align="center">10</td>
           <td align="center">11</td>
           <td align="center">12</td>
           <td align="center">13</td>
           <td align="center">14</td>
           <td align="center">15</td>
                  
      </tr>
      <tr>
             <!-- Static gen kosong, ngikuti gambar -->
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
                  
      </tr>
      <?php $i=1;
       foreach ($dataview as $data) { 
      ?>
      <tr>
             <!-- Isine neng kene yaa -->
           <td><?=$data->tanggal?></td>
           <td></td>
           <td></td>
           <td><?=$data->nama_barang?></td>
           <td><?=$data->jumlah?></td>
           <td><?=$data->satuan?></td>
           <td><?=number_format($data->harga,2,",",".")?></td>
           <td><?=number_format($data->JumlahHarga,2,",",".")?></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td><?=$data->keterangan?></td>
           <td><?=$data->tanggal_produksi?></td>
           <td><?=$data->tanggal_expired?></td>
           <td><?=$data->batch?></td>
                  
      </tr>
      <?php $i++; } ?>
</table>

 <div style="position: fixed;left: 0;bottom: 0;width: 100%;text-align: center;">
  <p>Footer</p>
</div>