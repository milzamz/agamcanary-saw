<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0"><?=ucfirst($page)?> Data Kenari</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
								<li class="breadcrumb-item"><a href="<?=site_url('jenis')?>">Jenis Kenari</a></li>
								<li class="breadcrumb-item active"><?=ucfirst($page)?> Data Jenis Kenari</li>
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
                                <a href="<?=site_url('jenis')?>" class="btn btn-warning">
                                    <i class="fa fa-arrow-left"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 offset-4">
                                    <form action="<?=site_url('jenis/process')?>" method="post">
                                        <div class="form-group ">
                                            <label>Nama Jenis Kenari *</label>
                                            <input type="hidden" name="id" value="<?=$row->id_jenis?>">
                                            <input type="text"  name="nama_jenis" value="<?=$row->jenis?>" class="form-control" required>
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