<div class="content-header">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>


	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Kriteria</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item active">Kriteria</li>
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
				<h7>Jumlah Bobot  :</h7>
				<h7><?php
							foreach ($bobot as $bo){?>
								<?php $b = $bo['b'];?>
								<?= $bo['b'];?>

							<?php }?>%</h7>
				<h7 class="<?= $b == 100 ? "text-green text-bold" : "text-danger text-bold";?>">     <?= $b == 100 ? "Bobot Pas" : "Bobot Error";?></h7>		
			</div>
			</div>
			<div class="card-body table-responsive">
				<table id="example1" class="table  table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Kriteria</th>
							<th>Sifat</th>
							<th>Bobot</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
                                    foreach($row->result() as $key => $data) { ?>
						<tr>
							<td><?= $no++?>.</td>
							<td><?= $data->nama_kriteria?></td>
							<td><?= $data->sifat == 1 ? "Benefit" : "Cost"?></td>
							<td><?= $data->bobot?> %</td>
							<td class="text-center">
                                <a href="<?=site_url('kriteria/edit/'.$data->id_kriteria)?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil-alt"></i> 
                                    Update
                                </a>
								<!-- <a href="<?=site_url('kriteria/del/'.$data->id_kriteria)?>"  class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> 
                                    Hapus
                                </a> -->
                                </form>
							</td>
						</tr>
						
						<?php
                                    } ?>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
			
			
		</div>
		</div>
	</div>
	<!--/. container-fluid -->
</section>
<!-- /.content -->
