<!--Counter Inbox-->

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
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-datepicker.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/datepicker.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'; ?>"/>

</head>

<body class="skin-blue sidebar-mini wysihtml5-supported">
<div class="wrapper">

	<?php 

$this->load->view('administrator/Header');
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
          <a href="<?php echo base_url().'administrator/beranda'; ?>">
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
            <li><a href="<?php echo base_url().'administrator/barang'; ?>"><i class="fa fa-briefcase"></i> Data Barang</a></li>
			<li><a href="<?php echo base_url().'administrator/masuk'; ?>"><i class="fa fa-plus"></i> Tambah Barang Masuk</a></li>            
			<li><a href="<?php echo base_url().'administrator/kategori'; ?>"><i class="fa fa-list"></i> Kategori Barang</a></li>
          </ul>
        </li>

      	<li>
          <a href="<?php echo base_url().'administrator/permintaan'; ?>">
            <i class="fa fa-truck"></i> <span> Permintaan Pesanan</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
				<li class="active treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Master Data Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url().'administrator/proses'; ?>"><i class="fa fa-spinner"></i> Data Barang Diproses</a></li>
            <li><a href="<?php echo base_url().'administrator/selesai'; ?>"><i class="fa fa-check"></i>  Data Barang Selesai</a></li>
          </ul>
        </li>


      	<li>
          <a href="<?php echo base_url().'administrator/admin'; ?>">
            <i class="fa fa-user"></i> <span> Data Admin</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
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
            	<li><a href="<?php echo base_url().'administrator/client'; ?>"><i class="fa fa-users"></i> Data Client</a></li>
            	<li><a href="<?php echo base_url().'administrator/instansi'; ?>"><i class="fa fa-building-o"></i>  Data Instansi</a></li>
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
            <li><a href="<?php echo base_url().'administrator/pengumuman'; ?>"><i class="fa fa-newspaper-o"></i> Data Pengumuman</a></li>
            <li><a href="<?php echo base_url().'administrator/kategoripng'; ?>"><i class="fa fa-list"></i> Kategori Pengumuman</a></li>
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
       Daftar Pesanan Barang Diproses
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-spinner"></i> Daftar Pesanan Barang Diproses </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
										<th style="width:20px;">#</th>
										<th>Kode Transaksi</th>
										<th>Nama Instansi</th>
										<th>Jumlah Transaksi</th>
                    <th style="width:30%;text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
                     $no = 0;
                    foreach ($data->result_array() as $i) :
                         $no++;
                        $id = $i['id_transaksi'];
                        $kode_transaksi = $i['kode_transaksi'];
                        $nama_instansi = $i['nama_instansi'];
                        $nama_barang = $i['nama_barang'];
                        $nama_kategori = $i['nama_kategori'];
                        $jumlah = $i['jumlah'];
                        $satuan = $i['satuan'];
                        $harga = $i['harga'];
                                                $tanggal = $i['tanggal'];
                                                $jumlah_transaksi = $i['jumlah_transaksi'];
                      ?>	
				<tr>
					<td style="text-align:left;width:38px;"><?php echo $no; ?></td>
					<td><?php echo $kode_transaksi; ?></td>
					<td><?php echo strtoupper($nama_instansi); ?></td>
					<td><?php echo $jumlah_transaksi; ?></td>
					<td style="text-align:center;">
            <a href="<?=site_url('administrator/proses/cetakKartuPengeluaran/'.$kode_transaksi.''); ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/img/pdf-icon.png" alt="" width="15px" /> Cetak Kartu Pengeluaran</a>
            &nbsp;	
						<span data-toggle="tooltip" data-placement="top" data-original-title="Selesai">
							<a data-toggle="modal" data-target="#ModalSelesai<?php echo $id; ?>">
								<button type="button" class="btn btn-info btn-xs" title="Selesai"><i class="fa fa-check"></i> Selesai</button>
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
    <strong> Copyright &copy; <?php echo date('Y'); ?><a href=""> DPPKB Kota XXX</strong></a>. All rights reserved.
	</footer>
  </div>
	
 <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
				<div  id="control-sidebar-home-tab">
			</div>	
		</div>
</aside>	


<?php foreach ($data->result_array() as $i) :
    $id = $i['id_transaksi'];
$nama_barang = $i['nama_barang'];
$kode_transaksi = $i['kode_transaksi'];
$nama_instansi = $i['nama_instansi'];
?>
        <div class="modal fade" id="ModalSelesai<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Terima Data Transaksi Barang</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'administrator/proses/selesai'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $id; ?>"/>
              <input type="hidden" name="kode2" value="<?php echo $kode_transaksi; ?>"/>
              <input type="hidden" name="kode3" value="<?php echo $nama_instansi; ?>"/>
                            <p>Apakah Anda yakin mau menyelesaikan Data Transaksi  pesanan barang  <b><?php echo $kode_transaksi; ?></b> dengan nama barang
							<b><?php echo $nama_barang; ?></b> dari Instansi <b><?php echo strtoupper($nama_instansi); ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-check"></i> Setujui</button>
                    </div>
                    </form>
                </div>
            </div>
       </div>
	<?php endforeach; ?>
	


	
	
	

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>

<script src="<?php echo base_url().'assets/js/bootstrap-transition.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.idle.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/secure.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
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



</body>
</html>
