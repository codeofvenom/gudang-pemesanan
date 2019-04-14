
<h3 style="text-align: center;">BUKU BARANG KELUAR TAHUN <?php echo date('Y'); ?></h3>

<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="font-size:12px;" rowspan="2">No.</th>
            <th style="font-size:12px;" rowspan="2">Tanggal</th>
            <th style="font-size:12px;" rowspan="2">No</th>
            <th style="font-size:12px;" colspan="2">Jumlah</th>
            <th style="font-size:12px;" rowspan="2">Nama Barang</th>
            <th style="font-size:12px;" colspan="2">Jumlah</th>
            <th style="font-size:12px;" rowspan="2">Nomor</th>
            <th style="font-size:12px;" colspan="2">Tahun</th>
            <th style="font-size:12px;" rowspan="2">Sumber</th>
            <th style="font-size:12px;" rowspan="2">Tujuan</th>     
      </tr>
      <tr>
<!--            <th style="font-size:12px;"></th>
            <th style="font-size:12px;"></th>
            <th style="font-size:12px;"></th> -->
            <th style="font-size:12px;">Jmh</th>         
            <th style="font-size:12px;">Satuan</th>
            <!-- <th style="font-size:12px;"></th> -->
            <th style="font-size:12px;">Satuan</th>
            <th style="font-size:12px;">Harga</th>
            <!-- <th style="font-size:12px;"></th> -->
            <th style="font-size:12px;">Produk</th>
            <th style="font-size:12px;">ED</th>
<!--             <th style="font-size:12px;"></th>
            <th style="font-size:12px;"></th>  -->
      </tr>
      <?php $i=1;
       foreach ($dataview as $data) { 
      ?>
      <tr>
           <td>2</td>
           <td><?=$data->tanggal?></td>
           <td></td>
           <td><?=$data->jumlah?></td>
           <td><?=$data->satuan?></td>
           <td><?=$data->nama_barang?></td>
           <td><?=number_format($data->harga,2,",",".")?></td>
           <td><?=number_format($data->JumlahHarga,2,",",".")?></td>
           <td><?=$data->batch?></td>
           <td><?=$data->tanggal_produksi?></td>
           <td><?=$data->tanggal_expired?></td>
           <td><?=$data->keterangan?></td>
           <td><?=$data->uraian?></td>                 
      </tr>
      <?php $i++; } ?>
</table>