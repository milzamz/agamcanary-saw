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
					<a href="<?=site_url('user/user_add')?>" class="btn btn-primary">
						<i class="fa fa-user-plus"></i>Tambah
					</a>
				</div>
			</div>
			<div class="card-body table-responsive">
				<table id="example1" class="table  table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Level</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
                                    foreach($row->result() as $key => $data) { ?>
						<tr>
							<td><?= $no++?>.</td>
							<td><?= $data->username?></td>
							<td><?= $data->nama?></td>
							<td><?= $data->alamat?></td>
							<td><?php if($data->level == 1){
									echo "Pegawai";
							}elseif($data->level == 2){
									echo "Admin";
							}elseif($data->level == 3){
									echo "Superadmin";
							}   ?></td>
							<td class="text-center" width="160px">
								<a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-pencil-alt"></i> 
                                    Update
								</a>
								<a href="<?=site_url('user/del/'.$data->user_id)?>" class="btn btn-danger btn-xs tombol-hapus">
									<i class="fa fa-trash"></i> 
                                    Hapus
								</a>
							</td>
						</tr>
						<?php
                                    } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!--/. container-fluid -->
</section>
<!-- /.content -->
