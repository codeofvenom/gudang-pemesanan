<?php 
  $month = date('m');
  $Bulan = '';
  if ($month == '01') {
      $Bulan = 'Januari';
  } elseif ($month == '02') {
      $Bulan = 'Februari';
  } elseif ($month == '03') {
      $Bulan = 'Maret';
  } elseif ($month == '04') {
      $Bulan = 'April';
  } elseif ($month == '05') {
      $Bulan = 'Mei';
  } elseif ($month == '06') {
      $Bulan = 'Juni';
  } elseif ($month == '07') {
      $Bulan = 'Juli';
  } elseif ($month == '08') {
      $Bulan = 'Agustus';
  } elseif ($month == '09') {
      $Bulan = 'September';
  } elseif ($month == '10') {
      $Bulan = 'Oktober';
  } elseif ($month == '11') {
      $Bulan = 'November';
  } elseif ($month == '12') {
      $Bulan = 'Desember';
  }

?>
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
           <td colspan="2" align="center">Jl. XXX No XX0 B xxx Kode Pos xxx</td>
    
  </tr>
      <tr>
           <td width="75"> </td>
           <td colspan="2" align="center" style="font-size:10px;">Website:www.xxxkota.go.id email:disdaldukkb@xxxkota.go.id</td>
            
      </tr>

</table>
<!-- <br><br><br><br><br><br> -->
------------------------------------------------------------------------------------------------------------------------------------------------------
<table align="center">
      <tr>

            <td align="center"><h3 style="text-align: center;"><u>BASTB/SURAT BUKTI BARANG KELUAR<u></h3>
                                                Nomor :_______/ SBBK
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
            <td colspan="2">Berdasarkan SPMB/BON/Permintaan |   _________   /SBBK/<?php echo date('Y'); ?></td>
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
           <td align="center"><?=number_format($data->harga, 2, ',', '.'); ?></td>
           <td align="center"><?=number_format($jumlahharga, 2, ',', '.'); ?></td>
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
           <td align="center"><?=number_format($totalharga, 2, ',', '.'); ?></td>
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
                  <td> XXX, <?php echo date('d'); ?> <?php echo $Bulan; ?> <?php echo date('Y'); ?></td>             
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

<pagebreak />

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
           <td colspan="2" align="center">Jl. Hasanudin No 110 B XXX Kode Pos 50721</td>
    
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

            <td align="center"><h3 style="text-align: center;"><u>SURAT PERINTAH MENGELUARKAN BARANG<u></h3>
                                                Nomor :_______/ SBBK/204/<?php echo date('Y'); ?>
            </td>
      </tr>
</table>

<br>
<table style="width: 100%">
      <tr>
            
            <td id="isi_awal">Diperintahkan kepada Penyimpan / bendahara Barang Dinas Pengendalian Penduduk dan Keluarga Berencana Kota XXX untuk mengeluarkan barang :</td>
      </tr>
</table>
<table style="width: 100%">
      <tr>
            <td width="125">1. Kepada </td>
            <td width="2">: </td>
            <td><?=$dataview[0]->nama_instansi; ?></td>
      </tr>
      <tr>
            <td width="125">2. Alamat </td>
            <td width="2">: </td>
            <td><?=$dataview[0]->alamat; ?></td>
      </tr>
      
</table>
 Barang-barang sebagai berikut :
          
   


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
           <td style="font-size:10px;" align="center">Epade</td>
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
           <td align="center"><?=number_format($data->harga, 2, ',', '.'); ?></td>
           <td align="center"><?=number_format($jumlahharga, 2, ',', '.'); ?></td>
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
           <td align="center"><?=number_format($totalharga, 2, ',', '.'); ?></td>
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
                  <td align="center" width="275"></td>
                  <td align="center"> XXX, <?php echo date('d'); ?> <?php echo $Bulan; ?> <?php echo date('Y'); ?></td>             
            </tr>            
            <tr>
                  <td align="center" width="125"> Yang Menerima</td>
                  <td align="center" width="275">Pengurus Barang</td>
                  <td align="center"> Kepala Dinas Pengendalian Penduduk</td>               
            </tr>
            <tr>
                  <td align="center" width="125"> </td>
                  <td align="center" width="275">Bendahara Materil</td>
                  <td align="center"> dan Keluarga Berencana
                                     Kota XXX
                               </td>             
            </tr>  
            <tr>
                  <td align="center" width="125"> </td>
                  <td align="center" width="275"></td>
                  <td align="center">Kota XXX</td>             
            </tr>            
            <tr>
                  <td height="80"></td>
                  <td height="80"></td>
                  <td height="80"></td>
            </tr>
            <tr>
                  <td align="center" width="125"></td>
                  <td align="center" width="275">Imam Supardi </td>
                  <td align="center"><b><u>Sri Sarwanti SH,MS.i</u></b></td>
            </tr>
            <tr>
                  <td align="center" width="125"></td>
                  <td align="center" width="275">NIP : 19620203 198603 1 013</td>
                  <td align="center" style="font-size: 10px;">Pembina Tk.I</td>
            </tr>
            <tr>
                  <td align="center" width="125"></td>
                  <td align="center" width="275"></td>
                  <td align="center">NIP. 19670611 199303 2 006</td>
            </tr>
      </tbody>
</table>

</div>


