<table cellspacing="1" style="margin-bottom: -10px;" >
	<tr>
		<td rowspan="3" width="20%">
			<a href="<?php echo site_url(''); ?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="65px;" src="<?php echo base_url().'assets/img/template/logo/XXX.png'; ?>"></a>
		</td>
            <td width="75"> </td>
		<td colspan="2" align="center"><b><h3>Pemerintah Kota XXX</h3></b>
                                                  <b><h3>Dinas Pengendalian Penduduk</h3></b>
                                                  <b><h3>Dan Keluarga Berencana</h3></b>

            </td>
		
	</tr>
	<tr>
           <td width="75"> </td>
           <td colspan="2" align="center">Jl. XXX No xxx B XXX Kode Pos xxx</td>
		
	</tr>
      <tr>
           <td width="75"> </td>
           <td colspan="2" align="center" style="font-size:10px;">Website:www.XXXkota.go.id email:disdaldukkb@XXXkota.go.id</td>
            
      </tr>

</table>
<!-- <br><br><br><br><br><br> -->
------------------------------------------------------------------------------------------------------------------------------------------------------
<div class="col-md-12" >
     
          
</div>
<table>
      <tr>
            <td> <span style="left: 0;text-align:left;">Nama Instansi </span> </td>
            <td width="500">: Dinas Pengendalian Penduduk dan KB</td>
            <td>TA <?php echo date('Y'); ?>  </td>
      </tr>
      <tr>
            <td><span>Alamat  </span></td>
            <td >: Jl. Hasanudin No 110 B</td>
      </tr>
</table>


<h3 style="text-align: center;">KARTU PERSEDIAAN</h3>
<h3 style="text-align: center;"><?=$dataview[0]->nama_barang; ?></h3>
<table>
      <tr>
            <td> SATUAN : <?=$dataview[0]->satuan; ?> </td>
            <td width="360"></td>
            <td>Sumber Dana : <?=$dataview[0]->keterangan; ?> </td>
      </tr>
      
</table>
<table border="1" style="border-collapse: collapse;">
      <tr>
            <th rowspan="2" style="font-size:12px;">tgl.</th>
            <th rowspan="2" style="font-size:12px;">No. SBBK</th>
            <th rowspan="2" style="font-size:12px;">Uraian</th>
            <th rowspan="2" style="font-size:12px;">NO.BATCH</th>         
            <th colspan="4" style="font-size:12px;">JUMLAH</th>
            <th rowspan="2" style="font-size:12px;">TH PRODUK</th>
            <th rowspan="2" style="font-size:12px;">EXPIRE DATE</th>
            <th rowspan="2" style="font-size:12px;">HARGA SATUAN</th>
            <th rowspan="2" style="font-size:12px;">JMLH HARGA</th>
            <th rowspan="2" style="font-size:12px;">Ket</th>     
      </tr>
      <tr>
           <td style="font-size:10px;">MASUK</td>
           <td style="font-size:10px;">KELUAR</td>
           <td style="font-size:10px;">RUSAK/HILANG</td>
           <td style="font-size:10px;">SISA</td>
      </tr>
      <?php $i = 1;
        $patok = 1;
        $jumlahsisa = 0;
        $jumlah_rusak = 0;
        $jumlahharga = 0;
       foreach ($dataTransaksi as $data) {
           ?>
      <tr>
             
           <td><?=$data->tanggal; ?></td>
           <td></td>
           <td><?=$data->uraian; ?></td>
           <td><?=$data->batch; ?></td>
           <?php if ($data->uraian == 'BARANG MASUK') {
               if ($patok == 1) {
                   $jumlah_rusak = $data->jumlah_rusak;
                   $jumlahsisa = ($jumlahsisa + $data->jumlah) - $data->jumlah_rusak;
               } else {
                   $jumlah_rusak = 0;
                   $jumlahsisa = $jumlahsisa + $data->jumlah;
               } ?>
             <td><?=$data->jumlah; ?></td>
             <td></td>
             <?php
             ++$patok;
           } else {
               $jumlahsisa = $jumlahsisa - $data->jumlah; ?>
              <td></td>
              <td><?=$data->jumlah; ?></td>
            <?php
           } ?>
           <td><?=$jumlah_rusak; ?></td>
           <td><?=$jumlahsisa; ?></td>
           <td><?=$data->tanggal_produksi; ?></td>
           <td><?=$data->tanggal_expired; ?></td>
           <td><?=number_format($data->harga, 2, ',', '.'); ?></td>
           <td></td>a
           <td><?=$data->keterangan; ?></td>                  
      </tr>
      <?php ++$i;
       } ?>


</table>

 <div style="position: fixed;left: 0;bottom: 0;width: 100%;text-align: center;">
  <!-- <p>Footer</p> -->
</div>
