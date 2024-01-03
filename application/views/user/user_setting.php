<div class="content-header">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
	<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">User</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item active">User</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"></h3>
				<div class="float-right">
					<a href="<?=site_url('user/edit/'.$this->fungsi->user_login()->user_id)?>" class="btn btn-light">
						<i class="fa fa-pencil-alt"></i>  Edit
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3 offset-4"> 
				<table border="0" style="width: 400px;">
					<tr>
						<td>Kode User</td>
						<td>:</td>
						<td><?=ucfirst($this->fungsi->user_login()->user_id)?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><?=ucfirst($this->fungsi->user_login()->username)?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?=ucfirst($this->fungsi->user_login()->nama)?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?=ucfirst($this->fungsi->user_login()->alamat)?></td>
					</tr>
					<tr>
						<td>Level</td>
						<td>:</td>
						<td>
						<?php if($this->fungsi->user_login()->level == 1){
							echo "Admin";
						} elseif($this->fungsi->user_login()->level == 2){
							echo "Pemilik";
						} elseif($this->fungsi->user_login()->level == 3){
							echo "Superadmin";
						}?>
						</td>
					</tr>

				</table>
							
							</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/. container-fluid -->
</section>
<!-- /.content -->
