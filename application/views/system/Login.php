<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DPPKB Kota XXX</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'assets/img/ico/favicon.png'; ?>">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/notiflogin.js"></script>

  </head>
  <body class="app flex-row align-items-center container-login">
   	 <div class="container">
	<form class="form-signin" action="<?php echo base_url().'login_admin/system/login/auth'; ?>" method="post">
		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="card-group">
					<div class="card p-4">
					 <?php 
                 if ($this->session->flashdata('msg')) {
                     echo "<div class='alert alert-danger' role='alert' > 
														<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                     echo $this->session->flashdata('msg');
                     echo '</div>';
                 }
            ?>	
					  <div class="card-body">
						<h1>Login</h1>
						<p class="text-muted">Masukkan username dan password </p>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text">
							  <i class="fa fa-user"></i>
							</span>
						  </div>
							<input type="text" id="username" name="username" autocomplete="off" class="form-control" placeholder="Username" required>
						</div>
						<div class="input-group mb-4">
						  <div class="input-group-prepend">
							<span class="input-group-text">
							  <i class="fa fa-lock"></i>
							</span>
						  </div>
							<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
						</div>
						<div class="row">
						  <div class="col-6">
							  <button type="submit" name="submit" class="btn btn-success px-4"><i class="fa fa-sign-in"> &nbsp;Login</i></button>	
						  </div>
						  <div class="col-6" align="right">
						   <button type="reset"  name="reset" class="btn btn-danger px-4"><i class="fa fa-undo"> &nbsp;Reset</i></button>
						  </div> 
						</div>
					  </div>
					</div>
					<div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
					  <div class="card-body text-center">
						<div>	
						  <h2>Hai Selamat Datang,</h2>
						  <p>Untuk menggunakan aplikasi<br><b> DPPKB Kota XXX<br></b> maka Anda harus <strong>Login</strong> 
							terlebih dahulu</p>
						 </div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
				</form>
				
    </div>
</body>
</html>
