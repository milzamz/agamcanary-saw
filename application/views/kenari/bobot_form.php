<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0"><?=ucfirst($page)?> Rating Kecocokan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?=site_url('bobot')?>">Rating Kecocokan</a></li>
					<li class="breadcrumb-item active"><?=ucfirst($page)?> Rating Kecocokan</li>
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
					<div class="col-md-4 offset-4">
						<form action="<?=site_url('bobot/process')?>" method="post">
							<div class="form-group ">
								<input type="hidden" name="id" value="<?=$row->kenari_id?>">
								<label>Nilai Suara <label style="color: red;">*</label></label>
								<select name="suara" id="suara" class="form-control" required>
									<option value="">- Pilih -</option>
									<?php foreach($suara->result() as $key => $data){?>
									<option value="<?=$data->nilai?>"><?=$data->nilai?> | <?=$data->des?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group ">
								<label>Nilai Postur Tubuh <label style="color: red;">*</label></label>
								<select name="postur" id="postur" class="form-control" required>
									<option value="">- Pilih -</option>
									<?php foreach($postur->result() as $key => $data){?>
									<option value="<?=$data->nilai?>"><?=$data->nilai?> | <?=$data->des?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nilai Umur Kenari <label style="color: red;">* </label></label>
								
								<input type="number" min="1" max="5" name="umur" value="<?php 
                                            
                                            $a = $row->k;
                                            
                                            if($a <= 9){
                                                echo 1;
                                            } elseif($a <= 18) {
                                                echo 2;
                                            } elseif($a <= 24) {
                                                echo 3;
                                            } elseif($a <= 36) {
                                                echo 4;
                                            } elseif($a > 36) {
                                                echo 5;
                                            }
                                            ?>" class="form-control" required readonly>
											<small style="color: chartreuse;">(Otomatis Sesuai Umur)</small>
											
							</div>
							<div class="form-group">
								<label>Nilai Warna <label style="color: red;">*</label></label>
								<select name="warna" id="warna" class="form-control" required>
									<option value="">- Pilih -</option>
									<?php foreach($warna->result() as $key => $data){?>
									<option value="<?=$data->nilai?>"><?=$data->nilai?> | <?=$data->des?>
									</option>
									<?php } ?>
								</select>
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

<script>
	window.onload = function () {
		document.getElementById('suara').focus();
	}

</script>
