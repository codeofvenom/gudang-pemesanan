
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
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/dist/css/bootstrap-select.css'; ?>" >
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/datepicker.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'; ?>"/>
</head>
<body class="skin-blue sidebar-mini wysihtml5-supported">
<div class="wrapper">

	<?php 
            $this->load->view('client/Header');
  ?>

  <aside class="main-sidebar" >

    <section class="sidebar">
        <div class="user-panel">
        <div class="pull-left image">
				<?php
            $id_client = $this->session->userdata('ses_id');
            $q = $this->db->query("SELECT * FROM tb_client WHERE id_client='$id_client'");
            $c = $q->row_array();
            ?>
          <img src="<?php echo base_url().'assets/img/avatar/client/'.$c['foto']; ?>" class="lazyload img-circle" alt="User Image">
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
      	<li>
          <a href="<?php echo base_url().'client/barang'; ?>">
            <i class="fa fa-briefcase"></i> <span> Data Barang  &  Pesan Barang</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

		<li class="active">
          <a href="<?php echo base_url().'client/daftarpesan'; ?>">
            <i class="fa fa-list"></i> <span> Daftar Status Pesan Barang</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
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
        Daftar Status Pesan Barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list"></i> Daftar Status Pesan Barang</a></li>
      </ol>
    </section>

    <section class="content">
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
    			<div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:14px;">
                <thead>
                <tr>
										<th style="width:38px;">#</th>
                   	<th>Nama Barang</th>
										<th>Jumlah</th>
										<th>Tanggal</th>
										<th>Dipesan oleh</th>
										<th align:center>Status</th>
                </tr>
                </thead>
                <tbody>
										<?php
                                    $no = 0;
                                    foreach ($data->result_array() as $i) :
                                        $no++;
                                    $nama_barang = $i['nama_barang'];
                                    $satuan = $i['satuan'];
                                    $tanggal = $i['tanggal'];
                                    $jumlah = $i['jumlah'];
                                    $status = $i['status'];
                                    $nama_client = $i['nama_client'];
                                    ?>
									<tr>
										<td style="text-align:left;width:38px;"><?php echo $no; ?></td>
										<td><?php echo $nama_barang; ?></td>
										<td><?php echo $jumlah; ?> <?php echo $satuan; ?></td>
										<td><?php echo longdate_indo($tanggal); ?></td>
										<td><?php echo strtoupper($nama_client); ?></td>
										<td><?php if ($status == 0) : ?><?php echo '<p style="color:red;"><b><i class="fa fa-times"></i> PESANAN ANDA DITOLAK</b><p>'; ?>
												<?php elseif ($status == 1) : ?><?php echo '<p style="color:black;"><b> PESANAN ANDA SEDANG MENUNGGU KONFIRMASI</b><p>'; ?>			
												<?php elseif ($status == 2) : ?><?php echo '<p style="color:orange;"><b><i class="fa fa-spinner"></i> PESANAN ANDA TELAH DIPROSES</b><p>'; ?>			
												<?php elseif ($status == 3) : ?><?php echo '<p style="color:green;"><b><i class="fa fa-truck"></i> PESANAN ANDA TELAH SELESAI</b><p>'; ?>	
												<?php else : ?>	
										</td>
										<?php endif; ?>
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
      <div class="tab-pane" id="control-sidebar-home-tab">
			</div>	
		</div>
</aside>		




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

</body>
</html>
