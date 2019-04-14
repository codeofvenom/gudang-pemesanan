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
           <td colspan="2" align="center">Jl.xxx No 13210 B XXX Kode Pos XXX</td>
		
	</tr>
      <tr>
           <td width="75"> </td>
           <td colspan="2" align="center" style="font-size:10px;">Website:www.XXXkota.go.id email:disdaldukkb@XXXkota.go.id</td>
            
      </tr>

</table>
<!-- <br><br><br><br><br><br> -->
------------------------------------------------------------------------------------------------------------------------------------------------------
<table align="center">
      <tr>

            <td align="center"><h3 style="text-align: center;"><u>BASTB/SURAT BUKTI BARANG KELUAR<u></h3>
                                                Nomor : 008 / SBBK
            </td>
      </tr>
</table>
<table>
      <tr>
            
            <td width="25"></td>
            <td> <span>1. Kepada </span> </td>
            <td> : </td>
            <td>  <?=$dataview[0]->nama_instansi; ?></td>
      </tr>
      <tr>
            <td width="35"></td>
            <td><span>2. Alamat  </span></td>
            <td >:</td>
            <td>  <?=$dataview[0]->alamat; ?></td>
      </tr>
</table>
<br>
<table style="width: 100%">
      <tr>
            <td width="20"></td>
            <td id="isi_awal">Untuk Pelayanan KB Pra KS dan KS I di XXX</td>
      </tr>
      <tr>
            <td colspan="2">Berdasarkan SPMB/BON/Permintaan | 008  &nbsp;&nbsp;&nbsp;   /SBBK/2018</td>
      </tr>
</table>




<table border="1" style="border-collapse: collapse;width: 100%">
      <tr>
            <td rowspan="2" align="center" style="font-size:12px;">No.</td>
            <td rowspan="2" align="center" colspan="2" style="font-size:12px;">Jumlah Satuan</td>
            <td rowspan="2" align="center" style="font-size:12px;">Nama Barang</td>
            <td colspan="2" align="center" style="font-size:12px;">Jumlah Harga</td>         
            <td rowspan="2" align="center" style="font-size:12px;">Nomor Batch</td>
            <td colspan="2" align="center" style="font-size:12px;">Tahun</td>
            <td rowspan="2" align="center" style="font-size:12px;">Ket.</td>
        
      </tr>
      <tr>
           <td style="font-size:10px;" align="center">Satuan</td>
           <td style="font-size:10px;" align="center">Total</td>
           <td style="font-size:10px;" align="center">Produk</td>
           <td style="font-size:10px;" align="center">Expired</td>
      </tr>
      <?php $i = 1;
        $jumlahsisa = 0;
        $totalharga = 0;
       foreach ($dataview as $data) {
           $jumlahharga = 0;
           $jumlahharga = $data->jumlah * $data->harga;
           $totalharga = $totalharga + $jumlahharga; ?>
      <tr>
           <td align="center"><?=$i; ?></td>
           <td align="center"><?=$data->jumlah; ?></td>
           <td align="center"><?=$data->satuan; ?></td>
           <td align="center"><?=$data->nama_barang; ?></td>
           <td align="center"><?=$data->harga; ?></td>
           <td align="center"><?=$jumlahharga; ?></td>
           <td align="center"><?=$data->batch; ?></td>
           <td align="center"><?=$data->tanggal_produksi; ?></td>
           <td align="center"><?=$data->tanggal_expired; ?></td>
           <td align="center"><?=$data->keterangan; ?></td>
          
         
                  
      </tr>
      <?php ++$i;
       } ?>
      <tr>
           <!--iki static -->  
           <td align="center"></td>
           <td align="center"></td>
           <td align="center"></td>
           <td align="center"></td>
           <td align="center">Jumlah</td>
           <td align="center"><?=$totalharga; ?></td>
           <td align="center"></td>
           <td align="center"></td>
           <td align="center"></td>
           <td align="center"></td>
          
         
                  
      </tr>
      

</table>
<br>
<br>
 <div style="position: relative;bottom: 4;">
  <table border="0" cellpadding="0" cellspacing="0" style="width:100%;float:left">
      <tbody>
            <tr>
                  <td align="center" width="125"> XXX</td>
                  <td align="center" width="300"></td>
                  <td> XXX, 22 Januari 2017</td>             
            </tr>            
            <tr>
                  <td align="center" width="125"> Yang Menerima</td>
                  <td align="center" width="300"></td>
                  <td> Yang Mengeluarkan</td>               
            </tr>
            <tr>
                  <td height="80"></td>
                  <td height="80"></td>
                  <td height="80"></td>
            </tr>
            <tr>
                  <td align="center" width="125"></td>
                  <td align="center" width="300"></td>
                  <td> Imam Samudra                   
                  </td>
            </tr>
            <tr>
                  <td align="center" width="125"></td>
                  <td align="center" width="300"></td>
                  <td>NIP : 007 0231 1223</td>
            </tr>
      </tbody>
</table>

</div>

