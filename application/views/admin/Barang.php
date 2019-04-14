<!--Counter Inbox-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BKKP Salatiga</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'assets/img/ico/favicon.png'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-theme.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-datepicker.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/dist/css/bootstrap-select.css'; ?>" >
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/datepicker.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'; ?>"/>
  <style>
  .datepicker {
z-index:1151 !important;
}
  </style>

</head>

<body class="skin-blue sidebar-mini wysihtml5-supported">
<div class="wrapper">

	<?php 

$this->load->view('admin/Header');
?>

  <aside class="main-sidebar" >

    <section class="sidebar">
        <div class="user-panel">
        <div class="pull-left image">
				<?php
            $id_admin = $this->session->userdata('ses_id');
            $q = $this->db->query("SELECT * FROM tb_admin WHERE id_admin='$id_admin'");
            $c = $q->row_array();
            ?>
          <img src="<?php echo base_url().'assets/img/avatar/admin/'.$c['foto']; ?>" class="lazyload img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
					<p><?php echo ucfirst($c['nama']); ?></p>
					<a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" >
        <li>
          <a href="<?php echo base_url().'admin/beranda'; ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>Master Data Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url().'admin/barang'; ?>"><i class="fa fa-briefcase"></i> Data Barang</a></li>
			<li><a href="<?php echo base_url().'admin/masuk'; ?>"><i class="fa fa-plus"></i> Tambah Barang Masuk</a></li>            
			<li><a href="<?php echo base_url().'admin/kategori'; ?>"><i class="fa fa-list"></i> Kategori Barang</a></li>
          </ul>
        </li>

      	<li>
          <a href="<?php echo base_url().'admin/permintaan'; ?>">
            <i class="fa fa-truck"></i> <span> Permintaan Pesanan</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
				<li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Master Data Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/proses'; ?>"><i class="fa fa-spinner"></i> Data Barang Diproses</a></li>
            <li><a href="<?php echo base_url().'admin/selesai'; ?>"><i class="fa fa-check"></i>  Data Barang Selesai</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Master Data Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
			<ul class="treeview-menu">
            	<li><a href="<?php echo base_url().'admin/client'; ?>"><i class="fa fa-users"></i> Data Client</a></li>
            	<li><a href="<?php echo base_url().'admin/instansi'; ?>"><i class="fa fa-building-o"></i>  Data Instansi</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span> Pengumuman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/pengumuman'; ?>"><i class="fa fa-newspaper-o"></i> Data Pengumuman</a></li>
            <li><a href="<?php echo base_url().'admin/kategoripng'; ?>"><i class="fa fa-list"></i> Kategori Pengumuman</a></li>
          </ul>
        </li>
        
         <li>
          <a href="<?php echo base_url().'login_admin/system/login/logout'; ?>">
            <i class="fa fa-sign-out"></i> <span>Keluar</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
       
      </ul>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data  Barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Master Data Barang </a></li>
        <li class="active">Data Barang </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Barang</a>
			   &nbsp;
              <a href="<?= site_url('admin/barang/cetakLaporanPersediaan'); ?>" target="_blank">
                <button type="button" class="btn btn-primary"><img src="<?php echo base_url(); ?>assets/img/img/pdf-icon.png" alt="" width="15px" /> Laporan Persediaan </button>
              </a>
              &nbsp;
              <a href="<?= site_url('admin/barang/cetakLaporanPersediaanBulanan'); ?>" target="_blank">
                <button type="button" class="btn btn-primary"><img src="<?php echo base_url(); ?>assets/img/img/pdf-icon.png" alt="" width="15px" /> Laporan Persediaan barang bulanan </button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
										<th style="width:38px;">#</th>
                   						<th>Nama Barang</th>
										<th>Kategori Barang</th>
										<th>Jumlah Stock</th>
										<th>Satuan</th>
										<th>Harga</th>
										<th>Saldo</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
												<?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id_barang = $i['id_barang'];
                                    $nama_barang = $i['nama_barang'];
                                    $kategori = $i['nama_kategori'];
                                    $satuan = $i['satuan'];
                                    $harga = $i['harga'];
                                    $jumlah_stock = $i['jumlah_stock'];
                                    $saldo = $jumlah_stock * $harga;
                         ?>
							 	<tr>
										<td style="text-align:left;width:38px;"><?php echo $no; ?></td>
										<td><?php echo $nama_barang; ?></td>
										<td><?php echo $kategori; ?></td>
										<td><?php echo $jumlah_stock; ?></td>
										<td><?php echo $satuan; ?></td>
										<td><?php echo 'Rp '.number_format($harga, 2, ',', '.'); ?></td>
										<td><?php echo 'Rp '.number_format($saldo, 2, ',', '.'); ?></td>
										<td style="text-align:center;">	
												<span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail Barang">
													<a href="<?php echo base_url().'admin/barang/detail/'.$id_barang; ?>">
														<button type="button" class="btn btn-white btn-xs" title="View Details"><i class="fa fa-eye"> Detail</i></button>
													</a>
												</span>	
												<span data-toggle="tooltip" data-placement="top" data-original-title="Edit Barang">
													<a data-toggle="modal" data-target="#ModalEdit<?php echo $id_barang; ?>">
														<button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil"></i> Edit</button>
													</a>
												</span>	
											 <span data-toggle="tooltip" data-placement="top" data-original-title="Hapus Barang">
													<a data-toggle="modal" data-target="#ModalHapus<?php echo $id_barang; ?>">
														<button type="button" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>
													</a>
											 </span>	
										
										</td>
								</tr>		
		<?php endforeach; ?>
                </tbody>
              </table>
            </div>
     

    </section>
  </div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><?php echo $online; ?> user online</b> 
    </div>
    <strong> Copyright &copy; <?php echo date('Y'); ?><a href=""> BKKP Kota Salatiga</strong></a>. All rights reserved.
	</footer>
  </div>
	
 <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
				<div  id="control-sidebar-home-tab">
			</div>	
		</div>
</aside>	

<?php foreach ($data->result_array() as $i) :
    $id_barang = $i['id_barang'];
$batch = $i['batch'];
$nama_barang = $i['nama_barang'];
$kategori = $i['nama_kategori'];
$tanggal_produksi = $i['tanggal_produksi'];
$iktg=$i['id_kategori'];
$satuan = $i['satuan'];
$harga = $i['harga'];
$tanggal_masuk = $i['tanggal_masuk'];
$tanggal_expired = $i['tanggal_expired'];
$jumlah_stock = $i['jumlah_stock'];
$jumlah_rusak = $i['jumlah_rusak'];
$ket = $i['keterangan'];
?>
        <div class="modal fade" id="ModalEdit<?php echo $id_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data Barang</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/barang/update_barang'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
						            <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Nama Barang</label>
                            	<div class="col-sm-7">
								<input type="hidden" name="kode" value="<?php echo $id_barang; ?>" readonly/>
                                <input type="text" name="xnama"  value="<?php echo $nama_barang; ?>" class="form-control" id="xnama" placeholder="Nama Barang" required>	
															</div>
                    </div>        
									<div class="form-group">
											<label for="inputUserName" class="col-sm-4 control-label">Nama Kategori Barang</label>
												<div class="col-sm-7">
                          <select class="selectpicker show-tick form-control" name="xktg" style="width: 100%;"  data-live-search="true" title="Pilih Kategori Barang" required>
																<?php
                                   foreach ($ktg->result_array() as $i) {
                                       $id_kategori = $i['id_kategori'];
                                       $nama_kategori = $i['nama_kategori'];
                                       if ($iktg == $id_kategori) {
                                           echo "<option value='$id_kategori' selected>$nama_kategori </option>";
                                       } else {
                                           echo "<option value='$id_kategori'>$nama_kategori</option>";
                                       }
                                   } ?>			
				  														
               						</select>
                                	</div>
																</div>	
                                    <div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Stock</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xstock" class="form-control"  value="<?php echo $jumlah_stock; ?>" placeholder="Jumlah Stock Barang" required>
                                        </div>
                                    </div>
                                    </div>  
									<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Stock Rusak</label>
                                       <div class="row">
											 <div class="col-sm-2">
                                            	<input type="text"  class="form-control"  value="<?php echo $jumlah_rusak; ?>" disabled>
                                        	</div> 
											<div class="col-sm-4">
											<div class="form-group">
                                            	<input type="text" name="xrstock" class="form-control"  placeholder="Jumlah Stock Rusak Barang" >
                                        	</div>
											</div> 
										</div>
                                    </div>
																		<div class="form-group">
																			<label class="col-sm-4 control-label">Satuan</label>
																		 <div class="col-sm-7">
																					<select name="xsatuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
																						<?php if ($satuan == 'Unit') : ?>
                                        <option selected>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Kotak') : ?>
                                        <option>Unit</option>
                                        <option selected>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Botol') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option selected>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Butir') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option selected>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Buah') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option selected>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Biji') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option selected>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Sachet') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option selected>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Bks') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option selected>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Roll') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option selected>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'PCS') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option selected>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Box') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option selected>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Meter') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option selected>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Centimeter') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option selected>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Liter') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option selected>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'CC') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option selected>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Mililiter') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option selected>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Lusin') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option selected>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Gross') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option selected>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Kodi') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option selected>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Rim') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option selected>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Dozen') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option selected>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Kaleng') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option selected>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Lembar') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option selected>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Helai') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option selected>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif ($satuan == 'Gram') : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option selected>Gram</option>
                                        <option>Kilogram</option>
                                    <?php else : ?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option selected>Kilogram</option>
                                    <?php endif; ?>
										</select>
									</div>
                    				</div>
                               			<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Harga</label>
                                        <div class="col-sm-7">
                                            <input type="harga" name="xharga" class="harga form-control"  value="<?php echo $harga; ?>" placeholder="Harga Barang" required>
                                        </div>
										</div>
										<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Tanggal Produksi Barang</label>
                                        	<div class="col-sm-7">
                                           	 <input type="text" name="xprtgl" class="form-control pull-right"  value="<?php echo $tanggal_produksi; ?>" id="tanggal" placeholder="Tanggal Produksi Barang" required>
                                       	 	</div>
										</div>
										<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Tanggal Masuk Barang</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xmtgl" class="form-control pull-right"  value="<?php echo $tanggal_masuk; ?>" id="tanggal2" placeholder="Tanggal Masuk Barang" required>
                                        </div>
										</div>
																		<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">No Batch</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xbatch" class="form-control"  value="<?php echo $batch; ?>" placeholder="No Batch Barang" required>
                                        </div>
																		</div>
																		<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Tanggal Expired</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xtgl" class="form-control pull-right" value="<?php echo $tanggal_expired; ?>" id="tanggal3" placeholder="Tanggal Expired" required>
                                        </div>
																		</div>

																		<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Keterangan</label>
                                        <div class="col-sm-7">
                                           	<textarea class="form-control" rows="3" name="xket" placeholder="Keterangan..." ><?php echo $ket; ?></textarea>
                                        </div>
																		</div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan" $submited><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    </form>

                </div>
            </div>
       </div>
	<?php endforeach; ?>




	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/barang/simpan_barang'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
						            <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama Barang</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama"  class="form-control" id="xnama" placeholder="Nama Barang" required>	
										</div>
                                    </div>        
								<div class="form-group">
									<label for="inputUserName" class="col-sm-4 control-label">Nama Kategori Barang</label>
									<div class="col-sm-7">
                                  	 <select class="selectpicker show-tick form-control" name="xktg" style="width: 100%;"  data-live-search="true" title="Pilih Kategori Barang" required>
																			 <?php
                                                                            foreach ($ktg->result_array() as $i) :
                                                                                $id_kategori = $i['id_kategori'];
                                                                            $nama_kategori = $i['nama_kategori'];
                                                                            ?>
                  										<option value="<?php echo $id_kategori; ?>"><?php echo $nama_kategori; ?></option>
				  														<?php endforeach; ?>
               											 </select>
                                	</div>
								</div>	
                                    <div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Stock</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xstock" class="form-control"  placeholder="Jumlah Stock Barang" required>
                                        </div>
                                    </div>
                                    </div>  
																		<div class="form-group">
																			<label class="col-sm-4 control-label">Satuan</label>
																		 <div class="col-sm-7">
																					<select name="xsatuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
																							<option>Unit</option>
																							<option>Kotak</option>
																							<option>Botol</option>
																							<option>Butir</option>
																							<option>Buah</option>
																							<option>Biji</option>
																							<option>Sachet</option>
																							<option>Bks</option>
																							<option>Roll</option>
																							<option>PCS</option>
																							<option>Box</option>
																							<option>Meter</option>
																							<option>Centimeter</option>
																							<option>Liter</option>
																							<option>CC</option>
																							<option>Mililiter</option>
																							<option>Lusin</option>
																							<option>Gross</option>
																							<option>Kodi</option>
																							<option>Rim</option>
																							<option>Dozen</option>
																							<option>Kaleng</option>
																							<option>Lembar</option>
																							<option>Helai</option>
																							<option>Gram</option>
																							<option>Kilogram</option>
																					</select>
																				</div>
                    								 </div>
                               			<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Harga</label>
                                        <div class="col-sm-7">
                                            <input type="harga" name="xharga" class="harga form-control"  placeholder="Harga Barang" required>
                                        </div>
										</div>
										<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Tanggal Produksi Barang</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xprtgl" class="form-control pull-right"   id="tanggal4" placeholder="Tanggal Produksi Barang" required>
                                        </div>
										</div>
										<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Tanggal Masuk Barang</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xmtgl" class="form-control pull-right"   id="tanggal5" placeholder="Tanggal Masuk Barang" required>
                                        </div>
										</div>
										<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">No Batch</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xbatch" class="form-control"  placeholder="No Batch Barang" required>
                                        </div>
																		</div>
																		<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Tanggal Expired</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xtgl" class="form-control pull-right"  id="tanggal6" placeholder="Tanggal Expired" required>
                                        </div>
																		</div>

																		<div class="form-group">
                                        <label for="inpuUsername2" class="col-sm-4 control-label">Keterangan</label>
                                        <div class="col-sm-7">
                                           	<textarea class="form-control" rows="3" name="xket" placeholder="Keterangan..." ></textarea>
                                        </div>
										</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan" $submited><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
			      </div>



<?php foreach ($data->result_array() as $i) :
    $id_barang = $i['id_barang'];
$nama_barang = $i['nama_barang'];
?>
        <div class="modal fade" id="ModalHapus<?php echo $id_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/barang/hapus_barang'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $id_barang; ?>"/>
                            <p>Apakah Anda yakin mau menghapus Data barang  <b><?php echo $nama_barang; ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" id="simpan"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
       </div>
	<?php endforeach; ?>


	
	
	

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/dist/js/bootstrap-select.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>

<script src="<?php echo base_url().'assets/js/bootstrap-transition.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap-datepicker.js'; ?>"></script>

<script src="<?php echo base_url().'assets/js/jquery.idle.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/secure.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'; ?>"></script>
<script src="<?php echo base_url().'assets/js/adminlte.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/app.min.js'; ?>"></script>
<script>

$(document).ready(function() {
   $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>
 <script type="text/javascript">
        $(function(){
            $('.harga').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: '.'
            });
      
        });
		</script>
 <script type="text/javascript">
		$(function(){
		    $("#tanggal").datepicker({
			format:'yyyy-mm-dd'
		    });
								});
		$(function(){
		    $("#tanggal2").datepicker({
			format:'yyyy-mm-dd'
		    });
      });
	$(function(){
		    $("#tanggal3").datepicker({
			format:'yyyy-mm-dd'
		    });
								});
	$(function(){
		    $("#tanggal4").datepicker({
			format:'yyyy-mm-dd'
		    });
      });
	$(function(){
		    $("#tanggal5").datepicker({
			format:'yyyy-mm-dd'
		    });
								});
	$(function(){
		    $("#tanggal6").datepicker({
			format:'yyyy-mm-dd'
		    });
      });  
			
</script>


</body>
</html>
