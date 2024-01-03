<div class="content-header">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('login'); ?>"></div>
<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('eror'); ?>"></div>


	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Dashboard</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<div class="card" style="min-height: 500px;">
  <div class="card-body">
  <div class="row">
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box bg-danger">
					<span class="info-box-icon "><i class="fas fa-dove"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Jumlah Kenari</span>
						<span class="info-box-number">
							<?php foreach($jlkenari as $k){ ?>
								<?= $k['jumlah']; ?>
							<?php } ?>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box bg-info">
					<span class="info-box-icon "><i class="fas fa-mars"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Kenari Jantan</span>
						<span class="info-box-number">
						<?php foreach($jljan as $k){ ?>
								<?= $k['jan']; ?>
							<?php } ?>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="clearfix hidden-md-up"></div>

			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box bg-pink">
					<span class="info-box-icon "><i class="fas fa-venus"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Kenari Betina</span>
						<span class="info-box-number">
						<?php foreach($jlbet as $k){ ?>
								<?= $k['bet']; ?>
							<?php } ?>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box bg-warning">
					<span class="info-box-icon"><i class="fas fa-th-list"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Jumlah Kriteria</span>
						<span class="info-box-number">4</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box bg-danger">
					<span class="info-box-icon"><i class="fas fa-dove"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Kenari Siap Kawin</span>
						<span class="info-box-number">
						<?php foreach($jlkenarird as $k){ ?>
								<?= $k['jumlahrd']; ?>
							<?php } ?>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box bg-info">
					<span class="info-box-icon"><i class="fas fa-mars"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Kenari Jantan Siap Kawin</span>
						<span class="info-box-number">
						<?php foreach($jljanrd as $k){ ?>
								<?= $k['janrd']; ?>
							<?php } ?>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-pink">
              <span class="info-box-icon"><i class="fas fa-venus"></i></span>

              <div class="info-box-content">
			  <span class="info-box-text">Kenari Betina Siap Kawin</span>
						<span class="info-box-number">
						<?php foreach($jlbetrd as $k){ ?>
								<?= $k['betrd']; ?>
							<?php } ?>
						</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-blue">
              <span class="info-box-icon"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
			  <span class="info-box-text">Jumlah User</span>
						<span class="info-box-number">
						<?php foreach($jluser as $k){ ?>
								<?= $k['jml']; ?>
							<?php } ?>
						</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
  </div>
</div>
		
			

			<!-- fix for small devices only -->
			
		</div>
		<!--/. container-fluid -->
</section>
<!-- /.content -->
