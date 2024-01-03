<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$judul?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

	  <!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed ">

	<div class="wrapper">

		<!-- Preloader -->
		<!-- <div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="<?=base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
				height="60" width="60">
		</div> -->

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" data-enable-remember="true" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
						<?=ucfirst($this->fungsi->user_login()->nama)?> <span class="caret"></span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" tabindex="-1" href="#">Profil</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" tabindex="-1" href="<?=site_url('auth/logout')?>">Logout</a>
					</div>
				</li>

			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-light-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?=site_url('dashboard')?>" class="brand-link">
				<img src="<?=base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
					class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Agam Canary</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">


				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
						<li class="nav-header">MAIN NAVIGATION</li>
						<li class="nav-item">
							<a href="<?=site_url('dashboard')?>" class="nav-link">
								<i class="nav-icon far fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('kenari')?>" class="nav-link">
								<i class="nav-icon far fas fa-dove"></i>
								<p>
									Data Kenari
								</p>
							</a>
						</li>
						<?php if ($this->fungsi->user_login()->level == 1){

						} else { ?>
						<li class="nav-item">
							<a href="<?=site_url('jenis')?>" class="nav-link">
								<i class="nav-icon far fas fa-th-list"></i>
								<p>
									Data Jenis Kenari
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('kriteria')?>" class="nav-link">
								<i class="nav-icon far fas fa-th-list"></i>
								<p>
									Data Kriteria
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('kriteria/des')?>" class="nav-link">
								<i class="nav-icon far fas fa-th-list"></i>
								<p>
									Data Deskripsi Kriteria
								</p>
							</a>
						</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?=site_url('bobot')?>" class="nav-link">
								<i class="nav-icon far fas fa-balance-scale"></i>
								<p>
									Rating Kecocokan
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-search"></i>
								<p>
									Hasil
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=site_url('penilaian')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Normalisasi</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=site_url('penilaian/prefer')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Preferensi</p>
									</a>
								</li>
							</ul>
						</li>
						<?php if ($this->fungsi->user_login()->level == 1){

						} else { ?>
						<li class="nav-item">
							<a href="<?=site_url('penilaian/preferensi')?>" class="nav-link">
								<i class="nav-icon far fas fa-th-list"></i>
								<p>
									Perangkingan
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('laporan')?>" class="nav-link">
								<i class="nav-icon far fas fa-th-list"></i>
								<p>
									Riwayat Perhitungan
								</p>
							</a>
						</li>
						<?php } ?>
						<li class="nav-header">SETTINGS</li>
						<?php if($this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 3){?>
						<li class="nav-item">
							<a href="<?= site_url('user')?>" class="nav-link">
								<i class="nav-icon far fas fa-users"></i>
								<p>
									User
								</p>
							</a>
						</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?=site_url('user/userSetting')?>" class="nav-link">
								<i class="nav-icon far fas fa-users-cog"></i>
								<p>
									User Settings
								</p>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="<?=site_url('laporan')?>" class="nav-link">
								<i class="nav-icon far fas fa-sign-out-alt"></i>
								<p>
									Laporan
								</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="<?=site_url('auth/logout')?>" class="nav-link">
								<i class="nav-icon far fas fa-sign-out-alt"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- jQuery -->
		<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
		<!-- DataTables  & Plugins -->
		<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/jszip/jszip.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/pdfmake/pdfmake.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/pdfmake/vfs_fonts.js"></script>
		<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

		
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<?php echo $contents ?>
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<strong>Copyright &copy; 2021 <a href="https://adminlte.io">Agam Canary</a>.</strong>
			All rights reserved.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 1.0
			</div>
		</footer>
		<aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->




	<!-- Bootstrap -->
	<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?=base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url()?>assets/dist/js/adminlte.js"></script>
	<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

	<!-- PAGE <?=base_url()?>assets/plugins -->
	<!-- jQuery Mapael -->
	<script src="<?=base_url()?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="<?=base_url()?>assets/plugins/raphael/raphael.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
	<!-- ChartJS -->
	<script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script>

	<!-- SweetAlert2 -->
	<script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/sweetalert2/myscript.js"></script>
	<!-- moment -->
	<script src="<?=base_url()?>assets/plugins/moment/moment.min.js"></script>
	<!-- datepicker -->
	<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

	<script>
		$(function () {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"buttons": ["copy", "csv", "excel", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});

	</script>





</body>

</html>

