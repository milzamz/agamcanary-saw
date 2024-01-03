<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Normalisasi</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item active">Normalisasi</li>
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
					<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
					<a href="<?=site_url('kenari')?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>  Tambah
					</a>
					<?php } ?>
					<?php if($this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 3){?>
					<a href="<?=site_url('laporan/indexnorm')?>" class="btn btn-dark" target="_blank">
						<i class="fa fa-print"></i>Lihat Cetak
					</a>
					<a href="<?=site_url('laporan/cetaknorm')?>" class="btn btn-dark">
						<i class="fa fa-print"></i>Cetak
					</a>
					<?php } ?>
				</div>
			</div>
			<div class="card-body table-responsive">
			<table id="norm" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Kenari</th>
							<th>Nama Kenari</th>
							<th>JK</th>
							<th>K1</th>
							<th>K2</th>
							<th>K3</th>
							<th>K4</th>
							<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
					
								<th>Action</th>
					<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
                                    foreach($row->result() as $key => $data) { ?>
						<tr>
							<td><?= $no++?>.</td>
							<td>A<?= $data->kenari_id?></td>
							<td><?= $data->nama_kenari?></td>
							<td><?= $data->jenis_kelamin == 1 ? "Jantan" : "Betina" ?></td>
							<td><?= $data->C1+0?></td>
							<td><?= $data->C2+0?></td>
							<td><?= $data->C3+0?></td>
							<td><?= $data->C4+0?></td>
							<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
					<td class="text-center" width="160px">
					<a href="<?=site_url('kenari/ebot/'.$data->kenari_id)?>"  class="btn btn-primary btn-xs">
							<i class="fa fa-pencil-alt"></i> 
							Update
						</a>
						<a href="<?=site_url('bobot/del/'.$data->kenari_id)?>" class="btn tombol-hapus btn-danger btn-xs">
							<i class="fa fa-trash"></i> 
							Hapus
						</a>
						</form>
					</td>
		<?php } ?>
						</tr>
						<?php
                                    } ?>
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Kode Kenari</th>
							<th>Nama Kenari</th>
							<th>JK</th>
							<th>K1</th>
							<th>K2</th>
							<th>K3</th>
							<th>K4</th>
							<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
								<th>Action</th>
					<?php } ?>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<!--/. container-fluid -->
</section>
<!-- /.content -->
<script>
		$(function () {
			$("#norm").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				initComplete: function () {
				this.api().columns([1, 2, 3]).every(function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.appendTo($(column.footer()).empty())
						.on('change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search(val ? '^' + val + '$' : '', true, false)
								.draw();
						});

					column.data().unique().sort().each(function (d, j) {
						select.append('<option value="' + d + '">' + d + '</option>')
					});
				});
			}
			}).buttons().container().appendTo('#norm_wrapper .col-md-6:eq(0)');
		});

	</script>
