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


      	<li class="active">
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
        Data Admin
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Data Admin</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Admin</a>
            </div>
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
										<th style="width:5%;">#</th>
										<th>Foto</th>
										<th>Nama</th>
                    					<th>Username</th>
										<th>Status</th>
										<th>Terdaftar pada</th>
										<th>Didaftarkan oleh</th>
										<th>IP Address</th>
                    <th style="width:10%;text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
            $no = 0;
            foreach ($data->result_array() as $i) :
                $no++;
                $id_admin = $i['id_admin'];
                $nama = $i['nama'];
                $username = $i['username'];
                $foto = $i['foto'];
                $last_login = $i['last_login'];
                $created_time = $i['created_time'];
                $last_login_time = $i['last_login_time'];
                $created_by = $i['created_by'];
                $created_on = $i['created_on'];
                $active = $i['active'];
                $ip = $i['IP'];
            ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><img width="90" height="80" class="lazyload img-circle" src="<?php echo base_url().'assets/img/avatar/admin/'.$foto; ?>"></td>
									<td><?php echo $nama; ?></td>
				  					<td><?php echo $username; ?></td>
									<td><?php if ($active == 1) :  echo 'Aktif'; ?>
										<?php else : echo 'Non-Aktif'; ?>
										<?php endif; ?>
									</td>
									<td><?php echo longdate_indo($created_on).' '.$created_time; ?></td>
									<td><?php echo $created_by; ?></td>
									<td><?php echo $ip; ?></td>
                       
				   <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id_admin; ?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_admin; ?>"><span class="fa fa-trash"></span></a>
                  </td>		
                </tr>
				<?php endforeach; ?>
                </tbody>
              </table>
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

 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Admin</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'administrator/admin/simpan_admin'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
						            <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama"  class="form-control" id="xnama" placeholder="Nama" required>	
										</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername" class="form-control" id="xusername" placeholder="Username" required>	
												<span id="username_result"></span>
										</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="xpassword" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="xpassword2" placeholder="Ulangi Password" required>
                                        <span id="password_result"></span>
										</div>
                                    </div>  
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xstatus" required>
												<option value="" required>-Pilih-</option>
                                                <option value="1"> Aktif</option>
                                                <option value="2"> Non-aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto" required/>
                                        </div>
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
        $id_admin = $i['id_admin'];
        $nama = $i['nama'];
        $username = $i['username'];
        $foto = $i['foto'];
        $last_login = $i['last_login'];
        $created_by = $i['created_by'];
        $created_on = $i['created_on'];
        $active = $i['active'];
        ?>
 			<div class="modal fade" id="ModalEdit<?php echo $id_admin; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Admin</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'administrator/admin/update_admin'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
						            <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
											<input type="hidden" name="kode" value="<?php echo $id_admin; ?>"/>
                                            <input type="text" name="xnama" value="<?php echo $nama; ?>" class="form-control" id="xnama" placeholder="Nama" required>	
										</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
											<input type="hidden" name="kode" value="<?php echo $id_admin; ?>"/>
                                            <input type="text" name="xusername" value="<?php echo $username; ?>" class="form-control" id="xusername" placeholder="Username" required>	
											<span id="username_result"></span>
										</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="xpassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="xpassword2" placeholder="Ulangi Password" >
                                        <span id="password_result"></span>
										</div>
                                    </div>  
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-7">
										<select class="form-control" name="xstatus">
										<?php if ($active == '1') : ?>
												<option value="1" selected >Aktif</option>   
												<option value="0" >Non-aktif</option>
										<?php else : ?>
												<option value="0" selected > Non-aktif</option>    
												<option value="1" > Aktif</option>
												                                            
										<?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Foto </label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto" />
                                        </div>
                                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan" ><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>   
	<?php endforeach; ?>


	 	<?php foreach ($data->result_array() as $i) :
        $id_admin = $i['id_admin'];
        $username = $i['username'];
        ?>
        <div class="modal fade" id="ModalHapus<?php echo $id_admin; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Admin</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'administrator/admin/hapus_admin'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $id_admin; ?>"/>
                            <p>Apakah Anda yakin mau menghapus data admin  dengan username : <b><?php echo $username; ?></b> ?</p>

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
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.idle.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/secure.js'; ?>"></script>
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
 $(document).ready(function(){  
		$('#xpassword2').on('keyup', function() {
			 if ($('#xpassword').val() == $('#xpassword2').val()) {
					$('#password_result').html("<i class='fa fa-check' style='color:green'></i>"+
					' Password sesuai').css('color', 'green');
					document.getElementById("simpan").disabled = false;
			 }else{
				 		$('#password_result').html('Konfirmasi Password tidak sesuai').css('color', 'red');
						 
			 }	
			});		
});	
 $(document).ready(function(){  
      $('#xusername').change(function(){  
           var xusername = $('#xusername').val();  
           if(xusername != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>administrator/admin/check_username_avalibility",  
                     method:"POST",  
                     data:{xusername:xusername},  
                     success:function(data){  
                          $('#username_result').html(data);  
                     }  
								});  			
           }else{
						 $.ajax({  
							  data:{xusername:xusername},  
                     success:function(data){  
													document.getElementById('username_result').innerHTML = "<label class='text-warning'><b>"
													+"<i class='fa fa-exclamation-triangle' style='color:orange'></i> "+
													'Mohon isi data username kembali'+"</b></label>";
													$('#simpan').attr('disabled', 'disabled');
										 }  
									});  				 
					 }
      });  
 }); 
</script>
<?php if ($this->session->flashdata('msg') == 'error') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'warning') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Warning',
                    text: "Gambar yang Anda masukan terlalu besar.",
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FFC017'
                });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Admin Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'info') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Data Admin berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Admin Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif ($this->session->flashdata('msg') == 'show-modal') : ?>
        <script type="text/javascript">
                $('#ModalResetPassword').modal('show');
        </script>
    <?php else : ?>

    <?php endif; ?>

</body>
</html>
