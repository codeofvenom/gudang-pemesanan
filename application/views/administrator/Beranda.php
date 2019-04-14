
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
        <li class="active">
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

				<li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Master Data Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'administrator/proses'; ?>"><i class="fa fa-spinner"></i> Data Barang Diproses</a></li>
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
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
								<div class="info-box-content">
					<span class="info-box-text"><h6>Data User Sistem</h6></span>
					<span class="info-box-number"><?php echo $count_all; ?></span>
				</div>
           </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          	<div class="info-box">
            	<span class="info-box-icon bg-red"><i class="fa fa-user-circle-o"></i></span>
                        <div class="info-box-content">
              				<span class="info-box-text"><h6>Data Administrator</h6></span>
              				<span class="info-box-number"><?php echo $count_admin; ?></span>
           				 </div>
          	</div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user-secret"></i></span>
                          <div class="info-box-content">
              <span class="info-box-text"><h6>Data Admin</h6></span>
              <span class="info-box-number"><?php echo $count_admin2; ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>
                        <div class="info-box-content">
              <span class="info-box-text"><h6>Data Client</h6></span>
              <span class="info-box-number"><?php echo $count_client; ?></span>
            </div>
		  </div>
</div>  


        <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="panel panel-default">
           		<div id="container2" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
           </div>
      	</div>
				
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
           		<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin:0 auto"></div>
           	</div>
		</div>
		
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
    
<script type="text/javascript">

<?php
$cpx = 0;
$coloran = array('pink', 'yellow', 'red', 'black', 'brown', 'orange');
$nm_brgx = array('kosong', 'kosong', 'kosong', 'kosong', 'kosong');
$jmlh = array(0, 0, 0, 0, 0);
foreach ($bnyk as $resultx) {
    $nm_brgx[$cpx] = $resultx->nama_barang;
    $jmlh[$cpx] = (float) $resultx->jumlah; //ambil nilai
    ++$cpx;
}
?>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: '5 Barang Terbanyak'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories:[<?php for ($i = 0; $i < 5; ++$i) {
    ?>
		  '<?php echo $nm_brgx[$i]; ?>', <?php
} ?>],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} tools</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0.5
        }
    },
	 credits: {
        enabled: false
		},
    series: [{
        name: 'Jumlah',
		color: 'orange',
        data: [<?php for ($i = 0; $i < 5; ++$i) {
        ?>
          {name: '<?php echo $nm_brgx[$i]; ?>',y:<?php echo json_encode($jmlh[$i]); ?>, color: '<?php echo $coloran[$i]; ?>'},
          <?php
    } ?>]

    }]
});
</script>
<script type="text/javascript">
<?php
$cp = 0;
$coloran = array('green', 'yellow', 'red', 'black', 'brown', 'orange', 'silver', 'magenta', 'cyan', 'grey');
$nm_brg = array('kosong', 'kosong', 'kosong', 'kosong', 'kosong');
$value = array(0, 0, 0, 0, 0);
foreach ($report as $result) {
    $nm_brg[$cp] = $result->nama_barang;
    $value[$cp] = (float) $result->jumlah; //ambil nilai
    ++$cp;
}
?>
Highcharts.chart('container2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '5 Barang Paling Banyak Dipesan'
    },
    xAxis: {
       categories:[<?php for ($i = 0; $i < 5; ++$i) {
    ?>
          '<?php echo $nm_brg[$i]; ?>',
          <?php
} ?>],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: '',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' Transaksi'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    
    credits: {
        enabled: false
    },
        series: [{
        name: 'Jumlah',
        data: [<?php for ($i = 0; $i < 5; ++$i) {
        ?>
          {y:<?php echo $value[$i]; ?>, color: '<?php echo $coloran[$i]; ?>'},
          <?php
    } ?>]
    }]
});
</script>

</body>
</html>
