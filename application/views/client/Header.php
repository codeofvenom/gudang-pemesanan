
	<header class="main-header">
    <a href="<?php echo base_url().'client/beranda'; ?>" class="logo">
      <span class="logo-mini">DPPKB</span>
      <span class="logo-lg"><b>DPPKB-</b>XXX</span>
    </a>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
			</a>
			

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						     <?php
                                        $id_client = $this->session->userdata('ses_id');
                                        $q = $this->db->query("SELECT foto,nama,username,DATE_FORMAT(last_login,'%H:%i:%s') AS last_login_time,
																				DATE_FORMAT(last_login,'%Y-%m-%d') AS last_login	
																				 FROM tb_client WHERE id_client='$id_client'");
                                        $c = $q->row_array();
                                        ?>
              <img src="<?php echo base_url().'assets/img/avatar/client/'.$c['foto']; ?>" class="user-image" alt="">
							<span class="hidden-xs"><?php echo ucfirst($c['nama']); ?></span>
							&emsp;<i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url().'assets/img/avatar/client/'.$c['foto']; ?>" class="img-circle" alt="">

                <p>
										<small><?php echo ucfirst($c['nama']); ?></small>
                 		<small><i>Last login : <?php echo longdate_indo($c['last_login']); ?> <?php echo $c['last_login_time']; ?> </i></small>
                </p>
              </li>

              <li class="user-footer">
								<div class="pull-left">
                  <a href="<?php echo base_url().'client/client/edit_profilku'; ?>" class="btn btn-default btn-flat"><i class="fa fa-user"> Edit Profil</i></a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'login_admin/system/login/logout'; ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"> Sign Out</i></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
		</nav>
	</header>

