<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DPPKB Kota XXX</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'assets/img/ico/favicon.png'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-theme.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/responsive.dataTables.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'; ?>"/>

</head>

<body class="hold-transition skin-blue sidebar-mini wysihtml5-supported">
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>Master Data Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/barang'; ?>"><i class="fa fa-briefcase"></i> Data Barang</a></li>
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

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Detail Data Barang
        <small></small>
      </h1>
  	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Master Data Barang </a></li>
        <li class="active">Detail Data Barang </li>
    </ol>
    </section>
    <section class="content">
     
		 	<div class="row">
					<div class="col-md-4">
          	<div class="box box-primary">
            	<div class="box-body box-profile">
							<?php foreach ($data->result() as $i) : ?>
            		<h4 class="profile-username text-left">Detail Data Barang</h4>
									<ul class="list-group  list-group-unbordered">
										<br>		
										<li class="list-group-item striped">
											<b>Nama Barang</b><a class="pull-right">
															<?php echo $i->nama_barang; ?>
											</a>
										</li>
										<li class="list-group-item">
											<b>Jumlah Stock Barang</b><a class="pull-right">
											<?php echo $i->jumlah_stock; ?>
											</a>
										</li>
										<li class="list-group-item">
											<b>Jumlah Barang Rusak</b><a class="pull-right">
											<?php echo $i->jumlah_rusak; ?>
											</a>
										</li>
										<li class="list-group-item">
											<b>Harga</b><a class="pull-right"> <?php echo 'Rp '.number_format($i->harga, 2, ',', '.'); ?></a>
										</li>
										<li class="list-group-item">
											<b>Keterangan</b><a class="pull-right"> <?php echo $i->keterangan; ?></a>
										</li>	

									</ul>		
								</div>
            	</div>
						</div>
          	
          
						
					<div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#data" data-toggle="tab"><i class="fa fa-newspaper-o"></i> Data Transaksi Barang</a></li>
						
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="data">

							<br>
							<br>
									 <a href="<?= site_url('admin/barang/cetakKartu/'.$i->id_barang.''); ?>" target="_blank"> <i class="fa fa-file-pdf-o"  style="font-size:30px;color:red;" > Cetak Laporan Persediaan</i></a>


									<br><br><br><br>
										<table id="example1" class="table table-hover table-striped"  style="width:100%;">
											   <thead>
										<tr>
												<th style="width:38px;">#</th>
												<th>Tanggal</th>
												<th>Uraian</th>
												<th>Jumlah</th>
												<th>Harga</th>
												<th>Saldo</th>
										</tr>
										</thead>
										<tbody>
																			<?php
                                                                        $no = 0;
                                                                        foreach ($datax->result_array() as $i) :
                                                                            $no++;
                                                                        $id_barang = $i['id_barang'];
                                                                        $tanggal = $i['tanggal'];
                                                                        $uraian = $i['nama_instansi'];
                                                                        $jumlah = $i['jumlah'];
                                                                        $harga = $i['harga'];
                                                                        $saldo = $jumlah * $harga;
                                                                        ?>
										<tr>
										
												<td><?php echo $no; ?></td>
												<td><?php echo longdate_indo($tanggal); ?></td>
												<td><?php echo strtoupper($uraian); ?></td>
												<td><?php echo $jumlah; ?></td>
												<td><?php echo $harga; ?></td>
												<td>Rp <?php echo '-'.number_format($saldo, 2, ',', '.'); ?></td>
										</tr>
									</tbody>
										<?php endforeach; ?>	
										</table>
        
              </div>
          </div>
			  </div>
      </div>
					

	</section>
	</div>
		<?php endforeach; ?>


		
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><?php echo $online; ?> user online</b> 
    </div>
    <strong> Copyright &copy; <?php echo date('Y'); ?><a href=""> DPPKB Kota XXX</strong></a>. All rights reserved.
	</footer>
  </div>
	
 <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
				<div  id="control-sidebar-home-tab">
			</div>	
		</div>
</aside>			

 

	
<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.idle.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/secure.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/lazysizes.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'; ?>"></script>

<script>
 $(function () {
    $('#example1').DataTable({
      "paging"  : true,
	  "scrollX" : true,
	  "responsive" : true
    });
  });

</script>


</body>
</html>
