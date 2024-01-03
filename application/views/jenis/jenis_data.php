<div class="content-header">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Jenis Kenari</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item active">Data Jenis Kenari</li>
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
					<a href="<?=site_url('jenis/add')?>" class="btn btn-primary">
						<i class="fa fa-user-plus"></i>Tambah
					</a>
				</div>
			</div>
			<div class="card-body table-responsive">
			<table id="jenis" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Jenis</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
                                    foreach($row->result() as $key => $data) { ?>
						<tr>
							<td><?= $no++?>.</td>
							<td><?= $data->jenis?></td>
							<td>
							<a href="<?=site_url('jenis/edit/'.$data->id_jenis)?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil-alt"></i> 
                                    Update
                                </a>
								
								<a href="<?=site_url('jenis/del/'.$data->id_jenis)?>" class="btn btn-danger btn-xs tombol-hapus">
									<i class="fa fa-trash"></i> 
                                    Hapus
								</a>
                                </form>
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

<script>
	$(function () {
		$("#jenis").DataTable({
		"responsive": true, 
		"lengthChange": true, 
		"autoWidth": true,
		"buttons": ["copy", "csv", "excel", "colvis"],
		"columnDefs": [
    { "orderable": false, targets: 2 }]
		}).buttons().container().appendTo('#jenis_wrapper .col-md-6:eq(0)');
	});
	</script>
