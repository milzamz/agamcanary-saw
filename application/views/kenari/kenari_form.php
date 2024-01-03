<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0"><?=ucfirst($page)?> Data Kenari</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?=site_url('kenari')?>">Kenari</a></li>
					<li class="breadcrumb-item active"><?=ucfirst($page)?> Data Kenari</li>
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
					<a href="<?=site_url('kenari')?>" class="btn btn-warning">
						<i class="fa fa-arrow-left"></i>Back
					</a>
				</div>
			</div>
			<div class="card-body mx-auto">
				<div class="row">
					<div class="col-md-4 offset-2">
						<?php echo form_open_multipart('kenari/process')?>
						<div class="form-group ">
							<label>Nama Kenari <label style="color: red;">*</label></label>
							<input type="hidden" name="id" value="<?=$row->kenari_id?>">
							<input type="text" placeholder="Masukkan nama kenari.." name="nama_kenari"
								value="<?=$row->nama_kenari?>" class="form-control" autofocus required>
						</div>
						<div class="form-group">
							<label>Jenis Kenari <label style="color: red;">*</label></label>
							<select name="jenis_kenari" class="form-control" required>
								<option value="">- Pilih -</option>
								<?php  foreach($jenis->result() as $key => $data) { ?>
								<option value="<?=$data->id_jenis?>"
									<?= $data->id_jenis == $row->jenis_kenari ? "selected" : null?>><?=$data->jenis?>
								</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Tanggal Menetas<label
									style="color: red;">*</label></label>
							<input type="date" 
								name="umur_kenari" value="<?=$row->umur_kenari?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin <label style="color: red;">*</label></label>
							<select name="jenis_kelamin" class="form-control" required>
								<option value="">- Pilih -</option>
								<option value="1" <?= $row->jenis_kelamin == 1 ? "selected" : null?>>Jantan</option>
								<option value="2" <?= $row->jenis_kelamin == 2 ? "selected" : null?>>Betina</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Status <label style="color: red;">*</label></label>
							<select name="status" class="form-control" required>
								<option value="">- Pilih -</option>
								<option value="1" <?= $row->status == 1 ? "selected" : null?>>Siap</option>
								<option value="2" <?= $row->status == 2 ? "selected" : null?>>Tidak</option>
							</select>
						</div>
						<div class="form-group">
						<label>Silangan <label style="color: red;">*</label></label>
						<div class="row">
							<div class="col-6">
							<select name="induk1" class="form-control" required>
							<option value="">- Pilih -</option>
								<?php  foreach($jenis->result() as $key => $data) { ?>
								<option value="<?=$data->id_jenis?>"
									<?= $data->jenis == $row->induk1 ? "selected" : null?>><?=$data->jenis?>
								</option>
								<?php } ?>
							</select></div>
							<div class="col-6">
							<select name="induk2" class="form-control" required>
							<option value="">- Pilih -</option>
								<?php  foreach($jenis->result() as $key => $data) { ?>
								<option value="<?=$data->id_jenis?>"
									<?= $data->jenis == $row->induk2 ? "selected" : null?>><?=$data->jenis?>
								</option>
								<?php } ?>
							</select></div>
						</div>
						</div>
						<div class="form-group">
							<label>Keterangan </label>
							<textarea name="keterangan" placeholder="Masukkan keterangan.."
								class="form-control"><?=$row->keterangan?></textarea>
						</div>
						<div class="form-group ">
							<label>Gambar</label>
							<?php if($page == 'edit'){
                                                if($row->gambar != null){?>
							<div style="margin-bottom: 4px;">
								<img src="<?=base_url('uploads/canary/'.$row->gambar)?>" style="width:290px">
							</div>
							<?php }
                                            }?>
							<div class="custom-file">
								<input type="file" name="gambar" class="custom-file-input form-control" id="customFile">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
							<small>(Biarkan kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada'?>)</small>
						</div>
						<div class="form-group ">
							<label>Kicau</label>
							<?php if($page == 'edit'){
                                                if($row->kicau != null){?>
							<div style="margin-bottom: 4px;">
								<audio controls="true">
									<source src="<?=base_url('uploads/canary/suara/'.$row->kicau)?>" type="audio/mpeg">
								</audio>
							</div>
							<?php }
                                            }?>
							<div class="custom-file">
								<input type="file" name="kicau" class="custom-file-input form-control" id="customFile">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
							<small>(Biarkan kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada'?>)</small>
						</div>
						<div class="form-group justify-content-center">
							<button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">Save</button>
							<button type="Reset" class="btn btn-danger btn-flat">Reset</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--/. container-fluid -->
</section>
<!-- /.content -->
