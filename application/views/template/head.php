<!DOCTYPE html>
<html>
<!-- head -->
<head>
	<title><?php echo $page_title ;?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/fontawesome/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/datatables/datatables.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/datatables/Responsive-2.2.2/css/responsive.bootstrap4.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/datatables/RowReorder-1.2.4/css/rowReorder.bootstrap4.css" />
	<link src="<?=base_url();?>assets/plugins/plyrio/css/plyr.css"/>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/main.css" />
	

	<!-- script -->
	<script type="text/javascript" src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- script -->
</head>
<!-- head -->
<body>
	<div id="site-base" class="container-fluid">
		<!-- start site sidebar -->
		<div id="site-sidebar">
			<div class="sidebar-inner">
				<div class="logo-section">
					<ul>
						<li><a href="#"><span class="logo site-logo"><img src="<?= base_url() ?>assets/images/logo/logo-dummy.png" /></span><span class="logo-text">Weebo OS</span></a></li>
					</ul>
				</div>
				<div class="nav-section">
					<ul>
						<li><a href="<?= base_url() ?>dashboard"><span class="logo nav-logo"><i class="fas fa-home"></i></span><span class="logo-text">Dashboard</span></a></li>
						<li><a href="<?= base_url() ?>post"><span class="logo nav-logo"><i class="fas fa-pencil-alt"></i></span><span class="logo-text">Post</span></a></li>
						<li class="has-submenu"><a href="#"><span class="logo nav-logo"><i class="fas fa-user-friends"></i></span><span class="logo-text">Anime</span></a>
							<ul class='submenu'>
								<li><a href="<?= base_url() ?>anime"><span class="logo nav-logo"><i class="fas fa-user-friends"></i></span><span class="logo-text">Anime List</span></a></li>								
								<li><a href="#"><span class="logo nav-logo"><i class="fas fa-user-friends"></i></span><span class="logo-text">Genre List</span></a></li>								
							</ul>
						</li>					
						<li class='has-submenu'><a href="#"><span class="logo nav-logo"><i class="fas fa-cog"></i></span><span class="logo-text">More</span></a>
							<ul class="submenu">
								<li><a href="<?= base_url() ?>setting"><span class="logo nav-logo"><i class="fas fa-cog"></i></span><span class="logo-text">Setting</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end site sidebar -->
		<!-- start site main -->
		<div id="site-main">
			<div class="row">
				<!-- start site header -->
				<div id="site-header" class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="header-inner">
						<div class="menu-toggle">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<!-- profile user -->
						<div class="header-item text-right">
								<div class="user-item">
									<span class="notif flat-notif">
										<span class="dropdown">
											<a href="#" class="notif-icon" id="notifToggle" data-toggle="dropdown"><i class="far fa-bell"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<div class="notification-block">
													<h6 class="notif-title">Notification</h6>
													<ul class="notif-body">
														<li>
															<a href="#">
																<span class="nc"><i class="far fa-bell"></i></span>
																<span class="nt">1000 Like untuk Sword Art Online</span>
															</a>
														</li>
													</ul>
												</div>
												<div class="pesan notification-block">
													<h6 class="notif-title">Pesan</h6>
													<ul class="notif-body">
														<li>
															<a href="#">
																<span class="nc"><i class="far fa-envelope"></i></span>
																<span class="nt">"Min Vide Player Error"</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</span>
									</span>
									
									<span class="dropdown user-log flat-notif">
										<a class="user-pic-toggle" id="profileDrop" data-toggle="dropdown" href="#">
											<img class='user-pic square small' src="<?= base_url() ?>assets/images/logo/user-dummy.png" />
										</a>

										<div class="dropdown-menu">
										  <li><a class="dropdown-item" href="#">Halo, <?php echo $this->session->userdata('userLogin')['name'] ?>!</a></li>
										  <li><a class="dropdown-item" href="#">Profile</a></li>
										  <li><a class="dropdown-item" href="<?= base_url() ?>logout">Logout</a></li>
										</div>
									</span>
								</div>
						</div>
					</div>
				</div>
				<!-- end site header -->

				<!-- start site content -->
				<div id="site-content" class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="content-inner">
						<div class="row">
							