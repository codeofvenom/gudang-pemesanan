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

$this->load->view('client/Header');
?>

  <aside class="main-sidebar" >

    <section class="sidebar">
        <div class="user-panel">
        <div class="pull-left image">
				<?php
            $id_client = $this->session->userdata('ses_id');
            $q = $this->db->query("SELECT *,tb_instansi.nama_instansi FROM tb_client JOIN tb_instansi
						ON tb_client.id_instansi =tb_instansi.id_instansi
						 WHERE id_client='$id_client'");
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
          <a href="<?php echo base_url().'client/beranda'; ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

      	<li class="active">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data  Barang & Pesan Barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Data Barang & Pesan Barang </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
    			<div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:12px;">
                <thead>
                <tr>
										<th style="text-align:center;width:38px;">#</th>
										<th style="text-align:center;">ID Barang</th>
                   	                    <th style="text-align:center;">Nama Barang</th>
										<th style="text-align:center;">Kategori Barang</th>
										<th style="text-align:center;">Jumlah Stock</th>
										<th style="text-align:center;">Satuan</th>
										<th style="text-align:center;">Tanggal Masuk</th>
										<th style="text-align:center;">Tanggal Expired</th>
										<th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
												<?php
                                            $no = 0;
                                            foreach ($data->result_array() as $i) :
                                                $no++;
                                            $id_barang = $i['id_barang'];
                                            $jumlah_stock = $i['jumlah_stock'];
                                            $nama_barang = $i['nama_barang'];
                                            $kategori = $i['nama_kategori'];
                                            $satuan = $i['satuan'];
                                            $tglm = $i['tanggal_masuk'];
                                            $tglx = $i['tanggal_expired'];
                                            ?>
							 	<tr>
										<td style="text-align:center;width:38px;"><?php echo $no; ?></td>
										<td style="text-align:center;"><?php echo $id_barang; ?></td>
										<td style="text-align:center;"><?php echo $nama_barang; ?></td>
										<td style="text-align:center;"><?php echo $kategori; ?></td>
										<td style="text-align:center;"><?php echo $jumlah_stock; ?></td>
										<td style="text-align:center;"><?php echo $satuan; ?></td>
										<td style="text-align:center;"><?php echo $tglm; ?></td>
										<td style="text-align:center;"><?php echo $tglx; ?></td>
										<td>
										 <form action="<?php echo base_url().'client/barang/add_to_cart'; ?>" method="post">
                            <input type="hidden" name="kode_brg" value="<?php echo $id_barang; ?>">
                            <input type="hidden" name="xsatuan" value="<?php echo $satuan; ?>">
                            <input type="hidden" name="xstock" value="<?php echo $jumlah_stock; ?>">
                            <input type="hidden" name="xqty" value="1" required>
                            <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                      </form>
										</td>
								</tr>		
		<?php endforeach; ?>
                </tbody>
              </table>	
							  <form action="<?php echo base_url().'client/barang/add_to_cart'; ?>" method="post">
									<table>
										<h1 >Transaksi
												<small>Pesan Barang</small><hr>
										<h1>	
										<tr>											
												<th>ID Barang</th>
										<tr>
												<th>		
														<input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm">
													</th>                     
										</tr>
												<div id="detail_barang" style="position:absolute;"> </div>
										</table>
							  </form>
  								<table id="example2" class="table table-bordered table-condensed  table-responsive responsive" style="font-size:11px;margin-top:10px;">
										<thead>
												<tr>
														<th style="text-align:center;">ID Barang</th>
														<th style="text-align:center;">Nama Barang</th>
														<th style="text-align:center;">Jumlah Pesan Barang</th>
														<th style="text-align:center;">Satuan</th>
														<th style="text-align:center;">Aksi</th>
												<tr>		
									  </thead>
										<tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items) : ?>
													<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
													<tr>
															<td style="text-align:center;"><?= $items['id']; ?></td>
															<td style="text-align:center;"><?= $items['name']; ?></td>
															<td style="text-align:center;"><?php echo number_format($items['qty']); ?> </td>
															<td style="text-align:center;"><?= $items['satuan']; ?></td>
															<td style="text-align:center;"><a href="<?php echo base_url().'client/barang/remove/'.$items['rowid']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
													</tr>													
													<?php ++$i; ?>
                    <?php endforeach; ?>
										</tbody>
									</table>											
									<br><br>																		
									<form action="<?php echo base_url().'client/barang/simpan_pesanan'; ?>" method="post">
            			<table class="responsive">
											<tr>
													<td style="width:70%;" rowspan="4"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>				
                    			<th>Kode Transaksi Pemesanan</th>
                    			<th style="text-align:right;width:25p%;"><input type="text"  value="<?php echo $ktrp; ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" disabled></th>
													<input type="hidden" id="qkd" name="qkd" 	value="<?php echo $ktrp; ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
											</tr>
											<tr>
													<input type="hidden" id="uri" name="uri" 	value="<?php echo $c['nama_instansi']; ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
													<input type="hidden" id="urc" name="urc" 	value="<?php echo $c['id_client']; ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
													<input type="hidden" id="urii" name="urii" 	value="<?php echo $c['id_instansi']; ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
													<th style="width:25p%;">Total Jumlah Pesan Barang</th>
													<th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total_items()); ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
													<input type="hidden" id="total" name="total" value="<?php echo $this->cart->total_items(); ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
               	 			</tr>
    			        </table>
            </form>
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
	
 




	
	
	

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/dist/js/bootstrap-select.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>

<script src="<?php echo base_url().'assets/js/bootstrap-transition.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
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
        $(document).ready(function(){
            $('#kode_brg').focus();
            $('#kode_brg').on("input",function(){
                var kobar = {kode_brg:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'client/barang/get_barang'; ?>",
               data: kobar,
               success: function(msg){
               $('#detail_barang').html(msg);
               }
            });
            }); 

            $('#kode_brg').keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>	

</body>
</html>
