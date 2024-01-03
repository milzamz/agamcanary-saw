<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0"><?=ucfirst($page)?> Kriteria</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
								<li class="breadcrumb-item"><a href="<?=site_url('user')?>">User</a></li>
								<li class="breadcrumb-item active"><?=ucfirst($page)?> kriteria</li>
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
                                <a href="<?=site_url('kriteria')?>" class="btn btn-warning">
                                    <i class="fa fa-arrow-left"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-4">
                                    <form action="<?=site_url('kriteria/process')?>" method="post">
                                        <div class="form-group ">
                                            <label>Nama kriteria *</label>
                                            <input type="hidden" name="id" value="<?=$row->id_kriteria?>">
                                            <input type="text"  name="nama_kriteria" value="<?=$row->nama_kriteria?>" class="form-control" required>
                                        </div>
                                        <div class="form-group ">
                                            <label>Sifat *</label>
                                            <input type="number" min="1" max="2"  name="sifat" value="<?=$row->sifat?>" class="form-control" required>
                                            <small style="color: darkblue;">Keterangan Sifat :</small><br>
                                            <small style="color: darkblue;">1: Benefit => Semakin besar nilainya semakin baik</small><br>
                                            <small style="color: darkblue;">2: Cost => Semakin kecil nilainya semakin baik</small>
                                        </div>
                                        <div class="form-group ">
                                            <label>Bobot *</label>
                                            <input type="text"  name="bobot" value="<?=$row->bobot?>" class="form-control" required>
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