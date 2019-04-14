
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
    
    <script type="text/javascript">
<?php 
$conn = new mysqli('localhost', 'root', '');
mysqli_select_db($conn, 'db_bppkb_sltg');
?>

<?php
$setSqlTipe = "SELECT nama_barang,  stok AS 'Jumlah' FROM tb_barang ORDER BY Jumlah DESC Limit 5";
$setRecTipe = mysqli_query($conn, $setSqlTipe);
$coloran = array('red', 'green', 'yellow', 'brown', 'orange', 'silver', 'magenta', 'cyan', 'grey');
$dataT = array('kosong', 'kosong', 'kosong', 'kosong', 'kosong');
$dataJ = array(0, 0, 0, 0, 0);
$patok = 0;
while ($row1 = mysqli_fetch_array($setRecTipe)) {
    extract($row1);
    // $datapieTipe[] = array($nama_barang, intval($Jumlah));
    $dataT[$patok] = $nama_barang;
    $dataJ[$patok] = intval($Jumlah);
    ++$patok;
}
// $dataTipe = json_encode($datapieTipe);
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
          '<?php echo $dataT[$i]; ?>',
          <?php
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
    series: [{
        name: 'Jumlah',
        color : 'orange',
        data: [<?php for ($i = 0; $i < 5; ++$i) {
        ?>
          {name: '<?php echo $dataT[$i]; ?>',y:<?php echo $dataJ[$i]; ?>, color: '<?php echo $coloran[$i]; ?>'},
          <?php
    } ?>]

    }]
});

<?php
$setSqlKondisi = "SELECT a.nama_barang, sum(b.jumlah) as 'Jumlah' from tb_barang a, tb_transaksi b where b.id_barang = a.id_brg and b.keterangan = 'keluar' GROUP BY b.id_barang DESC Limit 5";
$setRecKondisi = mysqli_query($conn, $setSqlKondisi);
$coloran2 = array('green', 'yellow', 'red', 'black', 'brown', 'orange', 'silver', 'magenta', 'cyan', 'grey');
$dataKondName = array('kosong', 'kosong', 'kosong', 'kosong', 'kosong');
$dataKond = array(0, 0, 0, 0, 0);
$in = 0;
while ($row1 = mysqli_fetch_array($setRecKondisi)) {
    extract($row1);
    // $datapieKondisi[] = array($Keterangan, intval($Jumlah));
    $dataKond[$in] = intval($Jumlah);
    $dataKondName[$in] = $nama_barang;
    ++$in;
}
// $dataKondisi = json_encode($datapieKondisi);
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
          '<?php echo $dataKondName[$i]; ?>',
          <?php
} ?>],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (tools)',
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
          {y:<?php echo $dataKond[$i]; ?>, color: '<?php echo $coloran2[$i]; ?>'},
          <?php
    } ?>]
    }]
});

<?php
$bulan_patok = date('m');
$tahun_patok = date('y');
$tanggal_mulai = array('', '', '', '', '');
$patokan = 13;
for ($i = 1; $i < 6; ++$i) {
    $convertan = $bulan_patok - $i;
    if ($convertan < 1) {
        --$patokan;
        $tanggal_mulai[$i - 1] = '20'.($tahun_patok - 1).'-'.sprintf('%02d', $patokan).'-01';
    } else {
        $tanggal_mulai[$i - 1] = '20'.$tahun_patok.'-'.sprintf('%02d', $convertan).'-01';
    }
}
$tanggal_selesai = array('', '', '', '', '');
$patokan = 13;
for ($i = 0; $i < 5; ++$i) {
    $convertan = $bulan_patok - $i;
    if ($convertan < 1) {
        --$patokan;
        $tanggal_selesai[$i] = '20'.($tahun_patok - 1).'-'.sprintf('%02d', $patokan).'-01';
    } else {
        $tanggal_selesai[$i] = '20'.$tahun_patok.'-'.sprintf('%02d', $convertan).'-01';
    }
}
$bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$patokbulan = 0;
$bulandisplay = array('', '', '', '', '');
$patokan = 13;
for ($i = 1; $i < 6; ++$i) {
    $convertan = $bulan_patok - $i;
    if ($convertan < 1) {
        --$patokan;
        $bulandisplay[$i - 1] = $bulan[$patokan - 1];
    } else {
        $bulandisplay[$i - 1] = $bulan[$convertan - 1];
    }
}

$tanggalke = array(0, 0, 0, 0, 0);

$setSqlKondisi = "SELECT COUNT(id_transaksi) AS Jumlah FROM tb_transaksi WHERE tanggal >= '$tanggal_mulai[4]' and tanggal < '$tanggal_selesai[4]' ";
$setRecKondisi = mysqli_query($conn, $setSqlKondisi);
while ($row1 = mysqli_fetch_array($setRecKondisi)) {
    extract($row1);
    // $datapieKondisi[] = array($Keterangan, intval($Jumlah));
    $tanggalke[4] = intval($Jumlah);
    // $dataKondName[] = $Keterangan;
}
$setSqlKondisi = "SELECT COUNT(id_transaksi) AS Jumlah FROM tb_transaksi WHERE tanggal >= '$tanggal_mulai[3]' and tanggal < '$tanggal_selesai[3]' ";
$setRecKondisi = mysqli_query($conn, $setSqlKondisi);
while ($row1 = mysqli_fetch_array($setRecKondisi)) {
    extract($row1);
    // $datapieKondisi[] = array($Keterangan, intval($Jumlah));
    $tanggalke[3] = intval($Jumlah);
    // $dataKondName[] = $Keterangan;
}
$setSqlKondisi = "SELECT COUNT(id_transaksi) AS Jumlah FROM tb_transaksi WHERE tanggal >= '$tanggal_mulai[2]' and tanggal < '$tanggal_selesai[2]' ";
$setRecKondisi = mysqli_query($conn, $setSqlKondisi);
while ($row1 = mysqli_fetch_array($setRecKondisi)) {
    extract($row1);
    // $datapieKondisi[] = array($Keterangan, intval($Jumlah));
    $tanggalke[2] = intval($Jumlah);
    // $dataKondName[] = $Keterangan;
}
$setSqlKondisi = "SELECT COUNT(id_transaksi) AS Jumlah FROM tb_transaksi WHERE tanggal >= '$tanggal_mulai[1]' and tanggal < '$tanggal_selesai[1]' ";
$setRecKondisi = mysqli_query($conn, $setSqlKondisi);
while ($row1 = mysqli_fetch_array($setRecKondisi)) {
    extract($row1);
    // $datapieKondisi[] = array($Keterangan, intval($Jumlah));
    $tanggalke[1] = intval($Jumlah);
    // $dataKondName[] = $Keterangan;
}
$setSqlKondisi = "SELECT COUNT(id_transaksi) AS Jumlah FROM tb_transaksi WHERE tanggal >= '$tanggal_mulai[0]' and tanggal < '$tanggal_selesai[0]' ";
$setRecKondisi = mysqli_query($conn, $setSqlKondisi);
while ($row1 = mysqli_fetch_array($setRecKondisi)) {
    extract($row1);
    // $datapieKondisi[] = array($Keterangan, intval($Jumlah));
    $tanggalke[0] = intval($Jumlah);
    // $dataKondName[] = $Keterangan;
}
?>
Highcharts.chart('container3', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Jumlah Transaksi 5 Bulan Terakhir'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 80,
        y: 30,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [<?php for ($i = 4; $i > -1; --$i) {
    ?>
          '<?php echo $bulandisplay[$i]; ?>',
          <?php
} ?>]
    },
    yAxis: {
        title: {
            text: 'Jumlah Transaksi'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' Data'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
      name: 'Transaksi',
      data: [<?php echo $tanggalke[0]; ?>, <?php echo $tanggalke[1]; ?>, <?php echo $tanggalke[2]; ?>, <?php echo $tanggalke[3]; ?>,<?php echo $tanggalke[4]; ?>]
    }]
});
</script>

</body>
</html>
