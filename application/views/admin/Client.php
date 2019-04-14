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
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/responsive.dataTables.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/dist/css/bootstrap-select.css'; ?>" >
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



        <li class="active treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Master Data Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
			<ul class="treeview-menu">
            	<li class="active"><a href="<?php echo base_url().'admin/client'; ?>"><i class="fa fa-users"></i> Data Client</a></li>
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
        Data Client
        <small></small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Master Data Client </a></li>
        <li class="active">Data Client</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Client</a>
            </div>
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:12px;">
                <thead>
                <tr>
										<th style="width:2%;">#</th>
										<th style="width:2%;">Foto</th>
										<th style="width:16%;">Nama</th>
                    					<th>Username</th>
										<th style="width:15%;">Nama Instansi</th>
										<th style="width:22%;">Alamat Instansi</th>
										<th style="width:15%;">Terdaftar pada</th>
                    <th style="width:15%;text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
            $no = 0;
            foreach ($data->result_array() as $i) :
                $no++;
                $id_client = $i['id_client'];
                $nama = $i['nama'];
                $username = $i['username'];
                $foto = $i['foto'];
                $nama_instansi = $i['nama_instansi'];
                $alamat = $i['alamat'];
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
                  <td><img width="90" height="80" class="lazyload img-circle" src="<?php echo base_url().'assets/img/avatar/client/'.$foto; ?>"></td>
									<td><?php echo $nama; ?></td>
				  					<td><?php echo $username; ?></td>
									<td><?php echo $nama_instansi; ?></td>
									<td><?php echo $alamat; ?></td>
									<td><?php echo longdate_indo($created_on).' '.$created_time; ?></td>         
				   <td style="text-align:right;">
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalEdit<?php echo $id_client; ?>">
							<span data-toggle="tooltip" data-placement="top" data-original-title="Edit Client" class="fa fa-pencil"></span>
						</a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_client; ?>">
							<span data-placement="top" data-original-title="Hapus Client" class="fa fa-trash"></span>
						</a>
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
    <strong> Copyright &copy; <?php echo date('Y'); ?><a href=""> BKKP Kota Salatiga</strong></a>. All rights reserved.
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
                        <h4 class="modal-title" id="myModalLabel">Tambah Client</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/client/simpan_client'; ?>" method="post" enctype="multipart/form-data">
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
									<label for="inputUserName" class="col-sm-4 control-label">Nama Instansi</label>
									<div class="col-sm-7">
                                  	 <select class="selectpicker show-tick form-control" name="xins" style="width: 100%;"  data-live-search="true" title="Pilih Instansi" required>
																			 <?php
                                                                            foreach ($ins->result_array() as $i) :
                                                                                $id_instansi = $i['id_instansi'];
                                                                                $nama_instansi = $i['nama_instansi'];
                                                                                $alamat = $i['alamat'];
                                                                            ?>
                  										<option value="<?php echo $id_instansi; ?>"><?php echo $nama_instansi.' - '.$alamat; ?></option>
				  														<?php endforeach; ?>
               											 </select>
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
        $id_client = $i['id_client'];
        $nama = $i['nama'];
        $username = $i['username'];
        $idi = $i['id_instansi'];
        $foto = $i['foto'];
        $last_login = $i['last_login'];
        $created_by = $i['created_by'];
        $created_on = $i['created_on'];
        $active = $i['active'];
        ?>
 			<div class="modal fade" id="ModalEdit<?php echo $id_client; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Client</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/client/update_client'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
						            <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
											<input type="hidden" name="kode" value="<?php echo $id_client; ?>"/>
                                            <input type="text" name="xnama" value="<?php echo $nama; ?>" class="form-control" id="xnama" placeholder="Nama" required>	
										</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
											<input type="hidden" name="kode" value="<?php echo $id_client; ?>"/>
                                            <input type="text" name="xusername" value="<?php echo $username; ?>" class="form-control" id="xusername" placeholder="Username" required>	
											<span id="username_result"></span>
										</div>
                                    </div>
								<div class="form-group">
                                	<label for="inputUserName" class="col-sm-4 control-label">Grup</label>
                                	<div class="col-sm-7">
										<select  class="selectpicker show-tick form-control" name="xins" style="width: 100%;"  data-live-search="true" title="Pilih Instansi" required>
														<?php
                                                    foreach ($ins->result_array() as $i) {
                                                        $id_instansi = $i['id_instansi'];
                                                        $nama_instansi = $i['nama_instansi'];
                                                        $alamat = $i['alamat'];
                                                        if ($idi == $id_instansi) {
                                                            echo "<option value='$id_instansi' selected>$nama_instansi - $alamat</option>";
                                                        } else {
                                                            echo "<option value='$id_instansi'>$nama_instansi - $alamat</option>";
                                                        }
                                                    } ?>					
										</select>
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
        $id_client = $i['id_client'];
        $username = $i['username'];
        ?>
        <div class="modal fade" id="ModalHapus<?php echo $id_client; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Client</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/client/hapus_client'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $id_client; ?>"/>
                            <p>Apakah Anda yakin mau menghapus data client  dengan username : <b><?php echo $username; ?></b> ?</p>

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
						$('#simpan').attr('disabled', true);
						
						 
			 }	
			});		
});	
 $(document).ready(function(){  
      $('#xusername').change(function(){  
           var xusername = $('#xusername').val();  
           if(xusername != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/client/check_username_avalibility",  
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
													$('#simpan').attr('disabled', true);
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
                    text: "Data telah diupdate.Gambar yang Anda masukan terlalu besar atau tidak ada gambar.",
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
                    text: "Data Client Berhasil disimpan ke database.",
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
                    text: "Data Client berhasil di update",
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
                    text: "Data Client Berhasil dihapus.",
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
