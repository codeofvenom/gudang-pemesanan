
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
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/toast/	jquery.toast.min.css'; ?>">

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
        <li class="active">
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
		 <li>
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
        Beranda
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
      </ol>
    </section>

    <section class="content">
	<div class="row">
				<div class="col-md-3">
         
					<div class="box box-primary">
            <div class="box-body box-profile"> 
              <h3 class="profile-username text-center">Kategori Pengumuman</h3>
							<br>
              <ul class="list-group list-group-unbordered">
										 <?php foreach ($pengumuman->result() as $ktg) : ?>
                <li class="list-group-item">
									<i><a class="pull" 
									href="<?php echo base_url().'client/beranda/detail/'.$ktg->id_kategori_png; ?>"><?php echo $ktg->nama_kategori; ?></a><a class="pull-right"><b>
										 <?php
                                        foreach ($jml->result() as $i) :
                                            if ($i->id_kategori_png == $ktg->id_kategori_png) {
                                                echo $i->jumlah;
                                            } else {
                                                echo '';
                                            }
                                        ?>	<?php endforeach; ?>
									</a></b></i>
                </li>
								<?php endforeach; ?>
              </ul>
            </div>
				</div>
		</div>
		
 			<div class="col-md-9">
          	<ul class="timeline">
							 <?php foreach ($posts->result() as $post) : ?>
            	<li class="time-label">
                 	 <span class="bg-red"><?php echo $post->tanggal.'&nbsp;'.$post->bulan.'&nbsp;'.$post->tahun; ?></span>
            	</li>
           		 <li>
              <i class="fa fa-newspaper-o bg-blue"></i>
						  <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $post->jam; ?></span>
                <h3 class="timeline-header"><a><?php echo $post->judul; ?></a></h3>
                <div class="timeline-body">
             				<?php echo $post->pengumuman; ?><br><br>
                </div>
                <div class="timeline-footer">		
                  <a class="btn btn-info btn-xs"> # <?php echo $post->nama_kategori; ?></a>
                  <a class="btn btn-primary btn-xs"><i class="fa fa-user"></i> <?php echo $post->author; ?></a>
													 		
			
								</div>
              </div>
            </li>
							<?php endforeach; ?>

					<div class="col-md-12 text-center">
						<?php echo $page; ?>		
						<br>		
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
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>


<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.idle.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/toast/	jquery.toast.min.css'; ?>"></script>
<script src="<?php echo base_url().'assets/code/highcharts.js'; ?>"></script>
<script src="<?php echo base_url().'assets/code/modules/exporting.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/jQuery-Knob/js/jquery.knob.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/secure.js'; ?>"></script>
 <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  